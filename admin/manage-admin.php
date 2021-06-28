<?php include('../php/connection.php');  ?>
<!-- Menu Selection Starts -->

<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1 style="text-align: center;">Manage Admin</h1>
        <br>
        <!-- Button to Add Admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br><br>

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