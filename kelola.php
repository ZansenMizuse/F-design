<!DOCTYPE html>

<?php
include 'koneksi.php';


$username = '';
$password = '';
$email_user = '';
$notelepon_user = '';
$id_user = '';
if(isset($_GET['ubah'])){
	$id_user = $_GET['ubah'];

	$query = "SELECT * FROM user WHERE id_user = '$id_user';";
	$sql = mysqli_query($conn, $query);

	$result = mysqli_fetch_assoc($sql);
	$username = $result['username'];
	$password = $result['password'];
	$email_user = $result['email_user'];
	$notelepon_user = $result['notelepon_user'];
}
?>

<html>
<head>
	<meta charset="utf-8">
	<!-- Bootstrap -->
	<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="bootstrap/dist/jss/bootstrap.bundle.min.js"></script>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
	
	<title>Kelola Data</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">
                CRUD - BS5
            </a>
        </div>
    </nav>
	<div class="container mt-4">
		<form method="POST" action="proses.php" enctype="multipart/form-data">
			<input type="hidden" value="<?php echo $id_user; ?>" name="id_user">
			<div class="mb-3 row">
				<label for="username" class="col-sm-2 col-form-label">
					Username
				</label>
				<div class="col-sm-10">
					<input required type="text" name="username" class="form-control" id="username" placeholder="Masukan Username" value="<?php echo $username; ?>">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="password" class="col-sm-2 col-form-label">
					Password
				</label>
				<div class="col-sm-10">
					<input required type="password" name="password" class="form-control" id="password" placeholder="Masukan Password" value="<?php echo $password; ?>">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="email_user" class="col-sm-2 col-form-label">
					Email
				</label>
				<div class="col-sm-10">
					<input required type="email" name="email_user" class="form-control" id="email_user" placeholder="Masukan Email" value="<?php echo $email_user; ?>">
				</div>
			</div>	   
			<div class="mb-3 row">
				<label for="notelepon_user" class="col-sm-2 col-form-label">
					No Telepon
				</label>
				<div class="col-sm-10">
				<input required type="tel" name="notelepon_user" class="form-control" id="notelepon_user" placeholder="Masukan No Telepon" value="<?php echo $notelepon_user; ?>">
				</div>
			</div>

			<div class="mb-3 row mt-4">
				<div class="col">
					<?php
					if(isset($_GET['ubah'])){
						?>
						<button type="submit" name="aksi" value="edit" class="btn btn-primary">
							<i class="fa fa-floppy-o" aria-hidden="true"></i>
							Simpan Perubahan
						</button>
						<?php
					} else {
						?>
						<button type="submit" name="aksi" value="add" class="btn btn-primary">
							<i class="fa fa-floppy-o" aria-hidden="true"></i>
							Tambahkan
						</button>
						<?php
					}
					?>
					<a href="dashboard.php" type="button" class="btn btn-danger">
						<i class="fa fa-reply" aria-hidden="true"></i>
						Batal
					</a>
				</div>
			</div>
		</form>
	</div>
</body>
</html>
