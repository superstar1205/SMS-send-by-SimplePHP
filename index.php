<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <script src="assets/main.js"></script>
</head>

    <body>
        <div class="login">
            <div class="col">
                <form action="main/login.php" method="post" class="loginform">
                    <span class="top-text">Login</span>
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <input type="text" name="uname" placeholder="Username" class="dev-input">
                    <input type="password" name="password" placeholder="Password" class="dev-input">
                    <button type="submit" class="submit">login</button>
                </form>
            </div>
            <div class="col img-box"></div>
        </div>
    </body>
</html>