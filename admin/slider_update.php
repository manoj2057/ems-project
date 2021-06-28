<?php

include "../php/connection.php";
$id = $_GET['id'];

$qry = mysqli_query($conn, "select * from sliders where id='$id'");

$data = mysqli_fetch_array($qry);

if (isset($_POST['submit'])) {


  $img_name = $_FILES['img']['name'];
  $temp_name = $_FILES['img']['tmp_name'];
  $old = "SELECT * FROM sliders WHERE id = '$id' ";
  $old_run = mysqli_query($conn, $old);
  $old_row = mysqli_fetch_array($old_run);
  $img = $old_row['img'];
  unlink("../image/$img");
  $move = "../image/$img_name";
  move_uploaded_file($temp_name, $move);
  $content = $_POST['content'];




  $edit = "UPDATE sliders set  content='$content', img='$img_name'  where id='$id'";

  $run = mysqli_query($conn, $edit);

  header('Location: slider_view.php');
}
?>
<html>

<head>
  <title>Testimonial Area</title>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>

<body>
  <div class="alert alert-dark h1" role="alert">
    updte Area Of sliders
  </div>
  <a href="slider_view.php" class="btn btn-primary btn-md">Go Back</a>
  <div class="container">
    <div class="jumbotron">

      <form action="" method="POST" enctype="multipart/form-data">

        <!-- Textarea -->
        <div class="form-group">
          <label class="col-md-12 control-label h4" for="textarea">content:</label>
          <div class="col-md-12">
            <textarea class="form-control" id="content" name="content" rows="7"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-12 control-label h4" for="textarea">Img:</label>
          <div class="col-md-12">
            <input class="form-control" type="file" name="img">
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-12">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg">
          </div>
        </div>
      </form>

    </div>
  </div>

</body>

</html>