<?php
    $id_card = $_POST['id_card'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $re_password = $_POST['re_pass'];

    // database connection
    $conn = new mysqli('127.0.0.1:3310','root','','admission');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into register(id_card, email, password, re_password)
        values(?, ?, ?, ?)");
        $stmt->bind_param("ssss",$id_card, $email, $password, $re_password);
        $stmt->execute();
        echo "register ok...";
        $stmt->close();
        $conn->close();

    }
?>