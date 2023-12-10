<?php
session_start();
error_reporting(0);
include("includes/config.php");
if(isset($_POST['submit']))
{
    $regno=$_POST['regno'];
    $password=md5($_POST['password']);
$query=mysqli_query($con,"SELECT * FROM students WHERE StudentRegno='$regno' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$_SESSION['login']=$_POST['regno'];
$_SESSION['id']=$num['studentRegno'];
$_SESSION['sname']=$num['studentName'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into userlog(studentRegno,userip,status) values('".$_SESSION['login']."','$uip','$status')");
header("location:http:change-password.php");
}else{
$_SESSION['errmsg']="Invalid Reg no or Password";
header("location:http:index.php");
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

    <title>Home Page</title>
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
   <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php include('includes/header.php');?>
    <section class="menu-section">
    <nav class="navbar navbar-expand-md" style="background-color:#0d0c0c;">
  <!-- Navbar content here -->


    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-top">
            <span class="navbar-toggler-icon"></span>
        </button>
        <section class="menu-section">
        <div class="collapse navbar-collapse" id="menu-top">
            <ul id="menu-top" class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php"><i class="fas fa-home"></i> <b>Home</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin/"><i class="fas fa-user"></i><b> Admin Login</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="student/"><i class="fas fa-user-graduate"></i><b> Student Login</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="student/aboutus.php"><i class="fas fa-sign-out-alt"></i><b>About US</b></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    </section>

    <div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line ">Welcome to Learning point</h4>
            </div>
        </div>
        <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-info">
                    <strong> Notice Board:</strong>
                    <marquee direction='up'  scrollamount="2" onmouseover="this.stop();" onmouseout="this.start();">
                        <ul>
                            <?php
                            $sql=mysqli_query($con,"select * from news");
                            $cnt=1;
                            while($row=mysqli_fetch_array($sql)) {
                            ?>
                            <li>
                                <a href="news-details.php?nid=<?php echo htmlentities($row['id']);?>">
                                    <?php echo htmlentities($row['newstitle']);?>-<?php echo htmlentities($row['postingDate']);?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </marquee>
                </div>
            </div>
            <!-- New div for the image -->
            <div class="col-md-6">
              <!--  <img src="assets/img/homeicon.jpg" alt="logo" width="500" height="800">-->
            </div>
        </div>
        
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line ">Our Services</h4>
            </div>
        </div>
</div>

        <div class="row">
            <div class="col-md-12">
        <?php include('includes/card.php');?>
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


