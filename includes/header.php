<?php
include("include/config.php");
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
            background-color:#9cafb5;   
        }
        </style>
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand" href="#" style="color:white; font-size:26px; line-height:28px; display: flex; align-items: left;">
    <img src="assets/img/logoLP.png" alt="logo" width="100" height="100" style="margin-right: 4px;">
    <b>Learning Point</b>
    <small style="display: block; font-style: italic; font-size: 16px; color:white;position: absolute; bottom: 40px; right:900px;">Discover Your Next Skill</small>
</a>


            </div>

            <div class="left-div">
               

                <i class="fa fa-institution" style="font-size:65px;color:white"></i>

                
        </div>
            </div>
        </div>