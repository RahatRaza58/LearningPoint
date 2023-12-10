<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<body style="background-color:white;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <style>
        form {
    background-color: #b5e8e9;
    padding: 15px;
    box-shadow: 0px 0px 10px 0px;
    border-radius: 15px;
    margin: 20px auto 0; /* Center the form horizontally and push it 20px from the top */
    max-width: 400px; /* Set a maximum width for the form */
}

      
    </style>


</head>
<body>

<?php include('includes/header.php');?>
    
<div class="conatiner-fluid">
    <div class="conatiner-fluid">
        <div class="row justify-content-center mt-10">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="alert">
                  <?php
                  if(isset($_SESSION['status']))
                  {
                    echo"<h4>".$_SESSION['status']."</h4>";
                    unset($_SESSION['status']);
                  }
                  ?>
</div>
                <form action="verifytoken.php" method="post">
                    <div class="mb-3">
                    <h2><b><i>Learning Point</i></b></h2> 
                    <h4>Register Form</h4>
                    </div>
                    <div class="mb-3">
                      Name : 
                      <input type="text" class="form-control" name = "r_username">
                    </div>
                    
                    <div class="mb-3">
                      Email :
                      <input type="text" class="form-control" name="r_email">
                    </div>

                    <div class="mb-3">
                      Phone Number :
                      <input type="tel" class="form-control" name="r_phonenumber">
                    </div>

                    <div class="mb-3">
                      Password :
                      <input type="password" class="form-control" name="r_pass">
                    </div>

                    <div class="mb-3">
                      Confirm Password :
                      <input type="password" class="form-control" name="r_con_pass">
                    </div>

                    <div class="mb-3">
                      Date Of Birth :
                      <input type="date" class="form-control" name="r_dob">
                    </div>

                    
                    <button type="submit" class="btn btn-primary col-12" name="reg_btn">Register</button>
                    Already have a account? <a href="index.php">login here</a>
                </form>
            </div>
        </div>
    </div>

      </div>
    
      <footer class="footer mt-auto py-3">
    <div class="container text-center">
        <p class="mb-0">&copy; <?php echo date("Y"); ?> Learning Point. All rights reserved.</p>
    </div>
</footer>
    <!-- CONTENT-WRAPPER SECTION END-->
   
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>