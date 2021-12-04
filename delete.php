<?php 

	session_start();

  include("classes/connect.php");
  include("classes/login.php");
  include("classes/user.php");
  include("classes/post.php");
  include("classes/image.php");



  $login = new Login();
  $user_data = $login->check_login($_SESSION['Fliptrade_userid']);
  
  $Post = new Post();

  $ERROR = "";
  if (isset($_GET['id'])) {

    
    $ROW_TRADE = $Post->get_one_posts($_GET['id']);

    if (!$ROW_TRADE) {
      $ERROR = "No such post was found!";
    }else{
      if ($ROW_TRADE['userid'] != $_SESSION['Fliptrade_userid']){
      $ERROR = "Access denied! you can't delete this file!";
        
      }

    }
  }else{
    $ERROR = "No such post was found!";
  }

  // if something was posted
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $Post->delete_post($_POST['postid']);
    header("Location: profile.php");
    die;
  }
  
 ?> 



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete | Fliptrade</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"> </script>
  </head>

<style>
  body {font-family: Arial, Helvetica, sans-serif;}
  /* The Modal (background) */
 

  #post_button{
  	float: right;
  	background-color: #405d9b;
  	border: none;
  	color: white;
  	padding: 4px;
  	font-size: 14px;
  	border-radius: 2px;
  }

  #post{
  	padding: 4px;
  	font-size: 13px;
  	display: flex;
  	margin-bottom: 20px;
  }

</style>

<body style="font-family: tahoma; background-color: #d0d8e4;" >
	<br>

  <input type="checkbox" id="check">
  	<?php include("header.php"); ?>
  <?php include("sidebar.php"); ?>

    <br><br><br>


 <!-- cover area -->
  	<div style="width: 800px; margin:auto;min-height: 400px;">
  		<!-- below cover area -->
  		<div style="display: flex;">

        <!-- post area -->
        <div style="min-height: 400px; flex: 2.5; padding: 20px; padding-right: 0px;" >
          
          <form method="post"> 

            <div style=" border: solid thin #aaa; padding: 10px; background-color: white; ">
              
              <?php               
                if($ERROR != "") {
                  echo $ERROR;
                }else{
                  echo "Are you sure you want to delete this listing? <br><br>";
                  $user = new User();
                  $USER_ROW = $user->get_user($ROW_TRADE['userid']);
                  include("user_post_delete.php");
                  echo "<input type='hidden' name='postid' value='$ROW_TRADE[postid]'>";
                  echo "<input id='post_button' type='submit' value='Delete' >";
                }
              ?>
            
            <br>

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