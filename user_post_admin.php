<?php
$connection = mysqli_connect("localhost","root","","dbfliptrade");

$userlist=mysqli_query($connection,"SELECT * FROM tbl_user");


// include ("verify_user.php");

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fliptrade</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"> </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@700&display=swap" rel="stylesheet">
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
  #myTable {
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
</head>

<body>

  <input type="checkbox" id="check">
  <?php include("header.php"); ?>

  <?php include("sidebar_admin.php"); ?>
  <?php include("modal.php"); ?>

<!-- // dashboard content -->
<h2>Pending Account</h2>
<h1 style="text-align: center;"><i class="fas fa-users"></i> User Accounts</h1>


<table cellspacing="10" class="" id="myTable" style="width: 100%;"> 
      <thead style="">
          <tr class="tr_mains">
            
            <th></th>
            <th scope="col" style="text-align: center;"  class="main">Name</th>
            <th scope="col"  style="text-align: center;"  class="main">Email</th>
            <th scope="col"  style="text-align: center;"  class="main">Gender</th>
            <th scope="col" style="text-align: center;"  class="main">Address</th>
            <th scope="col"  style="text-align: center;"  class="main">Date</th>
             <th scope="col"  style="text-align: center;"  class="main">Action</th>
           
         
            
            
          
            

          </tr>
        </thead>
        <tbody>

          <?php 
          if( mysqli_num_rows($userlist) == 0) {
            
            echo "<td>No Available Records Found</td>";
            echo "<td>No Available Records Found</td>";
            echo "<td>No Available Records Found</td>";
            echo "<td>No Available Records Found</td>";
            echo "<td>No Available Records Found</td>";
            echo "<td>No Available Records Found</td>";
            echo "<td>No Available Records Found</td>";
           
            
            
            }
          
          else{
          while ($row = mysqli_fetch_array($userlist)) { 

            
            ?>

            <tr class="items">
               <td> <img src="<?php echo $row['profile_img']; ?>" style="width: 90px; height: 90px;"> </td>
              <td  style="font-family: Dosis;"><?php echo $row['firstname']." ".$row['lastname']; ?></td>
              <td  style="font-family: Dosis;"><?php echo $row['email'];?></td>
              <td  style="font-family: Dosis;"><?php echo $row['gender']; ?></td>
              <td  style="font-family: Dosis;"><?php echo $row['address']; ?></td>
               
              <td style="font-family: Dosis;"><?php echo $row['date']; ?></td>
              <form method="post">
              <td style="font-family: Dosis;"><button name="verify" onclick="return confirm('Are you sure you want to verify account?')">
                <?php 

                if ($row['userstate']=="pending") {
                  echo '<h5 style="color:red;">'.$row['userstate'].'</h5>';
                }else{
                  echo '<h5 style="color:green;">'.$row['userstate'].'</h5>';
                }
                 ?></button>
                
                <input type="hidden" name="userstate" value="<?php echo $row['userstate']; ?>">
                <input type="hidden" name="userid" value="<?php echo $row['userid']; ?>">
              </td>

              </form>
              <?php
              
error_reporting(E_ERROR);
                if (isset($_POST['verify'])) {
                  $userid=$_POST['userid'];
                  $userstate=$_POST['userstate'];

                  if ($userstate=="pending") {
                    mysqli_query($connection,"UPDATE tbl_user SET userstate='Verified' WHERE userid='$userid'");
                  }else{
                    mysqli_query($connection,"UPDATE tbl_user SET userstate='pending' WHERE userid='$userid'");
                  }
                    header("location: user_post_admin.php");
              
               
                }
          ?>
              

             
              
              
              
            </tr>
      
          
            <?php }}?>

      </tbody>
          </table>


<script type="text/javascript">
  $(document).ready(function(){
    $('.nav_btn').click(function(){
      $('.mobile_nav_items').toggleClass('active');
    });
  });
</script>

</body>
</html>