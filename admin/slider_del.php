<?php

include("../php/connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $old = "SELECT * FROM sliders WHERE id = '$id' ";
    $old_run = mysqli_query($conn, $old);
    $old_row = mysqli_fetch_array($old_run);
    $img = $old_row['img'];
    unlink("../image/$old_row[img]");


    $sql = " DELETE FROM sliders WHERE id = '$id' ";
    $run = mysqli_query($conn, $sql);

    if ($run) {
        header("location: slider_view.php");
    } else {
        echo "Sorry!!!";
    }
}
