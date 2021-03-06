// biasanya menggunakan $.ajax
// namun kali ini hanya menggunakan $.getJSON

allmenu();

function allmenu() {
    $.getJSON('data/pizza.json', function(result) {
        let menu = result.menu; //untuk menghilangkan key menu

        //method untuk melakukan perulangan/looping pada jquery
        $.each(menu, function(index, data) {
            $('#daftar-menu').append('<div class="col-md-4 mb-3"><div class="card"><img src="img/menu/'+data.gambar+' " class="card-img-top" alt="..."><div class="card-body"><h5 class="card-title">'+data.nama+'</h5><p class="card-text">'+data.deskripsi+'</p><h5 class="card-title">Rp. '+data.harga+'</h5><a href="#" class="btn btn-primary">Pesan Sekarang</a></div></div></div>');
        });
    });
}


$('.nav-link').click(function() {
    $('.nav-link').removeClass('active');
    $('this').addClass('active');

    let kategori = $(this).html(); //mengambil isi html/teks dari setiap li
    $('#kategori').html(kategori); //mengganti isi teks html

    $.getJSON('data/pizza.json', function(data) {

        let menu = data.menu;
        let content = '';

        $.each(menu, function(index, data) {
            if (data.kategori == kategori.toLowerCase()) {
                    content += '<div class="col-md-4 mb-3"><div class="card"><img src="img/menu/'+data.gambar+' " class="card-img-top" alt="..."><div class="card-body"><h5 class="card-title">'+data.nama+'</h5><p class="card-text">'+data.deskripsi+'</p><h5 class="card-title">Rp. '+data.harga+'</h5><a href="#" class="btn btn-primary">Pesan Sekarang</a></div></div></div>';
            } else if (kategori == 'All Menu') {
                allmenu();
            }

        });
        
        $('#daftar-menu').html(content);


    });



});