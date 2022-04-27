<?php

$sname= "localhost";

$unmae= "hi_dev";

$password = "FNtlfvir0105!";

$db_name = "hi_smsdb";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection failed!";

}