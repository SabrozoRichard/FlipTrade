<?php
                if (isset($_POST['verify'])) {
                  $userid=$_POST['userid'];
                  $userstate=$_POST['userstate'];

                  if ($userstate=="pending") {
                    mysqli_query($connection,"UPDATE tbl_user SET userstate='Verified' WHERE userid='$userid'");
                  }
                
                  header("Location: user_post_admin.php");
}
              ?>