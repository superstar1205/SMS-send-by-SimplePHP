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
    if (empty($name)||empty($add)||empty($phone)||empty($status)||empty($jobdes)||empty($jobdate)||empty($ref) ) {
        $_SESSION['msg']="You have to fill all field!";
        header("Location: home.php");
        exit();
    }else{
        
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
                    \"content\": \"Name: ".$name.", Address: ".$add.", Status: ".$status."\",\r
                    \"from\": \"Devking\",\r
                    \"to\": [\r
                        \"14168232377\",\r
                        \"2349039727161\"\r
                    ]\r
                }\r
            ]\r
        }",
            CURLOPT_HTTPHEADER => [
                "Authorization: Basic YmduYTE2MTQ6VzFNdDg4YUY=",
                "X-RapidAPI-Host: d7sms.p.rapidapi.com",
                "X-RapidAPI-Key: 709e89502fmsh75fec966c5c26cbp105fdfjsn909fd8df0446",
                "content-type: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

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
        $_SESSION['msg'] = "SMS send Success!";
        header("Location: home.php");
    }
}else{
    header("Location: ../index.php");
    exit();
}

