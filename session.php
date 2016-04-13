<?php
    $date = date("format", $timestamp);
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    // connect to server
    @ $con = mysql_connect("localhost", "admin", "password");
    if(!$con){
        die("Unable to connect to database [" . mysql_error() . "]");
    }

    // select specified DB from server
    $db_selected = mysql_select_db("admin", $con);
    if(!$db_selected){
        die("cant use admin : " . mysql_error());
    }

    $email = mysql_real_escape_string(stripslashes($email), $con);
    $password = mysql_real_escape_string(stripslashes($password), $con);

    $sql = "SELECT * FROM admin.customers WHERE email='$email' AND password='$password'";

    if(mysql_num_rows(mysql_query($sql, $con)) == 1){
        header("location: catalog.php");
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
    }
    else{
        header("location: login.php");
    }
?>