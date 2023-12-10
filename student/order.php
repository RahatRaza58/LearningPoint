<?php
session_start();
include('includes/config.php');

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

<!-- <div class="py-3 bg-primary">
    <div class= "container">
        <h6 class="Text-White>
        <a href="index.php" class="text-white">
            Home/
        </a>
        <a href="order.php" class="text-white">
            Checkout
            </a>
    </h6>
</div>
</div>   -->
<hr>
<div class="container">
 <div class="card-body-shadow">
 <div class="row justify-content-md-center">
<div class= "col-md-7">
    <h3>Basic Details</h3>
    <hr>
    <div class="row justify-content-md-center">
        <div class="col-md-6 mb-3">
<label class="fw-bold"> Name</label>
<input type="text" name="name" id="name"  required placeholder="Enter your full name" class="form-control">
   <small class="text-danger name"></small>     
    </div>
        <div class="col-md-6 mb-3">
        <label class="fw-bold"> Email</label>
      <input type="email" name="email" id="email"  required placeholder="Enter your email" class="form-control">
        </div> 
        <div class="col-md-6 mb-3">
        <label class="fw-bold"> Mobile</label>
      <input type="tel" name="phone" id="phone"  required placeholder="Enter your phone number" class="form-control">
        </div>
        <div class="col-md-6 mb-3">
        <label class="fw-bold">Register ID</label>
       <input type="password" name="password" id="password"  required placeholder="Enter your register id" class="form-control">
        </div>
        <div class="col-md-12 mb-3">
        <label class="fw-bold"> Address</label>
         <textarea name="address" id="address"required class="form-control" rows="5"></textarea>
        </div>
    </div>
    </div>
    <div class= "col-md-5">
        <h3>Order Details</h3>
        <hr>
        <table class="table table-bordered" width="400px" style="font-size: 13px;"> <!-- Adjust the font size as needed -->
        <tr>
            <th>Course Name :</th>
            <td></td> 
        </tr>
        <tr>
            <th>Course Category :</th>
            <td></td> 
        </tr>
        <tr>
            <th>Course Details :</th>
            <td></td> 
        </tr>
        <tr>
            <th>Seat Limit :</th>
            <td></td> 
        </tr>
        <tr>
            <th>Total Price :</th>
            <td></td> 
        </tr>
</table>
<div class="">
<button class="btn btn-primary"> Confirm and Place order</button>
<hr>
<div id="paypal-button-container"></div>
</div>
</div>
<script src="https://www.paypal.com/sdk/js?client-id=AUyE9nCqpJ8rU9fQF2ndBOISwzwBMVp-4lrwwskHLxpS-Cngu7XMyiHl6VWxzeKnWcDOvxTZfd32s_Nt&currency=USD"></script>
<script>
window.paypal
  .Buttons({
    onClick(){

        var name=$('#name').val();
        var email=$('#email').val();
        var phone=$('#phone').val();
        var password=$('#password').val();
        var address=$('#address').val();
        alert(name.length);
        if(name.length==0)
        {
            $('.name').text("*This field is required");
        } else{
            $('.name').text("");
        }
        if(email.length==0)
        {
            $('.email').text("*This field is required");
        } else{
            $('.email').text("");
        }
        if(phone.length==0)
        {
            $('.phone').text("*This field is required");
        } else{
            $('.phone').text("");
        }
        if(password.length==0)
        {
            $('.password').text("*This field is required");
        } else{
            $('.password').text("");
        }
        if(address.length==0)
        {
            $('.address').text("*This field is required");
        } else{
            $('.address').text("");
        }
        if(name.length==0 || email.length==0 || phone.length==0 || password.length==0 || address.length==0 )
        {
            return false;
        }
    },
    async createOrder() {
      try {
        const response = await fetch("/api/orders", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          // use the "body" param to optionally pass additional order information
          // like product ids and quantities
          body: JSON.stringify({
            cart: [
              {
                id: "YOUR_PRODUCT_ID",
                quantity: "YOUR_PRODUCT_QUANTITY",
              },
            ],
          }),
        });
        
        const orderData = await response.json();
        
        if (orderData.id) {
          return orderData.id;
        } else {
          const errorDetail = orderData?.details?.[0];
          const errorMessage = errorDetail
            ? `${errorDetail.issue} ${errorDetail.description} (${orderData.debug_id})`
            : JSON.stringify(orderData);
          
          throw new Error(errorMessage);
        }
      } catch (error) {
        console.error(error);
        resultMessage(`Could not initiate PayPal Checkout...<br><br>${error}`);
      }
    },
    async onApprove(data, actions) {
      try {
        const response = await fetch(`/api/orders/${data.orderID}/capture`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
        });
        
        const orderData = await response.json();
        // Three cases to handle:
        //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
        //   (2) Other non-recoverable errors -> Show a failure message
        //   (3) Successful transaction -> Show confirmation or thank you message
        
        const errorDetail = orderData?.details?.[0];
        
        if (errorDetail?.issue === "INSTRUMENT_DECLINED") {
          // (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
          // recoverable state, per https://developer.paypal.com/docs/checkout/standard/customize/handle-funding-failures/
          return actions.restart();
        } else if (errorDetail) {
          // (2) Other non-recoverable errors -> Show a failure message
          throw new Error(`${errorDetail.description} (${orderData.debug_id})`);
        } else if (!orderData.purchase_units) {
          throw new Error(JSON.stringify(orderData));
        } else {
          // (3) Successful transaction -> Show confirmation or thank you message
          // Or go to another URL:  actions.redirect('thank_you.html');
          const transaction =
            orderData?.purchase_units?.[0]?.payments?.captures?.[0] ||
            orderData?.purchase_units?.[0]?.payments?.authorizations?.[0];
          resultMessage(
            `Transaction ${transaction.status}: ${transaction.id}<br><br>See console for all available details`,
          );
          console.log(
            "Capture result",
            orderData,
            JSON.stringify(orderData, null, 2),
          );
        }
      } catch (error) {
        console.error(error);
        resultMessage(
          `Sorry, your transaction could not be processed...<br><br>${error}`,
        );
      }
    },
  })
  .render("#paypal-button-container");
  </script>
 
