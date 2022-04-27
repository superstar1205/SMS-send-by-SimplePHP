<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
    <div class="home">
        <div class="msg"> <?php echo $_SESSION['msg']; ?> </div>
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <p>Please enter all data and Sbmit.</p>
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
        <a class="submit logout" href="logout.php">Logout</a>
    </div>
    
</body>
</html>
<?php 
}else{
    header("Location: ../index.php");
    exit();
}
?>