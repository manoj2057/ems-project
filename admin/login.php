<html>

<head>
    <title>Admin login of EMS</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <?php include("../php/connection.php"); ?>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br>
        <?php
        // session_start();
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }

        if (isset($_SESSION['no-login-message'])) {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
        ?>
        <form action="#" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Login" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <br><br>



        <p class="text-center">Created By:<a href="manojpokharel733@gmail.com">Manoj pokharel</a></p>


        <?php

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM tbl_admin where username='$username' && password='$password'";
            // echo $sql;
            // die();
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {

                $_SESSION['login'] = "<div class='success'> LOGIN succesffuly</div>";
                $_SESSION['user'] = $username;
                header('location:manage-admin.php');
            } else {

                $_SESSION['login'] = "<div class='error'> LOGIN Failed</div>";
                // echo $_SESSION['login'];
                header('location:login.php');
            }
        }
        ?>