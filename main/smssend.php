<?php
session_start();
include "config.php";
if (isset($_POST['name']) && isset($_POST['address'])) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
    $name = $add = $phone = $status = $jobdes = $jobdate = $ref = '';
    $name = validate($_POST['name']);
    $add = validate($_POST['address']);
    $phone = validate($_POST['phone']);
    $status = validate($_POST['status']);
    $jobdes = validate($_POST['jobdes']);
    $jobdate = validate($_POST['jobdate']);
    $ref = validate($_POST['ref']);


    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://d7sms.p.rapidapi.com/secure/sendbatch",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\r
        \"messages\": [\r
            {\r
                \"content\": \"Bulk SMS Content\",\r
                \"from\": \"D7-Rapid\",\r
                \"to\": [\r
                    \"Destination1\",\r
                    \"Destination2\"\r
                ]\r
            }\r
        ]\r
    }",
        CURLOPT_HTTPHEADER => [
            "Authorization: Basic YmduYTE2MTQ6VzFNdDg4YUY=",
            "X-RapidAPI-Host: d7sms.p.rapidapi.com",
            "X-RapidAPI-Key: 8fdd9b5e83msh0cc5a517ed65500p10b365jsnfe85af74468c",
            "content-type: application/json"
        ],
    ]);
    var_dump("Curl :", $curl);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    var_dump("Response:", $response);
    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }  

    $name = "'".$name."'";
    $add = "'".$add."'";
    $phone = "'".$phone."'";
    $status = "'".$status."'";
    $jobdes = "'".$jobdes."'";
    $jobdate = "'".$jobdate."'";
    $ref = "'".$ref."'";

    $sql = "INSERT INTO messages (name, address, phone, status, jobdes, jobdate, ref) VALUES ($name, $add, $phone, $status, $jobdes, $jobdate, $ref)";
    mysqli_query($conn, $sql);
    $_SESSION['msg'] = "Success";
    //header("Location: home.php");
    
}else{
    header("Location: ../index.php");
    exit();
}

