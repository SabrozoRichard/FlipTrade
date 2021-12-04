<?php 
  session_start();
  
  include("classes/connect.php");
  include("classes/login.php");
  include("classes/user.php");
  include("classes/post.php");
  include("classes/image.php");


// check if the user is login
  $login = new Login();
  $user_data = $login->check_login($_SESSION['Fliptrade_userid']);

  // posting start here
  if($_SERVER['REQUEST_METHOD'] == "POST")  
  {
    $post = new Post();
    $id = $_SESSION['Fliptrade_userid'];
    $result = $post->create_post($id, $_POST,$_FILES);
    if ($result == "")
    {
     header("Location: browseall.php");
     die; 
    }else
    {
      echo "<div style='text-align:center; font-size: 12px; color:white;background-color:grey;'>";
      echo "the following errors occured: <br><br>";
      echo $result;
      echo "</div>";
    }
  }
  $image_class = new Image();

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
</style>
</head>

<body>

  <input type="checkbox" id="check">
  <?php include("header.php"); ?>
  <?php include("mobile_navigation.php"); ?>
  <?php include("sidebar.php"); ?>
  <?php include("modal.php"); ?>

<!-- // dashboard content -->
<div><h1><center>Team Roles & Responsibilities</center> </h1></div>
<!-- card  -->
<div class="card">
  <div class="image">
    <img src="img/kyle.jpg">
  </div>
  <div class="title">
    <h1>Chua, Kyle Philippe</h1>
  </div>
  <div>
  	<h2>Project Manager</h2>
  	Project managers play the lead role in planning, executing, monitoring, controlling and closing projects. They are
       accountable for the entire project scope, project team, resources, and the success or failure of the project.
  </div><br>
  <a href="">kyco.chua@up.phinma.edu.ph</a>
</div>
<!-- end of card -->

<div class="card">
  <div class="image">
    <img src="img/rinaissa.jpg">
  </div>
  <div class="title">
    <h1>Quibote, Rinaissa Joy C.</h1>
  </div>
    <div>
  	<h2>Designer</h2>
  	<div>
  		Web designers plan, create and code internet sites and web
         pages, many of which combine text with sounds, pictures,
          graphics and video clips. A web designer is responsible for
           creating the design and layout of a website or web pages.
           
  	</div>
  	<br><a href="">Ricu.quibote@up.phinma.edu.ph</a>
  </div>
</div>
<!--cards -->

<div class="card">
  <div class="image">
    <img src="img/richard.jpg">
  </div>
  <div class="title">
    <h1>Sabrozo, Richard B.</h1>
  </div>
    <div>
  	<h2>Developer Programmer</h2>
  	<div>
  		Developer Programmers interpret specifications, technicaldesigns and flow charts, build, maintain and modify the codefor software applications, construct technical specifications 
        from a business functional model, and test and write technical documentation.
  	</div>
  	<a href="">Riba.sabrozo@up.phinma.edu.ph</a>
  </div>
</div>
<!--cards -->


<div class="card">
  <div class="image">
    <img src="img/walter.jpg">
  </div>
  <div class="title">
    <h1> Melendez, Mcwalter C.  </h1>
  </div>
    <div>
  	<h2>Researcher</h2>
  	<div>
  		<p>Researcher have a responsibility to communicate their research, to collaborate with others where appropriate and
         to transfer and exploit knowledge for the benefit of your employer, the economy and society as a whole. 
  	</div>
  	<a href="">Mcco.melendez@up.phinma.edu.ph</a>

  </div>
</div>
<!--cards -->

<div class="card">
  <div class="image">
    <img src="img/malou.jpg">
  </div>
  <div class="title">
    <h1>Cayabyab, Malou Cayago</h1>
  </div>
    <div>
  	<h2>Document Writer</h2>
  	<div>
  		 A document writer produces factual information about
         products in a variety of formats, from instruction manuals to
         help desk material, frequently asked questions (FAQs), how-to's,
          fact sheets, and reference manuals.
  	</div><br>
  	<a href="">maca.cayabyab@up.phinma.edu.ph</a>

  </div>
</div>
<!--cards -->

<script type="text/javascript">
  $(document).ready(function(){
    $('.nav_btn').click(function(){
      $('.mobile_nav_items').toggleClass('active');
    });
  });
</script>

</body>
</html>