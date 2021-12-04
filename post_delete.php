<div id="post" class="card">
  <div class="image">
    <img style="width: 215px;" src="img/tv.jpg">
  </div>
  <div class="title">
    <span style="color: #999; margin-left: 30%; ">
    <?php echo $ROW['date'] ?>
    </span>
    <h3><?php echo $ROW['title'] ?></h3>
  </div>
  <div class="des">
    <p> <?php echo $ROW['post'] ?> </p>
    <p style="color: gray; font-size: 12px;"> <?php echo $ROW['location'] ?></p> 


    <a href="message.php"><button> Send Offer</button></a>
    <a href="view_details.php"><button> Details</button></a>

  </div>
</div>