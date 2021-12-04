<div id="post">
<?php

 // Ito yung ID nung item after mapost
$postid = $USER_ROW['postid'];

// Yung status nung item if sold or not
$stat = $USER_ROW['status'];

?>
  <div>
    <img src="<?php echo $USER_ROW['posted_img'] ?>" style="width: 150px; height: 160px;">  
  </div>
  <div style="padding: 10px;">
    <div style="display: flex;">
      <?php

          // Ito yung indicators dun sa gilid nung item title... 
          if ($stat != "sold")
          {
              echo "<p id='output' class='item-stat-indicator item-stat-indicator-active'>Active</p>";
          }
          else
          {
              echo "<p id='output' class='item-stat-indicator item-stat-indicator-sold'>Sold</p>";
          }
          
      ?>
      <h3> <?php echo $USER_ROW['title'] ?></h3>
    </div>
    <p style="font-size: 12px; margin-top: -10px;"> Variant : <?php echo $USER_ROW['variant'] ?></p>
     <?php
    if ($USER_ROW['quantity']<=0) {
      echo '<p style="color:red;font-weight:bolder;">'."SOLD OUT".'</p>';
    }else{
   echo '<p style="font-size: 15px; margin-top: -10px;">'." Quantity : ".$USER_ROW['quantity']. '</p>';
}
    ?>
    <h4><?php echo $USER_ROW['post'] ?></h4>
    <p style="font-size: 10px; padding: 2px;"> <?php echo $USER_ROW['location'] ?></p>
    <div id="post-bottom-options">
    <?php

      // If available yung item, dapat kulay red yung marker tsaka ang text nya "Mark As Sold"
      // If sold na, dapat green yung kulay nya tsaka yung text nya dapat "Mark as Available"
      // if ($stat != "sold")
      // {
      //     echo "<a id='marker-mark-sold' href=\"marksold.php?postid={$USER_ROW['postid']}&stat=sold\"> Mark as Sold </a>";
      // }
      // else
      // {
      //     echo "<a id='marker-mark-available' href=\"marksold.php?postid={$USER_ROW['postid']}&stat=available\"> Mark as Available </a>";
      // }

      if ($stat != "sold")
      {
       
          echo "<a id='marker-mark-sold' href='client.php?id=$USER_ROW[postid]' >
              Sold";
             
        
      }
      else
      {
          echo "<a id='marker-mark-available'  onclick=\"MarkSold('{$USER_ROW['postid']}', 'available')\"> Mark as Available </a>";
      }

    ?>
    <!-- <a style="text-decoration: none; color: #000" href="marksold.php?postid=<?php /*echo $USER_ROW['postid']*/ ?>"> 
      Mark as Sold 
    </a> &nbsp; | &nbsp; -->

      <?php  
      $post = new Post();
      if ($post->i_own_post($USER_ROW['postid'],$_SESSION['Fliptrade_userid'])) {
        echo "
        
            <a id='bottom-option-href' href='edit.php?id=$USER_ROW[postid]' >
              Edit
            </a>  
            <a id='bottom-option-href' href='delete.php?id=$USER_ROW[postid]' >
              Delete 
            </a>
            <a id='bottom-option-href' href='view.php?id=$USER_ROW[postid]' >
              View 
            </a>";
      }
      ?>
        
      </div>
    </div>
  </div>
  <hr>   
  <script>
    function MarkSold(postid, stat)
    {
        if (stat == "sold")
        {
          var confirmMessage = "This item will be marked as Sold and will no longer show on dashboard. Continue?";

          if (confirm(confirmMessage))
          {
             window.location.href = "marksold.php?postid=" + postid + "&stat=" + stat;
          }
        }
        else if (stat == "available")
        {
          var confirmMessage = "This item will be marked as Available and will show again on dashboard. Continue?";

          if (confirm(confirmMessage))
          {
            window.location.href = "marksold.php?postid=" + postid + "&stat=" + stat;
          }
        }
    }
  </script>     
  <!-- <script>
        var clicked = false;
        function toggle(){
          if (!clicked) {
            clicked = true;
            document.getElementById('btn').innerHTML = 'Mark as Available';
            document.getElementById('output').innerHTML = 'Sold';
          }else{
            clicked = false;
            document.getElementById('btn').innerHTML = 'Mark as Sold';
            document.getElementById('output').innerHTML = 'Active';
           }
          }
          </script> -->