<?php

require_once('.../../php/connection.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * from `signup` WHERE email = '$email' AND password = '$password'";
$sqlid = "SELECT id from `signup` WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $sql);
$id = mysqli_query($conn, $sqlid);

$empid = "";
if (mysqli_num_rows($result) == 1) {

    $employee = mysqli_fetch_array($id);
    $empid = ($employee['id']);


    //echo ("logged in");
    //echo ("$empid");

    header("Location: ../index.html");
} else {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid Email or Password')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}
