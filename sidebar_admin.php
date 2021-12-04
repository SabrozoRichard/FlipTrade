<?php 

$connection = mysqli_connect("localhost","root","","dbfliptrade");

$query=mysqli_query($connection,"SELECT * FROM admin_acccount");

$fetch=mysqli_fetch_array($query);
$fname=$fetch['fname'];

?>
<script src="chat_module/jquery.min.js"></script>
<div class="sidebar">
  <div class="profile_info">
    <span style="font-size: 12px;">

      <a style="display: flex; width: 200px; height: 200px;" href="profile_admin.php"><img style=" margin-left: -40px; " src="profiles/user_male.jpg"></a>


    </span>
    <a href="profile_admin.php" style="height: 55px; ">
      <h4><?php echo $fname; ?></h4>
    </a>
  </div>
  <!-- <button class="trade" id="myBtn"><i class="fas fa-plus"></i><span>Trade Item</span></button> -->
  <hr>
  <a href="allitem.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
  <a href="user_account.php"><i class="fas fa-users"></i><span>User Account</span></a>
  <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>

  <br><br>
</div>

<!-- #endregion AJAX NOTIFICATION DRIVER -->

<!--sidebar end