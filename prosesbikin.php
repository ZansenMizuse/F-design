<?php
include 'koneksi.php';

if (isset($_POST['aksi'])) {
    $aksi = $_POST['aksi'];

    if ($aksi == "daftar") {
        if (isset($_POST['username'], $_POST['password'], $_POST['password_confirm'], $_POST['email_user'], $_POST['notelepon_user'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $email_user = mysqli_real_escape_string($conn, $_POST['email_user']);
            $password_confirm = mysqli_real_escape_string($conn, $_POST['password_confirm']);
            $notelepon_user = mysqli_real_escape_string($conn, $_POST['notelepon_user']);

            // Periksa apakah username atau email sudah terdaftar
            $check_query = "SELECT * FROM user WHERE username = '$username' OR email_user = '$email_user'";
            $check_result = mysqli_query($conn, $check_query);

            if (mysqli_num_rows($check_result) > 0) {
                echo '<script>alert("Username atau email telah terdaftar.");</script>';
                echo '<script>window.location = "register.php";</script>';
                exit(); // Keluar dari skrip jika username atau email sudah terdaftar
            }

            if ($password !== $password_confirm) {
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                echo '<script>alert("Password dan konfirmasi password tidak cocok.");</script>';
                echo '<script>window.location = "register.php";</script>';
                exit(); // Keluar dari skrip jika password tidak cocok
            } else {
                $query = "INSERT INTO user (username, password, email_user, notelepon_user) VALUES ('$username',  '$password', '$email_user','$notelepon_user')";
                $sql = mysqli_query($conn, $query);

                if ($sql) {
                    header("location: login.php");
                    exit();
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            }
        }
    }
}

?>
