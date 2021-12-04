<?php 

session_start(); 

// The currently loged in user's UserID
$current_uid = $_SESSION['Fliptrade_userid'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/inbox_ui.css">
    <script src="jquery.min.js"></script>
    <title>Inbox</title>
</head>

<body>
     <!-- HIDDEN INPUT FOR STORING THE CURRENT USER's ID -->
     <form>
        <input type="hidden" id="currentUserId" name="currentUserId" value="<?php echo $current_uid; ?>">
    </form>

    <div class="inbox-wrapper">
        <div class="inbox-content">
            <div class="inbox-content-header">
                <div class="inbox-header-title">Inbox</div>
                <div class="inbox-header-controls">
                    <!-- MARK ALL MESSAGES AS READ -->
                    <button class="btn-seen-all" onclick="SeenAll()">
                        Mark All As Read
                    </button> 
                    <!-- GO BACK TO LAST PAGE WHEN BACK BUTTON IS CLICKED --> 
                    <button class="btn-go-back" onclick="javascript:history.go(-1)">
                        <img class="icn-go-back" src="styles/back.png" width="22" height="22">
                    </button> 
                </div>
            </div>
            <div id="inbox-content-wrapper">
                <div id="inbox-content-main" class="inbox-content-main">
                    <!-- BEGIN APPEND MESSAGES HERE --> 

                    <!-- END APPEND MESSAGES HERE -->
                </div>
            </div>
        </div>
    </div>
    <!-- AJAX GET REQUEST -->
    <script>
        // The controller for notifications
        var url = "background_inbox.php";

        var start = 0; 

        // Naghihintay ito ng incoming notifications every 500ms
        $(document).ready(function() 
        {  
            setInterval(() => 
            {  
                load(); 
            }, 500); 

            // Refresh the page every 10secs to update the notifications
            setTimeout(() => window.location.reload(), 10000);
        });
        //
        // Continous running task po ito, para magupdate nung inbox
        //
        function load() 
        {
            $.get(url + '?bstart=' + start, function(result) 
            {
                if (result.items) 
                { 
                    result.items.forEach(item => 
                    { 
                        // Chat start index
                        start = item.id; 
                        // Prepend The Inbox Contents 
                        $('.inbox-content-main').prepend(PrependToInbox(item));
                    });
                }
            });
        }

        function updateInboxContents()
        { 
            $('#inbox-content-main').load(" #inbox-content-main>*", "");
        }
        //
        // Prepend The Inbox Contents  --> Bakit PREpend hindi APpend ? 
        // == kasi para magstay on top yung pinakabagong message na dumating ;)
        //
        function PrependToInbox(item) 
        {
            var timeStamp = new Date(item.created);
            
            // Is the message unread or seen?
            var unread = (item.status == "unread");
             
            // This will change according to chat status 
            // -> If seen, hindi ito magha-highlight... magmark ito agad na "Seen"
            // -> If unread, maghighlight ito ng gray... lalabas din yung option na "Mark as read"
            
            var unread_bg = (unread) ? `<div class="inbox-content-wrapper inbox-content-unread" onclick="openMessage('${item.senderuid}', '${item.id}')">` :
                                       `<div class="inbox-content-wrapper" onclick="openMessage('${item.senderuid}', '${item.id}')">`; 
            var seenMarker = (unread) ? `<div class="inbox-marker"><a class="a-seen-marker" href="util/mark_seen.php?id=${item.id}">Mark as Read</a></div>` : 
                                        `<div class="inbox-marker a-seen-marker-checked">&check; Seen</div>`;

            var content = `${unread_bg}
                        <div class="inbox-content-left">
                            <div class="inbox-contact-pic">
                                <img class="contact-pic" src="../${item.senderdp}" width="40" height="40">
                            </div>
                            <div class="inbox-contact-info">
                                <div class="contact-info-name">${item.sender}</div>
                                <div class="contact-info-msg-preview">${item.message}</div>
                            </div>
                         </div>
                        <div class="inbox-content-right">
                            <div class="inbox-timestamp">${formatShortDate(timeStamp)}, ${formatAmPm(timeStamp)}</div>
                            ${seenMarker}
                        </div>
                     </div>`; 
            // <div class="inbox-marker">Mark as read</div>
            return content;
        }
        //
        // Opens the message using the specified sender user id and message id
        //
        function openMessage(uid, id)
        {
            // Mark the message as SEEN on open
             
            // Link query for passing data between pages
            var lnk_qry = `trader_uid=${uid}&current_uid=${$("#currentUserId").val()}&inboxid=${id}`;

            // Launch the message page
            // window.location.href = `http://localhost/FlipTrade/message.php?${lnk_qry}`;
            window.location.href = `http://localhost/FlipTrade/chat_module/util/open_message.php?${lnk_qry}`;
        }
        //
        // Format the timestamp as "Hours : Minute AM/PM" (ex : 12:00 AM)
        //
        function formatAmPm(date)
        {
            var h = date.getHours();
            var m = date.getMinutes();

            var ampm = (h >= 12) ? "PM" : "AM";

            h = h % 12;
            h = h ? h : 12;
            m = m < 10 ? '0' + m : m;

            var strTime = `${h}:${m} ${ampm}`;
            return strTime;
        }
        //
        // Format the time stamp as short date : "MMM, DD, YYYY"
        //
        function formatShortDate(date)
        {
            var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

            var month = date.getMonth();
            var day = date.getDate();
            var year = date.getFullYear();

            return `${months[month]} ${day}, ${year}`;
        }
        //
        // MARK ALL MESSAGES AS SEEN
        //
        function SeenAll()
        {
            window.location.href=`util/seen_all.php?recvid=${$("#chat_recvid").val()}`;
        }
    </script>
    <!-- HIDDEN INPUT FIELD TO STORE CURRENT USER ID -->
    <form>
        <input type="hidden" name="chat_recvid" id="chat_recvid" value="<?php echo $current_uid; ?>"/>
    </form>
</body>

</html>