<?php

// connect to the database so user information can be saved
include("includes/db.php");

// include files needed for sending email verification
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// import phpmailer classes so email functions can be used
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$message = "";

if (isset($_POST['register'])) {

    // get form data from the registration form
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    // check if passwords match
    if ($password != $confirm) {

        $message = "Passwords do not match.";
    } else {

        // save new user account
        mysqli_query(
            $conn,
            "INSERT INTO users
            (
                fullname,
                email,
                password,
                address,
                contact,
                role,
                status
            )
            VALUES
            (
                '$fullname',
                '$email',
                '$password',
                '$address',
                '$contact',
                'buyer',
                'pending'
            )"
        );

        // create verification link
        $verify_link = "https://calamarestechhub.nfy.fyi/verify.php?email=" . $email;
        
        try {

            // send verification email
            $mail = new PHPMailer(true);

            // connect to gmail so the system can send verification emails
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'gcarago@fit.edu.ph';

            // gmail application password
            $mail->Password = 'dqujusniljxisvtl';

            // use secure gmail connection and required smtp port
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom(
                'gcarago@fit.edu.ph',
                'CALAMARES Tech Hub'
            );

            // send message to the user who just registered
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'CALAMARES Account Verification';
            $mail->Body = "
                <h2>Welcome to CALAMARES Tech Hub</h2>

                <p>Thank you for registering.</p>

                <p>Click the link below to verify your account:</p>

                <p>
                    <a href='$verify_link'>Verify Account</a>
                </p>
            ";

            $mail->send();
            $message = 'Registration Successful. Verification email sent.';

          // display error if email sending fails
        } catch (Exception $e) {

            $message = 'Registration Successful but email could not be sent.<br>' . $mail->ErrorInfo;
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    <?php include("includes/navbar.php"); ?>

    <div class="container flex-grow-1 py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h2 class="text-center mb-4">Create Account</h2>

                        <?php
                        if ($message != "") {
                            echo "<div class='alert alert-info'>$message</div>";
                        }
                        ?>

                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Complete Name</label>
                                <input type="text" name="fullname" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Complete Address</label>
                                <textarea name="address" class="form-control" rows="2" required></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Contact Number</label>
                                <input type="text" name="contact" class="form-control" required>
                            </div>

                            <button type="submit" name="register" class="btn btn-success w-100 py-2">
                                Register
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("includes/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>