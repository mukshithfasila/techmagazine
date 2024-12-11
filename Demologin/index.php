<!DOCTYPE html>
<html>
    <head>
        <title> LOGIN </title>
        <Link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
    <form action="Login.php" method="post">
        <h2>LOGIN</h2>
        <?php if(isset($_GET['error'])) { ?>
           <p class="error"> <?php echo $_GET['error']; ?></p>
        <?php   
        } ?>
        <lable> User Name </lable>
        <input type="text" name="uname" placeholder="User Name"><br>
        <lable> Password </lable>
        <input type="password" name="password" placeholder="password"><br>
        
        <button type="submit">Login</button>
    </form>
    </body>
</html>            