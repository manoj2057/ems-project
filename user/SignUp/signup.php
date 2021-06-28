<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login form</title>
    <link rel="stylesheet" href="signup.css" />
</head>

<body>
    <a href="../../index.html">Home</a>
    <div class="container">

        <form action="" class="signUp" method="POST">
            <h1 class="mainHeading">SignUp</h1>
            <p>Required field are followed by *</p>
            <p>
                First Name:
                *<input type="text" name="firstname" placeholder="Write your first Name" value="" required>
            </p>

            <p>
                Last Name:
                *<input type="text" name="lastname" placeholder="Write your last Name" value="" required>
            </p>

            <p>
                Email: * <input type="email" name="email" placeholder="Write your email" value="" required />
            </p>

            <p>
                Password:
                *<input type="password" name="password" placeholder="Write your password" value="" required />
            </p>

            <fieldset>
                <legend>Gender</legend>
                <p>
                    *<input type="radio" id="male" name="gender" value="male" />Male
                    <input type="radio" id="female" name="gender" value="female" />Female
                    <input type="radio" id="other" name="gender" value="other" />Other
                </p>
            </fieldset>
            <p>Address <textarea name="address" id="address" cols="100" rows="5" required></textarea> </p>
            <p>Pincode <input type="number" name="pincode" id="pincode" required></p>
            <h2>Payment Information</h2>
            <p> Card Type:
                <select name="card_type" id="card_type">
                    <option value="">---Select a Card Type--</option>
                    <option value="visa">Visa</option>
                    <option value="esewa">e-sewa</option>
                    <option value="mastercard">Mastercard</option>
                </select>
            <p>
                Card Number<input type="number" name="card_number" id="card_number" />
            </p>
            <p>
                Expiration Date: <input type="date" name="exp_date" id="exp_date">
            </p>
            <p>CVV *<input type="password" name="cvv" id="cvv"> </p>
            </p>
            <input type="submit" name=submit value="Submit">
            <input type="reset" value="Reset">
        </form>
    </div>
</body>
<?php include('../../php/connection.php'); ?>
<?php
if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $card_type = $_POST['card_type'];
    $card_number = $_POST['card_number'];
    $exp_date = $_POST['exp_date'];
    $cvv = $_POST['cvv'];

    if (isset($_POST['email'])) {

        $check_email = mysqli_query($conn, "SELECT `email` FROM `signup` WHERE email = '$email'");
        if (mysqli_num_rows($check_email) > 0) {
            $error_message = "This Email Address is already registered. Please Try another.";
            echo ($error_message);
        } else {
            // IF EMAIL IS NOT REGISTERED
            /* -- 
            
            ENCRYPT USER PASSWORD USING PHP password_hash function 
            LEARN ABOUT PHP password_hash - http://php.net/manual/en/function.password-hash.php
            
            -- */

            $user_hash_password = password_hash($_POST['password'], PASSWORD_DEFAULT);




            $sql = "insert into signup values('','$firstname','$lastname','$email','$password','$gender','$address','$pincode','$card_type','$card_number','$exp_date','$cvv')";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
                header('location:../login/login.php');
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);
        }
    }
}

?>