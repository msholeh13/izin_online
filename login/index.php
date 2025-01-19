<html>
    <head><title>LOGIN</title></head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <body>
        <form action="login.php" method="post">
        <h2>LOGIN</h2>
        <?php
        if (isset($_GET['error'])){ 
        ?>
        <p class="error">
            <?php echo $_GET['error'];?>
        </p>
        <?php }?>
        <table>
        <tr>
            <td><label>USERNAME:</label></td>
            <td><input type="text" name="uname"></td>
        </tr>
        <tr>
            <td><label>PASSWORD:</label></td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit">Login</button></td>
        </tr>
        </form>
    </body>
</html>