<div id="post" class="card">
  <div class="image">
    <img style="width: 215px;" src="<?php echo $show['posted_img'] ?>">
  </div> 

  <div class="title">
    <span style="color: #999; margin-left: 20%; ">
    <?php echo $show['date'] ?>
  

    </span>
    <div style="display: flex;">
      <p style="margin-left:30px;">Active</p> &nbsp;
      <h3><?php echo $show['title'] ?></h3>
    </div>
    <p style="font-size: 15px; margin-top: -10px;font-family: Dosis"> Variant : <?php echo $show['variant'] ?></p>
        <?php
    if ($show['quantity']<=0) {
      echo '<p style="color:red;font-family: Dosis">'."SOLD OUT".'</p>';
    }else{
   echo '<p style="font-size: 15px; margin-top: -10px;font-family: Dosis">'." Quantity : ".$show['quantity']. '</p>';
}
    ?>
    <p> <?php echo $show['post'] ?> </p>
    <p style="color: gray; font-size: 12px;font-family: Dosis"> <?php echo $show['location'] ?></p>
  </div>
  <div class="des">

    <?php
      // The currently loged in user's UserID
      $current_uid = $_SESSION['Fliptrade_userid'];

      // The trader's userid
      $traderuid = $show['userid'];

      // Link Query For Data Passing Between Pages
      $lnk_qry = "trader_uid={$traderuid}&current_uid={$current_uid}";

      // Create a link containing the trader's data 
      echo "<a href=\"message.php?{$lnk_qry}\"><button> Send Offer</button></a>"; 
    ?>
    <!-- Original Code : <a href="message.php"><button> Send Offer</button></a> -->
    <!-- <a href="view_details.php"><button> Details</button></a> -->

  </div>
</div>