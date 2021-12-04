  <?php 
  session_start();
  include("classes/connect.php");
  include("classes/login.php");
  include("classes/user.php");
  include("classes/post.php");
  include("classes/image.php");



  $login = new Login();
  $user_data = $login->check_login($_SESSION['Fliptrade_userid']);
  // $Post = new Post();
  

   // posting of image start here 
  if($_SERVER['REQUEST_METHOD'] == "POST")  
  {
    if (isset($_POST['firstname'])) 
    {
        $firstname = addslashes($_POST['firstname']);
        $lastname = addslashes($_POST  ['lastname']);
        $userid = $user_data['userid'];
        $query = "UPDATE tbl_user SET firstname = '$firstname' , lastname = '$lastname' WHERE userid = '$userid'";
            
            $DB = new Database();
            $DB->save($query);
            header(("Location: profile.php"));
            die;
         
  }
}
  ?> 

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Profile Image | Fliptrade</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"> </script>
  </head>

<style>
  body {font-family: Arial, Helvetica, sans-serif;}
  /* The Modal (background) */
 
  #profile_pic{
  	width: 150px;
  	border-radius: 50%;
  	border: solid 2px width;
  }
  #post_button{
  	float: right;
  	background-color: #405d9b;
  	border: none;
  	color: white;
  	padding: 4px;
  	font-size: 14px;
  	border-radius: 2px;
  }
  #post_bar{
  	margin-top: 20px;
  	background-color: white;
  	padding: 10px;
  }
  #post{
  	padding: 4px;
  	font-size: 13px;
  	display: flex;
  	margin-bottom: 20px;
  }
</style>

<body style="font-family: tahoma; background-color: #d0d8e4;" ><br>
  <input type="checkbox" id="check">
  <?php include("header.php"); ?>
  <?php include("sidebar.php"); ?><br><br><br>

  <!-- cover area -->
  <div style="width: 800px; margin:auto;min-height: 400px;">
    <!-- below cover area -->
    <div style="display: flex;">
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

      <!-- post area -->
      <div style="min-height: 400px; flex: 2.5; padding: 20px; padding-right: 0px;" >
        <form method="post" enctype="multipart/form-data">
          <div style=" border: solid thin #aaa; padding: 10px; background-color: white; ">
              
              
              <div style="display: flex;">
              <p style="font-size: 12px; color: gray; margin-left: 14%;">Firstname</p>
              <p style="font-size: 12px; color: gray; margin-left: 37%;">Lastname</p>
            </div>
            <div style="display: flex;">
              <img style="border-radius: 50%; height: 80px; margin-top: -19px;" id="user_img" src="<?php echo  $image?>"> &nbsp;
              <input name="firstname" id="firstname" type="text" class="trade_btn" value="<?php echo $user_data['firstname']; ?>" required> &nbsp;
              <input name="lastname" id="lastname" type="text" class="trade_btn" value="<?php echo $user_data['lastname']; ?>" required>
            </div>
            <input id="post_button" type="submit" value="Save" ><br>

          </div>
        </form>
      </div>
    </div>
  </div>

  <!--header area end-->
  <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
  </script>
</body>
</html>