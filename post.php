<?php 
    include_once("ratings_driver/cfg/config.php");
    include_once("ratings_driver/ratings.php"); 
?>
<div id="post" class="card">
  <div class="image">
    <img style="width: 215px;" src="<?php echo $ROW['posted_img'] ?>">
  </div> 

  <div class="title">
    <span style="color: #999; margin-left: 20%; ">
     <?php
    // original code
    // echo $ROW['date'];
    
    // with readable format
    echo  date("F d, Y \a\\t h:i A", strtotime($ROW['date']));

    ?>
  

    </span>
    <div style="display: flex;">
      <p style="margin-left:30px;">Active</p> &nbsp;
      <h3 style="font-family: Dosis"><?php echo $ROW['title'] ?></h3>
    </div>
    <p style="font-size: 15px; margin-top: -10px;font-family: Dosis"> Variant : <?php echo $ROW['variant'] ?></p>
    <?php
    if ($ROW['quantity']<=0) {
      echo '<p style="color:red;font-weight:bolder;font-family: Dosis">'."SOLD OUT".'</p>';
    }else{
   echo '<p style="font-size: 15px; margin-top: -10px;font-family: Dosis">'." Quantity : ".$ROW['quantity']. '</p>';
}
    ?>
    <p style="font-family: Dosis"> <?php echo $ROW['post'] ?> </p>
    <p style="color: gray; font-size: 12px;font-family: Dosis"> <?php echo $ROW['location'] ?></p>
  </div>
   <div class="item_quality" style="text-align: center; padding: 0 20px;">
      <div class="quality_markers" style="display:flex; width: 200px; margin: auto;">
          <div class="quality_marker_text" style="margin-left: 0; margin-right: auto;">Quality Rating : 
          </div>
          <div class="quality_marker_stars" style="margin-left: auto; margin-right: 10px; display: flex;">
           
          <?php  
                $avgRating = getAverageRating($db, $ROW['postid']);
                
                // create the stars.
                // add a counter for rated stars. (yellow)
                $goodStars = 0;

                for ($i = 0; $i < 5; $i++)
                {
                    // tell between good (yellow) and bad (gray) stars
                    if ($goodStars < $avgRating)
                    {
                        // Good stars
                        echo "<img src=\"ratings_driver/star_quality_active.png\" width=\"18\" height=\"18\">";
                    }
                    else
                    {
                        // Bad stars
                        echo "<img src=\"ratings_driver/star_quality_default.png\" width=\"18\" height=\"18\">";
                    }

                    $goodStars ++;
                }
          ?> 
          </div>
      </div>
  </div>
  
  <div class="des">

    <?php
      // The currently loged in user's UserID
      $current_uid = $_SESSION['Fliptrade_userid'];

      // The trader's userid
      $traderuid = $ROW['userid'];

      // Link Query For Data Passing Between Pages
      $lnk_qry = "trader_uid={$traderuid}&current_uid={$current_uid}";

      // Create a link containing the trader's data 
      echo "<a href=\"message.php?{$lnk_qry}\"><button> Send Offer</button></a>"; 


    ?>
    <!-- Original Code : <a href="message.php"><button> Send Offer</button></a> -->
    <!-- <a href="view_details.php"><button> Details</button></a> -->

  </div>
</div>