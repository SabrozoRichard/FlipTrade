<!--sidebar start-->
<script src="chat_module/jquery.min.js"></script>
<div class="sidebar">
  <div class="profile_info">
    <span style="font-size: 12px;">
      <?php
      $image = "profiles/user_male.jpg";
      if ($user_data['gender']) {
        $image = "profiles/user_female.jpg";
      }
      if (file_exists($user_data['profile_img'])) {
        $image = $user_data['profile_img'];
      }
      ?>


      <a style="display: flex; margin-right: 80px; width: 200px; height: 200px;" href="profile.php"><img src="<?php echo  $image ?>" alt=""></a>

      <div style="display: flex;">


        <a href="change_profile_img.php?change=profile">Change Profile</a>
        <a href="edit_name.php?">Edit Name</a>
      </div>


    </span>
    <a href="profile.php" style="height: 55px; ">
      <h4><?php echo $user_data['firstname'] . " " . $user_data['lastname']; ?></h4>
    </a>
  </div>
  <div class="sidebar-chat-notif">
      <div class="chat-notif-icon">
        <img id="notif-img" src="chat_module/styles/chat-icon.png" width="28" height="28">
      </div>
      <div class="chat-notif-text">No new messages</div>
  </div>
  <button class="trade" id="myBtn"><i class="fas fa-plus"></i><span>Trade Item</span></button>
  <hr>
  <a href="dashboard.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
  <a href="browseall.php"><i class="fas fa-store"></i><span>Browse All</span></a>
   <a href="report.php"><i class="fas fa-archive"></i><span>Report</span></a>
  <a href="aboutus.php"><i class="fas fa-info-circle"></i><span>About</span></a>
 
  <br><br>
</div>

<!-- #region AJAX NOTIFICATION DRIVER -->

<script>

  // The default chat notification icon
  var chat_icn_default = "chat_module/styles/chat-icon.png";

  // The active chat notification icon
  var chat_icn_active = "chat_module/styles/chat-icon-on.png"; 

  //var originalMsgCount = 0; --> BUGGY CODE, DONT USE!     

  // The controller for notifications
  var url = "chat_module/background_msg.php";
 
  //
  // POST-INITIALIZATION
  // This block is called once after the document / page has completely loaded
  //
  $(document).ready(function()
  {
    // Run AJAX synchronously
    //$.ajaxSetup({async: false}); --> BUGGY CODE, DONT USE!

    // Initially Start The Background Message Notifier
    //loadMsgCountInitially();  --> BUGGY CODE, DONT USE!                           

    // Launch The Inbox Page
    $(".sidebar-chat-notif").click(() => window.location.href = "chat_module/inbox.php");

    // Continously Watch For Notifications
    // Calls load() every 500ms
    setInterval(() => { load(); }, 500);
  });
  //
  // WATCH FOR INCOMING MESSAGES USING AJAX ASYNC GET REQUEST
  //
  function load ()
  {
      $.get(url, function(result)
      {
        if (result.items)
        { 
          result.items.forEach(item => 
          { 
              // The number of new messages --> Retrieved from AJAX GET
              var newMsg = item.msgCount; 

              // If msgcount > original, it means it has new notification
              // if (newMsg > originalMsgCount)
              if (newMsg > 0)
              {
                // Change Notification Text And Icon 
                $(".chat-notif-text").text("Someone messaged you");
                $("#notif-img").attr("src", chat_icn_active);

                // Change Background To Green
                $(".sidebar-chat-notif").css("background-color", "#01A31C");
              }   
              else
              {
                // Reset Notification Text And Icon
                $(".chat-notif-text").text("No new messages");
                $("#notif-img").attr("src", chat_icn_default);

                // Reset Background To Brown
                $(".sidebar-chat-notif").css("background-color", "#A73E16");
              }  
              
              // Append The Recently Recieved Messages Into Inbox wether seen or unread
              //$(".inbox-modal-content-main").append(AppendToInbox(item));
          });
        }  
         
      });
  }

/*
  function loadMsgCountInitially()   --> BUGGY CODE, DONT USE!
  {
      $.get(url, function(result)
      {
        if (result.items)
        {
          result.items.forEach(item => 
          { 
              // The retrieved message recieved count
              originalMsgCount = item.msgCount;   
              // alert(originalMsgCount);                     
          });
        }  
      });
  }
  */
</script>
<!-- #endregion AJAX NOTIFICATION DRIVER -->

<!--sidebar end-->