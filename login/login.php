<?php

session_start();
include "koneksi.php";

$uname = $_POST['uname'];
$pass = md5($_POST['password']);

if (isset($_POST['uname']) && isset($_POST['password'])){

    if (empty($uname)){
        header("Location: index.php");
        exit();
    }elseif (empty($pass)){
        header("Location: index.php");
        exit();

    }else{
        $sql="SELECT * FROM pengguna WHERE username='$uname' AND password='$pass'";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            if ($row['username']==$uname && $row['password']==$pass){
                echo "Logged in!";
                $_SESSION['username']=$row['username'];
                $_SESSION['id_pengguna'] = $row['id_pengguna'];
                header("location:home.php");
                exit();

            }else{
                header("location:index.php");
                exit();
            }

        }else{
            header("location:index.php");
            exit();
        }
        
    }
}else{
    header("location:index.php");
    exit();
}
?>