<html>

<head>
    <title>Slider View Area</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>

<body>
    <div id="slidebar">

        <a href="../index.php" class="btn btn-primary btn-md">Add Slider Image</a>

        <table class="table table-dark table-striped">
            <tr>
                <th>SN.</th>
                <th>Slider Image</th>
                <th>Slider Content</th>
                <th>Uploaded At</th>
                <th>Action</th>
            </tr>

    </div>

    <?php
    include("../php/connection.php");
    $sql = "SELECT * FROM sliders";

    $run = mysqli_query($conn, $sql);
    $i = 0;
    while ($row = mysqli_fetch_array($run)) {
        $i++;
    ?>

        <tr>
            <td><?php echo $i; ?></td>
            <td><img src="../image/<?php echo $row['img']; ?>" height=100px; width=100px;></td>
            <td><?php echo $row['content']; ?></td>
            <td><?php echo $row['uploaded_at']; ?></td>
            <td><a class="btn btn-danger btn-md" href="slider_del.php?id=<?php echo $row['id']; ?>">Delete</td>
            <td><a class="btn btn-danger btn-md" href="slider_update.php?id=<?php echo $row['id']; ?>">Update</td>
        </tr>
    <?php
    }
    ?>
    </table>
</body>

</html>