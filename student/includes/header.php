<?php
// include("includes/config.php");
error_reporting(0);
?>
<?php if($_SESSION['login']!="")
{?>
<header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Welcome: </strong><?php echo htmlentities($_SESSION['sname']);?>
                    &nbsp;&nbsp;
                    


                    <strong>Last Login:<?php 
        $ret=mysqli_query($con,"SELECT  * from userlog where studentRegno='".$_SESSION['login']."' order by id desc limit 1,1");
                    $row=mysqli_fetch_array($ret);
                    echo $row['userip']; ?> at <?php echo $row['loginTime'];?></strong>
                </div>

            </div>
        </div>
    </header>
    <?php } ?>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
    <style>
    .navbar-inverse.set-radius-zero {
            background-color:#9cafb5;   
        }
        </style>
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand" href="#" style="color:white; font-size:26px; line-height:28px; display: flex; align-items: left;">
    <img src="assets/img/logo.png" alt="logo" width="120" height="120" style="margin-right: 4px;">
    <b>Learning Point</b>
    <small style="display: block; font-style: italic; font-size: 16px; color:white;position: absolute; bottom: 40px; right:900px;">Discover Your Next Skill</small>
</a>


            </div>

            <div class="left-div">
               <!-- <i class="fa fa-user-plus login-icon" ></i>
                <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>

                <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
                <span class="sr-only">Loading...</span>-->

                <i class="fa fa-institution" style="font-size:65px;color:white"></i>

                
        </div>
            </div>
        </div>