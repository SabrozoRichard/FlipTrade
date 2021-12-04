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
$connection = mysqli_connect("localhost","root","","dbfliptrade");
  // posting start here
  if($_SERVER['REQUEST_METHOD'] == "POST")  
  {
    $post = new Post();
    $id = $_SESSION['Fliptrade_userid'];
    $result = $post->create_post($id, $_POST,$_FILES);

    if ($result == "")
    {
     header("Location: F_electronics.php");
     die; 
    }else
    {
      echo "<div style='text-align:center; font-size: 12px; color:white;background-color:grey;'>";
      echo "the following errors occured: <br><br>";
      echo $result;
      echo "</div>";
    }
  }

  // collect post
  $post = new Post();
  $id = $_SESSION['Fliptrade_userid'];
  $posts = $post->get_electronics($id);


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

     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@700&display=swap" rel="stylesheet">
  </head>

<style>
  body {font-family: Arial, Helvetica, sans-serif;}
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
</style>

  <body>
    <input type="checkbox" id="check">
    <?php include("header.php"); ?>
    <?php include("mobile_navigation.php"); ?>
  <?php include("sidebar.php"); ?>
  <?php include("modal.php"); ?>
    

      <div> <h1>Today's Picks for You
      </h1>
      <h1 style="font-family: Dosis;text-align: center;font-size: 30px;"><i class="fas fa-home"></i> Home</h1></div>
             <!-- post right here -->

     <?php 

    $query=mysqli_query($connection,"SELECT * FROM tbl_trade WHERE categories='Home'");
    if (mysqli_num_rows($query)==0) {
      echo "<br><h>";
      echo  '<h1 style="font-family: Dosis;text-align: center;font-size: 30px;color:red;"> No Match Found!</h1>';
    }
    while ($ROW=mysqli_fetch_array($query)) {
     include ('post.php');
    }
      ?>
      <!-- end of post-->
      
      <script type="text/javascript">
        $(document).ready(function(){
          $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
          });
        });
      </script>
  </body>
</html>