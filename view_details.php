<?php 
  session_start();
  
  include("classes/connect.php");
  include("classes/login.php");
  include("classes/user.php");
  include("classes/post.php");
  include("classes/image.php");

  

// check if the user is login
  $login = new Login();
  $user_data = $login->check_login($_SESSION['Fliptrade_userid']);

    // posting start here
  if($_SERVER['REQUEST_METHOD'] == "POST")  
  {
    $post = new Post();
    $id = $_SESSION['Fliptrade_userid'];
    $result = $post->create_post($id, $_POST,$_FILES);
  }

  $image_class = new Image();
  
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronics | Fliptrade</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"> </script>
  </head>

<style>
  body {font-family: Arial, Helvetica, sans-serif; overflow: hidden; }
  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 20%;
    top: 0;
    width: 70%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */

  }
  /* Modal Content */
  .modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
  }
  /* Add Animation */
  @-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
  }
  @keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
  }
  /* The Close Button */
  .close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }
  .close:hover,
  .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
  }
  .modal-header {
    padding: 2px 15px;
    background-color: #ff4800;
    color: white;
  }
  .modal-body {padding: 2px 15px;}
  .modal-footer{
    padding: 1px 10px;
    background-color: #ff4800;
    color: white;
  }
  #user_img{
    width: 75px;
    float: left;
    margin: 8px;
  }
  #info_bar{
    background-color: white;
    min-height: 400px;
    margin-top: 20px;
    color: #aaa;
    padding: 8px;
  }
  #seller_info{
    clear: both;
    font-size: 12px;
    font-weight: bold;
    color: #000;
  }
 
</style>

  <body>
    <input type="checkbox" id="check">
  <?php include("header.php"); ?>
  <?php include("mobile_navigation.php"); ?>
  <?php include("sidebar.php"); ?>
  <?php include("modal.php"); ?>
    

  <!-- this is or the photo details area -->
  <div id="container" style="display: flex; ">
    <div style="min-height: 500px;flex: 1.5;">
      <img style="height: 550px; width:100%;" src="img/tv.jpg">          
    </div>
    <!-- this is for the info of users area -->
    <div style="min-height: 500px;flex:1;">
      <div id="info_bar">
        <div id="seller_bar">
          Trader Information <br>
        </div>

        <div id="seller_info" style="margin: 10px;">
          <img id="user_img" src="img/user_male.jpg">   
          Richard B Sabrozo
          <h2>Title</h2>
          <p style="color: gray;">Date and time</p>
          <a href="message.php"><button style="width: 100%; font-weight: bold; "> Send Offer</button></a>
          <h3>Details</h3>
          <p>specs and conditions</p>
          <h3>Location</h3>
          <p style="color: gray;">baybay polong Binmaley Pangasinan</p>
        </div>

      </div>

       
    </div>
  </div>


      <script type="text/javascript">
        $(document).ready(function(){
          $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
          });
        });
      </script>

  </body>
</html>