<?php 
	// ambil data dari file json
	$data = file_get_contents("data/pizza.json");
	// $dataurl = file_get_contents("https://www.google.com"); //digunakan untuk mendapatkan data dari url
	
	$menu = json_decode($data, true); //tambahkan true agar menjadi assoc. jika tidak, maka akan menjadi objek
	$menu = $menu["menu"]; //untuk mengeluarkan objek menu/key menu

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>JSON - Case PHP</title>
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	</head>

	<body>

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container">				
			  <a class="navbar-brand" href="#">
			  	<img src="img/logo.png" alt="" width="120">
			  </a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNav">
			    <ul class="navbar-nav">
			      <li class="nav-item active">
			        <a class="nav-link" href="#">Home</a>
			      </li>
			    </ul>
			  </div>
			</div>
		</nav>

		<div class="container">
			
			<div class="row mt-3">
				<div class="col">
					<h1>All Menu</h1>
				</div>
			</div>

			<div class="row">
				<?php foreach ($menu as $data) : ?>
					<div class="col-md-4 mb-3">
						<div class="card">
						  <img src="img/menu/<?php echo $data['gambar'] ?>" class="card-img-top" alt="...">
						  <div class="card-body">
						    <h5 class="card-title"><?php echo $data['nama'] ?></h5>
						    <p class="card-text"><?php echo $data['deskripsi'] ?></p>
						    <h5 class="card-title">Rp. <?php echo number_format($data['harga']) ?></h5>
						    <a href="#" class="btn btn-primary">Pesan Sekarang</a>
						  </div>
						</div>
					</div>
				<?php endforeach ?>
			</div>

		</div>



		
		<script src="assets/vendor/jquery/jquery.min.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	</body>

</html>