<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("includes/config.php");


if(isset($_POST['submit']))
{
    $r_email = $_POST["r_email"];
    $r_pass = $_POST["r_pass"];
    $query = mysqli_query($con,"SELECT * FROM students WHERE email='$r_email' and password='$r_pass'");
    $num = mysqli_fetch_array($query);
    if($num > 0)
    {
        $_SESSION['login'] = $_POST['r_email'];
        $_SESSION['id'] = $num['studentRegno'];
        $_SESSION['sname'] = $num['studentName'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;
        $log = mysqli_query($con,"INSERT INTO userlog(studentRegno,userip,status) VALUES('".$_SESSION['login']."','$uip','$status')");
        header("location: my-profile.php");
    }
    else
    {
        $_SESSION['errmsg'] = "Invalid Email or Password";
        header("location: index.php");
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Student Login</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php include('includes/header.php');?>

<section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">

                            <!--<li><a href="admin/">Admin Login </a></li> -->
                            <li><a href="../home.php"><i class="fas fa-home"></i> <b>Home</b></a></li>
                             <li><a href="../admin/index.php"><i class="fas fa-user"></i><b> Admin Login</b> </a></li>
                              <li><a href="../student/index.php"><i class="fas fa-user-graduate"></i><b> Student Login</b></a></li>
                              <li><a href="aboutus.php"><i class="fas fa-info-circle"></i><b> About Us</b></a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php
                  if(isset($_SESSION['status']))
                 { 
                  ?>
                  <div class="alert alert-sucess">
                  <h5><?=$_SESSION['status']?></h5>
                  </div>
                  <?php
                    unset($_SESSION['status']);
                 }
                 ?>

<h4 class="page-head-line">Please Login To Enter </h4>

</div>

</div>
<span style="color:black;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
<form name="admin" method="post">
<div class="row">
<div class="col-md-6">
     <label>Enter Email: </label>
        <input type="text" name="r_email" class="form-control"  />
        <label>Enter Password :  </label>
        <input type="password" name="r_pass" class="form-control"  />
        <hr />
        <button type="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Log  In </button>&nbsp;
        New User? <a href="registerformStudent.php">Register here</a>
</div>
</form>
                <div class="col-md-6">
                    <div class="alert alert-info">
                
                         <strong> Notice Board:</strong>
                         <marquee direction='up'  scrollamount="2" onmouseover="this.stop();" onmouseout="this.start();">
                        <ul>
                            <?php
$sql=mysqli_query($con,"select * from news");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
                            <li>
                              <a href="news-details.php?nid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['newstitle']);?>-<?php echo htmlentities($row['postingDate']);?></a>
                            </li>
                           <?php } ?> 
                     
                        </ul>
                    </marquee>
                       
                    </div>
                                    </div>

            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
