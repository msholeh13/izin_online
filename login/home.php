<?php
session_start();

if(isset($_SESSION['id_pengguna']) && isset($_SESSION['username'])){
?>
 
<html>
    <head><title>HOME</title></head>
    <body>
        <h1>Hello,<?php echo $_SESSION['username'];?></h1>
        <a href="logout.php">Log Out</a>
</body>
</html>
<?php
}else{
    header("location:index.php");
    exit();
}
?>