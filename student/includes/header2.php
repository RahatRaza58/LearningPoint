<?php
include("includes/config.php");
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
                   
                    
                </div>

            </div>
        </div>
    </header>
    <?php } ?>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
    <style>
    .navbar-inverse.set-radius-zero {
            background-color:#f7f8fa;   
        }
        </style>
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand" href="#" style="color:white; font-size:26px; line-height:28px; display: flex; align-items: left;">
    <img src="assets/img/logo7.png" alt="logo" width="170" height="180" style="margin-right: 8px;">
    <b>  </b>
    <small style="display: block; font-style: italic; font-size: 16px; color:white;position: absolute; bottom: 40px; right:900px;">Discover Your Next Skill </small>
</a>


            </div>

            <div class="left-div">
               

                <i class="" style="font-size:65px;color:white"></i>

                
        </div>
            </div>
        </div>