<?php
error_reporting(0);
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    //Database connection
    $conn = new PDO("localhost","root","","registration");
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(username, password)
        values(?, ?, ?)");
        $stmt->bind_param("ssi", $Username, $Email, $Password);
        $stmt->execute();
        echo "Log in successfully...";
        $stmt->close();
        $conn->close();
    }
