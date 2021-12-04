<?php 

	session_start();

  include("classes/connect.php");
  include("classes/login.php");
  include("classes/user.php");
  include("classes/post.php");
  include("classes/image.php");


$connection = mysqli_connect("localhost","root","","dbfliptrade");
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
  $post = new Post();
  $id = $_SESSION['Fliptrade_userid'];
  $posts = $post->get_posts($id);
 ?> 
<?php
$postid=$_GET['id'];
$query=mysqli_query($connection,"SELECT * FROM sold_items WHERE userid='$id' AND postid='$postid'");

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@700&display=swap" rel="stylesheet">
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
  }#myTable {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#myTable td, #myTable th {
  border: 1px solid #ddd;
  padding: 8px;
}

#myTable tr:nth-child(even){background-color: #f2f2f2;}

#myTable tr:hover {background-color: #ddd;}

#myTable th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #ff4800;
  color: white;
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
            <h2 style="font-family: Dosis;" align="center"><i class="fas fa-history"></i> Trade History</h2>
      <table cellspacing="10" class="" id="myTable" style="width: 100%;"> 
      <thead style="">
          <tr class="tr_mains">
            
            <th></th>
            <th scope="col" style="text-align: center;"  class="main">Product Name</th>
            <th scope="col"  style="text-align: center;"  class="main">Variant</th>
            <th scope="col"  style="text-align: center;"  class="main">Category</th>
            <th scope="col" style="text-align: center;"  class="main">Buyer Name</th>
            <th scope="col"  style="text-align: center;"  class="main">Quantity</th>
            <th scope="col" style="text-align: center;"  class="main">Location</th>
         
            
            
          
            

          </tr>
        </thead>
        <tbody>

          <?php 
          if( mysqli_num_rows($query) == 0) {
            
            echo "<td>No Available Records Found</td>";
            echo "<td>No Available Records Found</td>";
            echo "<td>No Available Records Found</td>";
            echo "<td>No Available Records Found</td>";
            echo "<td>No Available Records Found</td>";
            echo "<td>No Available Records Found</td>";
            echo "<td>No Available Records Found</td>";
           
            
            
            }
          
          else{
          while ($row = mysqli_fetch_array($query)) { 

            
            ?>

            <tr class="items">
              <td> <img src="<?php echo $row['image']; ?>" style="width: 90px; height: 90px;"> </td>
              <td  style="font-family: Dosis;"><?php echo $row['product_name']; ?></td>
              <td  style="font-family: Dosis;"><?php echo $row['variant'];?></td>
              <td  style="font-family: Dosis;"><?php echo $row['category']; ?></td>
              <td  style="font-family: Dosis;"><?php echo $row['buyer_fname'].' '.$row['buyer_lname']; ?></td>
               
              <td style="font-family: Dosis;"><?php echo $row['quantity']; ?></td>
              <td style="font-family: Dosis;"><?php echo $row['location']; ?></td>
              

             
              
              
              
            </tr>
      
          
            <?php }}?>

      </tbody>
          </table>
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