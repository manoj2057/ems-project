<?php

include("../php/connection.php");

if (isset($_POST['submit'])) {
    $img = $_FILES['img']['name'];
    $temp_name = $_FILES['img']['tmp_name'];
    $move = "../image/$img";
    move_uploaded_file($temp_name, $move);
    $content = $_POST['content'];

    $sql = "INSERT INTO sliders VALUES ( NULL, '$img', '$content', NOW() )";
    $run = mysqli_query($conn, $sql);

    if ($run) {
        header("location: manage-admin.php");
    } else {
        echo "Sorry!!!";
    }
}
