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


  // check if the user == user the delete the post
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

  // if something was edited
  if ($_SERVER['REQUEST_METHOD'] == "POST") {  
 //  $post = new Post();
 //  $post->edit_post($_POST,$_FILES);
 // header("Location: ".$_SESSION['return_to']);
 //    die;
    $errors = $Post->edit_post($_POST,$_FILES);

    if(count($errors)==0){

      // header("Location: ".$_SESSION['return_to']);
      header(("Location: profile.php"));

      die;
    }else{
      foreach ($errors as $error) {
        # code...
        echo $error . "<br>";
      }
    }
  }
  
 ?> 



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Trade Item | Fliptrade</title>
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

<body style="font-family: tahoma; background-color: #d0d8e4;" ><br>
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
        <form method="post" enctype="multipart/form-data"> 
          <div style=" border: solid thin #aaa; padding: 10px; background-color: white; ">
            <?php               
              if($ERROR != "") {
                echo $ERROR;
              }else{
                echo "Are you sure you want to edit this listing? <br><br>";
                echo '
                <p for="photo" style = "color:gray; font-size:11px; margin-bottom:1px;" >Photo &nbsp;</p>
                <div class="form-inline">
                <input id="photo" name="file" type="file" multiple>
                <input name="quantity" type="number" class="" placeholder="Quantity" required style="float: right;width: auto;height: 30px;">
                </div>
                <p style="color:gray; font-size:11px; margin-bottom:-24px;">Title &nbsp; &nbsp; &nbsp;</p>
                <p style=" margin-left:51%; color:gray; font-size:11px; margin-bottom:-10px;"> Variant : Optional &nbsp; &nbsp; </p>

                <div style="display: flex;">
                  <input name="title" type="text" class="trade_btn" placeholder="Title" value="'. $ROW_TRADE['title'] .'" required>&nbsp;&nbsp;
                  <input name="variant" type="text" class="trade_btn" value="'. $ROW_TRADE['variant'] .'" onclick="myFunction()">
                </div>

                <p id="demo" style=" margin-left:51%; color:gray; font-size:11px; margin-top:1px;"></p>
                <script>
                  function myFunction() {
                  document.getElementById("demo").innerHTML = "Example: Color / Size";
                  }
                </script>
                  <div style = "display: flex;">
                  <p style=" margin-right:43%; color:gray; font-size:11px; margin-bottom:-10px;">Category &nbsp; &nbsp; </p>
                  <p style="color:gray; font-size:11px; margin-bottom:-10px;">Location</p>
                </div>
                <div style = "display: flex;">
                  <select name="categories" class="trade_btn" value="" required>
                    <option value="'. $ROW_TRADE['categories'] .'">'. $ROW_TRADE['categories'] .'</option>
                    <option value="'. $ROW_TRADE['categories'] .'">Electronic</option>
                    <option value="'. $ROW_TRADE['categories'] .'">Hobbies</option>
                    <option value="'. $ROW_TRADE['categories'] .'">Vehicles</option>
                    <option value="'. $ROW_TRADE['categories'] .'">Apparel</option>
                    <option value="'. $ROW_TRADE['categories'] .'">Home</option>
                    <option value="'. $ROW_TRADE['categories'] .'">Pets</option>
                    <option value="'. $ROW_TRADE['categories'] .'">Entertainment</option>
                    <option value="'. $ROW_TRADE['categories'] .'">Instrument</option>
                    <option value="'. $ROW_TRADE['categories'] .'">Games</option>
                    <option value="'. $ROW_TRADE['categories'] .'">Sports</option>
                  </select>&nbsp;&nbsp;

                  <select name="location" class="trade_btn" required>
                    <option>'.$ROW_TRADE['location'].'</option>
                    <option>Agno, Pangasinan</option>
                    <option>Aguilar, Pangasinan</option>
                    <option>Alcala, Pangasinan</option>
                    <option>Anda, Pangasinan</option>
                    <option>Asingan, Pangasinan</option>
                    <option>Balungao, Pangasinan</option>
                    <option>Bani, Pangasinan</option>
                    <option>Basista, Pangasinan</option>
                    <option>Bautista, Pangasinan</option>
                    <option>Bayambang, Pangasinan</option>
                    <option>Binalonan, Pangasinan</option>
                    <option>Binmaley, Pangasinan</option>
                    <option>Bolinao, Pangasinan</option>
                    <option>Bugallon, Pangasinan</option>
                    <option>Burgos, Pangasinan</option>
                    <option>Calasiao, Pangasinan</option>
                    <option>Dasol, Pangasinan</option>
                    <option>Dasol, Pangasinan</option>
                    <option>Infanta, Pangasinan</option>
                    <option>Labrador, Pangasinan</option>
                    <option>Laoac, Pangasinan</option>
                    <option>Lingayen, Pangasinan</option>
                    <option>Mabini, Pangasinan</option>
                    <option>Malasiqui, Pangasinan</option>
                    <option>Manaoag, Pangasinan</option>
                    <option>Mangaldan, Pangasinan</option>
                    <option>Mangatarem, Pangasinan</option>
                    <option>Mapandan, Pangasinan</option>
                    <option>Natividad, Pangasinan</option>
                    <option>Template, Pangasinan</option>
                    <option>Pozorrubio, Pangasinan</option>
                    <option>Rosales, Pangasinan</option>
                    <option>San Fabian, Pangasinan</option>
                    <option>San Jacinto, Pangasinan</option>
                    <option>San Manuel, Pangasinan</option>
                    <option>San Nicolas, Pangasinan</option>
                    <option>San Quintin, Pangasinan</option>
                    <option>Santa Barbara, Pangasinan</option>
                    <option>Santa Maria, Pangasinan</option>
                    <option>Santo Tomas, Pangasinan</option>
                    <option>Sison, Pangasinan</option>
                    <option>Sual, Pangasinan</option>
                    <option>Tayug, Pangasinan</option>
                    <option>Umingan, Pangasinan</option>
                    <option>Urbiztondo, Pangasinan</option>
                    <option>Villasis, Pangasinan</option>
                  </select>
                </div>
                <p style="color:gray; font-size:11px; margin-bottom:-10px;">Description &nbsp; &nbsp; &nbsp;</p>
                <textarea name="post" type="text" class="trade_btn" placeholder="Description"required>'. $ROW_TRADE['post'] .'</textarea><br><br>
                <img src="'. $ROW_TRADE['posted_img'] .'" style="width: 150px; height: 160px;">  
                      ';
                      echo "<input type='hidden' name='postid' value='$ROW_TRADE[postid]'>";
                      echo "<input id='post_button' type='submit' value='Update' >";
              }
            ?><br>
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