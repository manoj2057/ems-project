<?php include('../php/connection.php');  ?>
<!-- Menu Selection Starts -->

<!-- Main Content Section Starts -->
<div class="main-content" style="padding-right: 10px;text-align:center;">
    <div class="wrapper">
        <h1 style="text-align: center;"> Admin pannel</h1><br>
        <!-- Button to Add Admin -->
        <div id="div">
            <h3>Manage admin</h3>
            <a href="add-admin.php" class="btn-primary">Add Admin</a><br><br>

            <h3 style="text-align: center;">Manage user</h3>
            <table class="tbl-full" border="1px soli" style=" border-collapse: collapse; width: 100%; margin: auto;
  border: 3px solid ; ">
                <tr>
                    <th>S.N</th>
                    <th>First Name</th>
                    <th>lastname</th>
                    <th>email</th>
                    <th>Password</th>
                    <th>gender</th>
                    <th>adress</th>
                    <th>pincode</th>
                    <th>card_type</th>
                    <th>Card_number</th>
                    <th>Exp_date</th>
                    <th>Cvv</th>
                    <th>Action</th>
                </tr>
                <?php

                $sql = "SELECT * FROM signup";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr style="text-align: center;">
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo  $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['pincode']; ?></td>
                            <td><?php echo $row['card_type']; ?></td>
                            <td><?php echo $row['card_number']; ?></td>
                            <td><?php echo $row['exp_date']; ?></td>
                            <td><?php echo $row['cvv']; ?></td>
                            <td>

                                <a href="delete-user.php?id=<?php echo $row['id']; ?>" class="btn-danger">Delete user</a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </table>

            <div class="clearfix"></div>
        </div>
        <!--  Main Content Section Ends -->

        <!-- Footer Selection Starts -->
        <!-- <?php include('partials/footer.php');  ?> -->

        </body>

        </html>






        <html>

        <head>
            <title>Slider View Area</title>
            <link rel="stylesheet" type="text/css" href="../css/style.css">
            <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        </head>

        <body style="margin-top: 10px;">
            <h2 style="text-align: center;margin: 10px; margin-bottom: -5px;">
                <ul>Manage slider</ul>
            </h2>
            <br><br>
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