<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
    <script src="../assets/jquery.js"></script>
    <script src="../assets/main.js"></script>
</head>
<body>
    <div class="container">
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <div class="home">
            <?php if (isset ($_SESSION['msg'])) { ?> <div class="msg"><div class="msgbox"><?php echo $_SESSION['msg']; ?><label class="btncros">X</label></div></div> <?php } ?>
            <h3>Send SMS & save data.</h3>
            <form action="smssend.php" method="post" class="">
                <input type="text" name="name" placeholder="Name" class="dev-input">
                <input type="text" name="address" placeholder="Address" class="dev-input">
                <input type="text" name="phone" placeholder="Phone number" class="dev-input">
                <input type="text" name="status" placeholder="Status" class="dev-input">
                <input type="text" name="jobdes" placeholder="Job description" class="dev-input">
                <input type="date" name="jobdate" placeholder="Job date" class="dev-input">
                <input type="text" name="ref" placeholder="referrence" class="dev-input">
                <button class="submit">Submit</button>
            </form>
            <a class="logout" href="logout.php">Logout</a>
        </div>
    </div>    
</body>
</html>
<?php 
}else{
    header("Location: ../index.php");
    exit();
}
?>