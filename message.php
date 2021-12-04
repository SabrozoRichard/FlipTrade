<?php

// Database Connection (You can use your own connection class or leave it like that nalang hehe)
include("chat_module/cfg/config.php");

// Check connection stat
if ($db->connect_error) {
    die("Connection failed: {$db->connect_error}");
}

// Trader's User ID
$trader_uid = $_GET['trader_uid'];

// The Logged On User's ID (You)
$current_uid = $_GET['current_uid'];

// Your CSID
$senderCsid = "{$current_uid}_{$trader_uid}";

// The (trader) Reciever's CSID
$recieverCsid = "{$trader_uid}_{$current_uid}";

// Get the trader's fullname
include("chat_module/util/traderinfo.php");

$traderfname = getTradersFullname($db, $trader_uid);

// Get the current user's fullname (you)
$myfname = getTradersFullname($db, $current_uid);

// Get the trader's display pic
$traderPic = getTradersDP($db, $trader_uid);

// Your profile pic
$mydp = getTradersDP($db, $current_uid);

//FOR DEBUG LOGGING

/*
echo "--DEBUG--<br><br>Trader UID : {$trader_uid}<br>Current UID (you) : {$current_uid}<br><br>";
echo "--CHAT SESSION ID (CSID)--<br><br>Sender CSID Pattern (you) : CurrentUID_TraderUID<br>";

echo "Sender CSID (you) \u{21d2} {$senderCsid}<br><br>";
echo "Sender's Fullname (you): {$myfname}<br><br>";

echo "Reciever CSID Pattern : TraderUID_CurrentUID<br>Reciever CSID \u{21d2} {$recieverCsid}<br><br>";
echo "Reciever's Fullname : {$traderfname}";
*/


//
// RETRIEVE ALL MESSAGES
//
$chatSessionId = "{$current_uid}_{$trader_uid}";
$chatSessionId_FromSender = explode("_", $chatSessionId);
$chatSessionId_Inverse = "{$chatSessionId_FromSender[1]}_{$chatSessionId_FromSender[0]}";
 
