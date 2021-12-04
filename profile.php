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
  $post = new Post();


  // posting start here
  if($_SERVER['REQUEST_METHOD'] == "POST")  
  {
    $id = $_SESSION['Fliptrade_userid'];
    $result = $post->create_post($id, $_POST,$_FILES);
  }
  // collect post
  $id = $_SESSION['Fliptrade_userid'];
  $posts = $post->get_tradepost($id);


  $image_class = new Image();

 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Fliptrade</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"> </script>
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
    div#container{

  }
  section#left_bar{
    height: 550px;
    width: 400px;
    float: right;
  }
  section#right_bar{
    height: 550px;
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
  #post_bar{
    margin-top: 20px;
    background-color: lightgray;
    padding: 10px;
  }
  #post{
    padding: 4px;
    font-size: 13px;
    display: flex;
    height: 50%;
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
    <div style="min-height: 500px; flex: 1.5;">
      <div>
        <h1 style="height: 30px; background: lightgray; border-radius: 5px; padding: 5px;">Your Listings</h1>
      </div >

 
      <div id="post_bar">
        <?php 
        if ($posts) {
          # code...
        
        foreach ($posts as $USER_ROW) {
        $user = new User();

          $ROW_POST = $user->get_user($USER_ROW['userid']);
          include("user_post.php");
        } 
        }
         ?>

      </div>
    </div>


    <!-- this is for the info of users area -->
    <div style="min-height: 500px; flex:1;">
      <div id="info_bar">
        <div id="seller_bar">
          Trader Information <br>
        </div>

        <div id="seller_info" style="margin: 10px; ">

          <?php 
            $image = "profiles/user_male.jpg";
            if ($user_data['gender']) 
            {
              $image = "profiles/user_female.jpg";
            }
            if (file_exists($user_data['profile_img'])) 
            {
              $image = $user_data['profile_img'];
            }
           ?> 
          <a href="profile.php"><img id="user_img" src="<?php echo  $image?>"></a>
          <a style="text-decoration: none; color: #000;" href="profile.php"><h4 style="padding: 10px;"><?php echo $user_data['firstname'] . " " . $user_data['lastname'] ; ?></h4></a>
          <div style="display: flex;">
            <h4 style="padding: 10px; margin-top: -19px; margin-left: -10px;">Location</h4>
            <p style="color: gray; margin-left: -60px;"><?php echo $user_data['address']?></p>
          </div>
          <hr>
          
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