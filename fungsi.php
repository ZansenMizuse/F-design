<?php
	include 'koneksi.php';

	function tambah_data($data, $files){
		$username = $data['username'];
		$password = $data['password'];
		$email_user = $data['email_user'];
		$notelepon_user = $data['notelepon_user'];

		$query = "INSERT INTO user VALUES('$username', '$password', '$email_user', '$notelepon_user',null)";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}

	function ubah_data($data, $files){
		$id_user = $data['id_user'];
		$username = $data['username'];
		$password = $data['password'];
		$email_user = $data['email_user'];
		$notelepon_user = $data['notelepon_user'];


		$queryShow = "SELECT * FROM user WHERE id_user = '$id_user';";
		$sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
		$result = mysqli_fetch_assoc($sqlShow);

		$query = "UPDATE user SET username='$username', password='$password', email_user='$email_user', notelepon_user='$notelepon_user' WHERE id_user='$id_user';";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}

	function hapus_data($data){
		$id_user = $data['hapus'];

		$queryShow = "SELECT * FROM user WHERE id_user = '$id_user';";
		$sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
		$result = mysqli_fetch_assoc($sqlShow);

		$query = "DELETE FROM user WHERE id_user = '$id_user';";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		return true;
	}
?>