$msg_sql = "SELECT * FROM chat WHERE csid = '{$chatSessionId}' OR csid = '{$chatSessionId_Inverse}'";
$msg_result = $db->query($msg_sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="chat_module/styles/chat_ui.css"> 
    <link rel="stylesheet" href="chat_module/styles/picker_modal.css">
    <link rel="stylesheet" href="chat_module/styles/media_viewer.css">
    <title>Chat</title> 
    <script src="chat_module/jquery.min.js"></script>
    <script>
        var from = null;
        var start = 0;
        var url = 'chat_module/chat.php';

        // The Current Session ID
        var current_chatses = '';
        var reciever_chatses = '';

        $(document).ready(function()
        {
            // Hide the media browser button
            $("#upload-media").hide();

            // The current chat session ID
            current_chatses = $('#sender_chatses').val();

            // The reciever's chat session ID
            reciever_chatses = $('#reciever_chatses').val();

            setInterval(() => {
                load();
            }, 500); 

            // Send Standard Text Messages
            $('form').submit(function(e)
            { 
                $.post(url, 
                {
                    message: $('#message').val(), 
                    from : $('#sender').val(),
                    sender_chatses : $('#sender_chatses').val(),
                    reciever_chatses : $('#reciever_chatses').val(),
                    sender_userid : $('#sender_userid').val(),
                    reciever_userid : $('#reciever_userid').val(),
                    senderdp : $("#senderdp").val()
                });

                // Clear Messagebox Input After Send
                $('#message').val('');
                return false;
            });
        });
        //
        // Continous running task po ito, para magupdate nung chatbox
        //
        function load ()
        {
            $.get(url + '?start=' + start, function(result)
            {
                if (result.items)
                {
                    result.items.forEach(item => 
                    {
                        // Chat start index
                        start = item.id;
                        
                        // The retrieved chat session id
                        var chatses = item.csid;

                        // We will use a unique identifier in each chats.
                        // Tatawagin natin yun na "Chat Session ID (csid)"
                        // parang nagfifilter ito ng conversations
                        // kung same kayo ng Chat Session ID, yun lang ang mababasa nyo.  

                        // What do we mean "same" ng chat session ID? 
                        // How it works?

                        // Kunware ikaw (as sender), ang user ID mo is, 412
                        // At yung kachat mo (as reciever), ang user ID nya is 516.
                        // So, pag nagsend ka sakanya ng message, automatic mag-gegenerate ng csid yung system.
                        // Para makagawa ng CSID yung system, kailangan nya ng UserID nyo.
                        // Kapag ikaw ang nagsend, ang format ng csid is "YourCSID__RecieverCSID". 
                        // So, Ang chat session ID na nagenerate mo is '412_516'.
                        // Kapag nagreply sya, ibig sabihin galing sakanya yung magegenerate na csid ...
                        // So, Ang format ng csid nya is "RecieverCSID__YourCSID".
                        // Ang chat session ID na nagenerate nya is '516_412'.

                        // After nyo magsend ng chat, iiscan ngayon ng system nyo kung may reply ba sa chat
                        // Then ichecheck nya kung kanino galing yung chat , using CSID.
                        // Kung ang lumabas na CSID is yung '516_412', ibig sabihin reply nya sayo yun.
                        // Kapag iba ang lumabas, hindi ipapakita sayo ni system yung reply dahil
                        // Hindi yun para sayo. Ganun din yung nanyayare sa kachat mo, kapag
                        // Ang narecieve nyang reply may CSID na '412_516', it means nireplyan mo sya.
                        // Same logic lang yung sayo at sa kachat mo ... 

                        // Q: Paano kung wala yang CSID ? What if hindi nalang iimplement?
                        // A: Kapag walang CSID, magiging Group Chat ito kasi mababasa nyo lahat ng reply.
                        //    Kaya importante itong csid para maging one-on-one chat lang ;)

                        // OK, let's implement that thru code..

                        // Append the chat messages into chatbox
                        // Pero yung conversation nyong dalawa lang nung kachat mo ang magaappend
                        // Nafifilter yung chat using CSID to hide oher people's converstion

                        if (chatses == current_chatses)
                        {
                            $('.chat-content').append(renderSenderMessage(item));
                        }
                        else if (chatses == reciever_chatses)
                        {
                            $('.chat-content').append(renderRecieverMessage(item));
                        }    

                        // Scroll down to new chat bubble
                        $('.chat-content').animate({scrollTop: $('.chat-content').prop("scrollHeight")},500);                  
                    });
                }
                //
                // Oops! Recursive po ito, kasi tinawag yung load() sa loob ng load().
                // Better call this inside setInterval() doon sa loob ng $(document).ready()
                //
                //load();
            });
        }
        //
        // Ito yung chat bubble mo (kulay blue, positioned at right side)
        //
        function renderSenderMessage(item)
        {
            // let time = new Date(item.created);
            
            // Check if the message content is an ordinary text message
            // Or if an image, render it as image
            // var content = (item.msgtype == "text") ? item.message : `<img src="chat_module/media/${item.message}" width="60" height="60">`; 

            var bubbleContent = (item.msgtype == "text") ? `<div class="msgbox sender"> ${item.message} </div>` : 
                                            `<div class="msgbox sender-media" onclick="ViewImage('chat_module/media/${item.message}')" style="background: url('chat_module/media/${item.message}') 50% 50% no-repeat;">`;

            var bubble = `  <div class="msg-wrapper">${bubbleContent}</div>`;
            
            return bubble; // pag gusto nyong may time and date, use : `<div class="msg"><p>${item.sender}</p>${item.message}<span>${formatAmPm(time)}</span></div>`;
        }
        //
        // Ito yung chat bubble ng kachat mo (kulay gray, positioned at left side)
        //
        function renderRecieverMessage(item)
        {
            // let time = new Date(item.created);
            
            // var bubble = `  <div class="msg-wrapper">
            //                     <div class="msgbox reciever">
            //                         ${item.message} 
            //                     </div>
            //                 </div>`;

            var bubbleContent = (item.msgtype == "text") ? `<div class="msgbox reciever"> ${item.message} </div>` : 
                                            `<div class="msgbox reciever-media" onclick="ViewImage('chat_module/media/${item.message}')" style="background: url('chat_module/media/${item.message}') 50% 50% no-repeat;">`;

            var bubble = `  <div class="msg-wrapper">${bubbleContent}</div>`;
            
            return bubble; //`<div class="msg"><p>${item.sender}</p>${item.message}<span>${formatAmPm(time)}</span></div>`;

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
        
    </script>
</head>
<body>
    <div class="main-container">
        
        <!-- BEGIN EMOJI PICKER MODAL -->
        <div class="emojie-picker-modal" onclick="hideEmojiPicker()">
            <div class="emojie-picker-modal-content">
                <table class="emojie-picker-table">
                    <tr>
                        <td class="emojie" onclick="insertEmojie('&#128512;'); hideEmojiPicker()">&#128512;</td>
                        <td class="emojie" onclick="insertEmojie('&#128514;'); hideEmojiPicker()">&#128514;</td>
                        <td class="emojie" onclick="insertEmojie('&#128525;'); hideEmojiPicker()">&#128525;</td>
                        <td class="emojie" onclick="insertEmojie('&#128545;'); hideEmojiPicker()">&#128545;</td>
                        <td class="emojie" onclick="insertEmojie('&#128549;'); hideEmojiPicker()">&#128549;</td>
                        <td class="emojie" onclick="insertEmojie('&#128558;'); hideEmojiPicker()">&#128558;</td>
                        <td class="emojie" onclick="insertEmojie('&#128077;'); hideEmojiPicker()">&#128077;</td>
                        <td class="emojie" onclick="insertEmojie('&#128151;'); hideEmojiPicker()">&#128151;</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- EMOJI PICKER -->
        <script>
            // INSERT EMOJI INTO INPUT FIELD
            function insertEmojie(emj)
            {
                var inputMsg = $("#message");
                inputMsg.val(inputMsg.val() + emj);
            }
            // SHOW EMOJI PICKER DIALOG
            function showEmojiPicker()
            {
                $(".emojie-picker-modal").css("display", "block");
            }
            // HIDE EMOJI PICKER DIALOG
            function hideEmojiPicker()
            {
                $(".emojie-picker-modal").css("display", "none");
            }

            var emj_mdl = $(".emojie-picker-modal");

            // HIDE THE EMOJI PICKER IF THE USER CLICKED ANYWHERE OUTSIDE OF ITS CONTAINER
            window.onclick = function(event)
            {
                if (event.target == emj_mdl)
                {
                    hideEmojiPicker();
                }
            }
        </script>
        <!-- END EMOJI PICKER MODAL -->

         <!-- Contact Info -->
         <div class="contact-wrapper">
            <div class="contact-info-left">
                <?php 

                // Contact's Profile Pic
                echo "<div class='contact-pic-wrapper'>
                        <img class='contact-pic' src='{$traderPic}' width='42' height='42'>
                      </div>";

                // Contact's Name
                echo "<div class='contact-name-wrapper'>
                        <div class='contact-name'>{$traderfname}</div>
                      </div>";
            ?>
            </div>
            <div class="contact-info-right">
                <!-- GO BACK TO LAST PAGE WHEN BACK BUTTON IS CLICKED --> 
                <button class="btn-go-back" onclick="javascript:history.go(-1)">
                    <img class="icn-go-back" src="chat_module/styles/back.png" width="22" height="22">
                </button> 
            </div>
        </div>

        <div id="chat-content" class="chat-content">
            <!--CHAT MESSAGES-->
            
        </div>
        <div class="chat-input-wrapper">
            <!-- DONT SUBMIT THE FORM WHEN THE EMOJI SWITCH IS CLICKED -->
            <script> $("form").submit(function() {return false; }); </script>

            <!-- CHAT INPUTS -->
            <form action="chat_module/chat.php" method="POST">
                <?php 
                    echo "<input type=\"hidden\" id=\"sender_chatses\" name=\"sender_chatses\" value=\"{$chatSessionId}\">"; 
                    echo "<input type=\"hidden\" id=\"sender_userid\" name=\"sender_userid\" value=\"{$current_uid}\">";
                    echo "<input type=\"hidden\" id=\"senderdp\" name=\"senderdp\" value=\"{$mydp}\">";
                    echo "<input type=\"hidden\" id=\"reciever_userid\" name=\"reciever_userid\" value=\"{$trader_uid}\">";
                    echo "<input type=\"hidden\" id=\"reciever_chatses\" name=\"reciever_chatses\" value=\"{$chatSessionId_Inverse}\">";
                    echo "<input type=\"hidden\" id=\"sender\" name=\"sender\" value=\"{$myfname}\">";
                ?>
                <!-- MEDIA BROWSER -->
                <input type="file" id="upload-media" name="upload-media">
                <input type="text" id="message" name="message" autocomplete="off" autofocus required placeholder="Aa &#128512;">
                 <!-- MEDIA BUTTON -->
                 <button type="button" onclick="invokeUploadMedia()" class="media-switch">
                    <img id="media-icon" src="chat_module/styles/img.png" width="24" height="24">
                </button>
                <!-- EMOJI SWITCH -->
                <button type="button" onclick="showEmojiPicker()" class="emoji-switch">
                    <img id="emoji-icon" src="chat_module/styles/emoji.png" width="24" height="24">
                </button>
                <!-- SEND BUTTON -->
                <button type="submit" id="submit" name="submit">
                    <img id="send-icon" src="chat_module/styles/send.png" width="24" height="24">
                </button>
            </form>
        </div>
        <script>
            
        
        //
        // Invoke a click event onto media browser button
        //
        function invokeUploadMedia() 
        {  
            // Clear file upload values
            $("#upload-media").val("");
        
            // Invoke the file upload button
            $("#upload-media").click(); 
        }

        // Upload the selected media using XmlHTTP Request
        function uploadMedia()
        {
            var media = document.getElementById("upload-media").files;
        
            // Are there Files Selected ?
            if (media.length > 0)
            { 
                // Check file extension if supported. 
                // Allowed image formats : jp(e)g, png and gif.
                // Allowed video : mp4 
                var mediaFormats = ["jpg", "jpeg", "png", "gif", "mp4"];

                // Get current file extension
                var extension = $("#upload-media").val().split('.').pop().toLowerCase();

                // Check for file extension if it is not available on the list
                var formatNotAllowed = ($.inArray(extension, mediaFormats) == -1);

                if (formatNotAllowed) 
                {
                    alert("Unsupported Media Format.\n\nThe selected media is not recognized as a valid jpg, png or gif image.");
                } 
                else
                {
                    // Maximum file size allowed is 25 Megabytes -> 26214400 bytes
                    var maxSize = 26214400;

                    // Check file size if less than 25MB
                    var isSizeAllowed = (media[0].size <= maxSize)

                    // If file size and format is allowed, then begin uploading
                    if (isSizeAllowed)
                    {
                        // Get current file extension (use pop() to get the last string separated by dot. [only if maraming dots yung filename])
                        var current_extension = $("#upload-media").val().split('.').pop().toLowerCase();
             
                        // These data will be passed onto xhttp request
                        var formData = new FormData();

                        formData.append("upload-media", media[0]); 
                        formData.append("from", $("#sender").val());
                        formData.append("sender_chatses", $("#sender_chatses").val());
                        formData.append("sender_userid", $("#sender_userid").val());
                        formData.append("senderdp", $("#senderdp").val());
                        formData.append("reciever_userid", $("#reciever_userid").val());

                        var http = new XMLHttpRequest();
         
                        http.open("POST", "http://localhost/FlipTrade/chat_module/upload_media.php", true); 
                        http.send(formData); 
                    }
                    else
                        alert("Media Size Too Big\n\nFile size must be less than or equal to 25 MB");
                }
                //
                // FOR DEBUGGING LANG NAMAN
                //
                // http.onreadystatechange = function()
                // {
                //     if (this.readyState == 4 && this.status == 200)
                //     {
                //         var response = this.responseText;
                    
                //         if (response == 1)
                //         {
                //             alert ("File uploaded successfully.");  
                //         } 
                //         else
                //         {
                //             alert("Media send failed!");
                //         }
                //     }
                // };
            }
            else
            {
                alert("Please select a valid jpg, png, gif, or mp4 file");
            }
        }

        // Send the media after the file browser has contents in it
        $("#upload-media").change(() => 
        {
            // $("#message").val("attachment : ")
            uploadMedia();
        });

        </script>
    </div> 
    <!-- IMAGE PREVIEWER MODAL BOX -->
    <div id="img-viewer-modal" class="img-viewer-modal">
        <div class="img-viewer-modal-content">
            <span class="img-viewer-modal-close">&times;</span>
            <img id="media-previewer" src="" width="1000px" height="1000px">
        </div>
    </div>
    <script>
        // Get the modal
        var modal = document.getElementById("img-viewer-modal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("img-viewer-modal-close")[0];
 
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
            $("#media-previewer").attr("src", "");
          }
        } 

        //
        // MAKE THE IMAGE VIEWABLE ON CLICK ON IMAGE BUBBLE
        //
        function ViewImage(imgx)
        {
            modal.style.display = "block";
            $("#media-previewer").attr("src",imgx);
        }
    </script>
</body>
</html>
