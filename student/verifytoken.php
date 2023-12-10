<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("includes/config.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendemail_verify($r_username,$r_email,$r_verify_token)
{
    $mail = new PHPMailer(true);
    //$mail->SMTPDebug = 2;

$mail->isSMTP();
$mail->Host       = "smtp.gmail.com";
$mail->SMTPAuth   = true;
$mail->Username   = "tazinchy10@gmail.com";
$mail->Password   = "cwvtzmklgfvhnleq";
$mail->SMTPSecure = "tls";
$mail->Port       = 587;

$mail->setFrom("tazinchy10@gmail.com", $r_username);
$mail->addAddress($r_email);
$mail->isHTML(true);

$mail->Subject = "Email Verification from Learning Point";
$mail_template="
   
   <h2>You have Registered with Learning Point</h2>
   <h5>Verify your email address to login with the below given link</h5>
   <br/><br/>
   <a href='http://localhost/luonlinecoursereg/onlinecourse/student/verify-email.php?token=$r_verify_token'>Click Me</a>
   ";

    $mail->Body    = $mail_template;
    $mail->send();
   


    try {
        //$mail->send();
        $_SESSION['status'] = 'Email has been sent';
    } catch (Exception $e) {
        $_SESSION['status'] = "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  

}

if (isset($_POST["reg_btn"])) {
    $r_username = $_POST['r_username'];
    $r_pass = $_POST["r_pass"];
    $r_con_pass = $_POST["r_con_pass"];
    $r_email = $_POST["r_email"];
    $r_phonenumber = $_POST["r_phonenumber"];
    $r_dob = $_POST["r_dob"];
    $r_verify_token = md5(rand());
    $_phonenumber_pattern = "/(\+88)?-?01[3-9]\d{8}/";
    $_username_pattern = "/^[a-zA-Z_\-]+$/";
    $_email_pattern = "/[a-z0-9]+@[a-z]+\.[a-z]{2,3}/";
    $_pass_pattern = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/"; //Minimum eight characters, at least one letter and one number
    $duplicate_username = mysqli_query($con, "SELECT * FROM `students` WHERE studentName='$r_username'");
    $errors = array(); // Create an array to store validation errors

    // Validate email against regex pattern
    if (!preg_match($_email_pattern, $r_email)) {
        $errors[] = "Invalid Email format!";
    }

    // Validate phone number against regex pattern
    if (!preg_match($_phonenumber_pattern, $r_phonenumber)) {
        $errors[] = "Invalid Phone Number format!";
    }

    // Validate password against regex pattern
    if (!preg_match($_pass_pattern, $r_pass)) {
        $errors[] = "Invalid Password format!";
    }

    if ($r_pass !== $r_con_pass) {
        $errors[] = "Pass and con-pass do not match!";
    }

    // Check if there are any validation errors
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
        echo "<script>location.href='../student/registerformStudent.php'</script>";
        exit; // Halt the registration process
    } else {
        // Initialize $insert_query here
        $insert_query = "INSERT INTO `students`(`studentName`, `password`, `email`, `phonenumber`, `dob`, `verify_token`) VALUES ('$r_username', '$r_pass', '$r_email', '$r_phonenumber', '$r_dob', '$r_verify_token')";
        
        // Check if email already exists
        $check_email_query = "SELECT email FROM students WHERE email='$r_email' LIMIT 1";
        $check_email_query_run = mysqli_query($con, $check_email_query);

        if (mysqli_num_rows($check_email_query_run) > 0) {
            $_SESSION['status'] = "Email ID already Exists";
            header("Location: registerformStudent.php");
        } else {
            // Execute the insertion query
            $query_run = mysqli_query($con, $insert_query);

            if ($query_run) {
                sendemail_verify($r_username, $r_email, $r_verify_token);
                $_SESSION['status'] = "Registration Successful! Please verify your email address.";
                header("Location: registerformStudent.php");
            } else {
                $_SESSION['status'] = "Registration Failed: " . mysqli_error($con);
                header("Location: registerformStudent.php");
            }
        }
    }
}

?>









