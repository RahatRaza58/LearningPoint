<?php
session_start();
include('includes/config.php');
error_reporting(E_ALL);
if(strlen($_SESSION['alogin']) == 0)
{   
    header('location:index.php');
}
else {
    // Code for Insertion
    if(isset($_POST['submit']))
    {
        

        $coursecategory = $_POST['coursecategory'];
        $coursename = $_POST['coursename'];
        $coursefee = $_POST['coursefee'];
        $seatlimit = $_POST['seatlimit'];
        $image = $_FILES["pImage"]["name"];
        $target_dir = "coursepic/";
        $target_file = $target_dir . basename($_FILES["pImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["pImage"]["tmp_name"]);
        if($check === false) {
            echo '<script>alert("File is not an image.")</script>';
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["pImage"]["size"] > 500000) {
            echo '<script>alert("Sorry, your file is too large.")</script>';
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo '<script>alert("Sorry, your file was not uploaded.")</script>';
        } else {
            // if everything is ok, try to upload file
            if (move_uploaded_file($_FILES["pImage"]["tmp_name"], $target_file)) {

                // Directly inject values into the SQL query
                $sql = "INSERT INTO course (courseCategory, courseName, Coursefee, SeatLimit, course_image) VALUES ('$coursecategory', '$coursename', '$coursefee', '$seatlimit', '$image')";

                // Execute the query
                $ret = mysqli_query($con, $sql);

                // Check for success
                if ($ret) {
                    echo '<script>alert("Course Created Successfully !!")</script>';
                    echo '<script>window.location.href=course.php</script>';
                } else {
                    echo '<script>alert("Error : Course not created!!")</script>';
                    echo '<script>window.location.href=course.php</script>';
                }
            } else {
                echo '<script>alert("Sorry, there was an error uploading your file.")</script>';
            }
        }
    }

    // Code for Deletion
    if(isset($_GET['del']))
    {
        mysqli_query($con,"delete from course where id = '".$_GET['id']."'");
        echo '<script>alert("Course deleted!!")</script>';
        echo '<script>window.location.href=course.php</script>';
    }
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Admin | Course</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['alogin']!="")
{
 include('includes/menubar.php');
}
 ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Course  </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Course 
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">
   
                       <form name="dept" method="post" enctype="multipart/form-data">
 <div class="form-group">
    <label for="coursename">Course Name  </label>
    <input type="text" class="form-control" id="coursename" name="coursename" placeholder="Course Name" required />
  </div>

  <div class="form-group">
    <label for="coursename">Course Category  </label>
    <input type="text" class="form-control" id="coursename" name="coursecategory" placeholder="Course Category" required />
  </div>

<div class="form-group">
    <label for="courseunit">Course fee  </label>
    <input type="text" class="form-control" id="coursefee" name="coursefee" placeholder="Course fee" required />
  </div> 

<div class="form-group">
    <label for="seatlimit">Seat limit  </label>
    <input type="text" class="form-control" id="seatlimit" name="seatlimit" placeholder="Seat limit" required />
  </div>   
  <div class="form-group">
  <div class="custom-file">
    <label for="customFile" class="custom-file-label">Choose Course Image</label>
    <input type="file" name="pImage" class="custom-file-input" id="customFile" required>
  </div> 
 <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>
                <font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Course
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course Name</th>
                                            <th>Course Category </th>
                                            <th>Course Fee</th>
                                            <th>Seat limit</th>
                                             <th>Image</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($con,"select * from course");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


<tr>
    <td><?php echo $cnt;?></td>
    <td><?php echo htmlentities($row['courseCategory']);?></td>
    <td><?php echo htmlentities($row['courseName']);?></td>
    <td><?php echo htmlentities($row['coursefee']);?></td>
    <td><?php echo htmlentities($row['SeatLimit']);?></td>
    <td>
        <?php
        $imagePath = "coursepic/" . $row['course_image'];
        echo '<img src="coursepic/' . $imagePath . '" alt="Course Image" style="max-width: 100px; max-height: 100px;">';
        ?>
    </td>
    <td>
        <a href="edit-course.php?id=<?php echo $row['id']?>">
            <button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
        </a>
        <a href="course.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
            <button class="btn btn-danger">Delete</button>
        </a>
    </td>
</tr>
<?php 
$cnt++;
} ?>

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!--  End  Bordered Table  -->
                </div>
            </div>





        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="../assets/js/bootstrap.js"></script>
</body>
</html>

