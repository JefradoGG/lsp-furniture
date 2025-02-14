<?php

    $defaultusername = "userlsp";
    $defaultpassword = "smkisfibjm";

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(($username === $defaultusername && $password === $defaultpassword)){
            echo "<meta http-equiv='refresh' content='1;url=beranda.php'>";
        }else{
            echo "<script>alert('Username Atau Password Salah!')</script>";
            echo "<meta http-equiv='refresh' content='1;url=index.php'>";
        }
    }
?>
