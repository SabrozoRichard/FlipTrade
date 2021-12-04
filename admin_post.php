<div id="post" class="card">
  <div class="image">
    <img style="width: 215px;" src="<?php echo $ROW['posted_img'] ?>">
  </div> 

  <div class="title">
    <span style="color: #999; margin-left: 20%; ">
    <?php echo $ROW['date'] ?>
  

    </span>
    <div style="display: flex;">
      <p style="margin-left:30px;">Active</p> &nbsp;
      <h3><?php echo $ROW['title'] ?></h3>
    </div>
    <p style="font-size: 15px; margin-top: -10px;"> Variant : <?php echo $ROW['variant'] ?></p>
    <?php
    if ($ROW['quantity']<=0) {
      echo '<p style="color:red;font-weight:bolder;">'."SOLD OUT".'</p>';
    }else{
   echo '<p style="font-size: 15px; margin-top: -10px;">'." Quantity : ".$ROW['quantity']. '</p>';
}
    ?>
    <p> <?php echo $ROW['post'] ?> </p>
    <p> <?php echo $ROW['firstname']." ".$ROW['lastname']; ?> </p>
    <p style="color: gray; font-size: 12px;"> <?php echo $ROW['location'] ?></p>
  </div>
  <div class="des">

   
    <!-- Original Code : <a href="message.php"><button> Send Offer</button></a> -->
    <!-- <a href="view_details.php"><button> Details</button></a> -->

  </div>
</div>