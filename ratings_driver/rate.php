<?php 
    include_once("cfg/config.php");
    include_once("ratings.php");
    include_once("reviewersinfo.php") ;

    $postid = isset($_GET['postid']) ? $_GET['postid'] : null;
    $posttitle = isset($_GET['title']) ? $_GET['title']  : null;
    $postimg = isset($_GET['preview_img']) ? $_GET['preview_img'] : null;
    $myuid = isset($_GET['current_uid']) ? $_GET['current_uid'] : null;

    // check if we already reviewed this product
    $current_review = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM ratings WHERE productid = '{$postid}' AND ratedby = '{$myuid}'"));
    
    $reviewed = mysqli_fetch_assoc(mysqli_query($db, "SELECT COUNT(*) AS revd FROM ratings WHERE productid = '{$postid}' AND ratedby = '{$myuid}'"));
    $isreviewed = $reviewed['revd'];

    $comment = "";
    $stars = "";

    if ($isreviewed != "" && intval($isreviewed) > 0)
    {
        $comment = $current_review['comment'];
        $stars = $current_review['rating'];
    }

    // all customer reviews
    $allreviews =  mysqli_query($db, "SELECT * FROM ratings WHERE productid = '{$postid}'");
    // echo $isreviewed;
    // echo ($current_review -> num_rows);
    // $res = $rating['ratingfive'];
 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title> 
    <script src="jquery.min.js"></script>
    <link rel="stylesheet" href="ratings_style.css">
    <link href="star-rating.css" rel="stylesheet">
</head>
<body>
 <div class="main-container">
    <div class="main-container-content">
        <div class="main-content-header">
            <div class="header-content-left">Rate Product</div>    
            <div class="header-content-right">
                <button class="btn-go-back" onclick="javascript:history.go(-1)">
                    <img class="icn-go-back" src="goback.png" width="22" height="22">
                </button> 
            </div>    
        </div>
        <div id="review-rating-content" class="review-rating-content">
            
        <div class="product-preview-wrapper">
            <div class="product-image-preview">
                <img id="product-image" src="<?php echo "../{$postimg}\""; ?> width="128">
            </div>
            <div class="product-review-controls-wrapper">
                <div class="product-review-controls">
                    <div id="product-review-name"><?php echo $posttitle; ?></div>
                    <div id="product-review-subtitle">Your review is always public and visible to your account. Remember to keep your comments respectful.</div>
                    <div class="star-rating-wrapper">
                        <form action="post_review.php" method="POST">
                        <div id="star-rating-title">How satisfied are you with this product?</div>
                        <div class="star-rating-controls-wrapper">
                            <div class="star-rating-controls">
                                <select class="star-rating">
                                    <option value="">Select a rating</option>
                                    <option value="5">Excellent</option>
                                    <option value="4">Very Good</option>
                                    <option value="3">Average</option>
                                    <option value="2">Poor</option>
                                    <option value="1">Terrible</option>
                                </select>
                            </div>
                        </div>
                        <div class="review-box-wrapper">
                            Please tell us more about your experience in using this product.
                            <div class="comment-box-wrapper">
                                <textarea name="input-comment-box" class="input-comment-box" id="input-comment-box" 
                                            style="width:100%; height:150px; resize: none;"><?php echo $comment; ?></textarea>
                                <div class="comment-action-buttons">
                                    <button type="button" class="comment-action-button">Not Now</button>
                                    <button type="submit" class="comment-action-button" id="btn-post-review">Post</button>
                                </div>
                            </div>
                        </div>
                            <input type="hidden" id="star-rating-amount" name="star-rating-amount">
                            <input type="hidden" id="myuid" name="myuid" value="<?php echo $myuid; ?>">
                            <input type="hidden" id="postid" name="postid" value="<?php echo $postid; ?>">
                            <input type="hidden" id="reviewed" name="reviewed" value="<?php echo $isreviewed; ?>">
                            <input type="hidden" id="numstars" name="numstars" value="<?php echo $stars; ?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- PUBLIC RATINGS AND REVIEWS -->
        <div class="ratings-and-review">
            <div id="virtual-seprator" style="border-bottom: 1px solid #DEDEDE;"></div>
            <div class="ratings-and-review-content-wrapper">
                <div id="ratings-and-review--header">Ratings And Reviews</div>
                <div class="quality-marker-stars-wrapper">
                    <div class="quality_marker_numerical">
                        <?php echo getNumericalRating($db, $postid); ?>
                    </div>
                    <div class="quality_marker_stars">
                        <?php  
                            $avgRating = getAverageRating($db, $postid);
                            // create the stars.
                            // add a counter for rated stars. (yellow)
                            $goodStars = 0;
                            for ($i = 0; $i < 5; $i++)
                            {
                                // tell between good (yellow) and bad (gray) stars
                                if ($goodStars < $avgRating)
                                {
                                    // Good stars
                                    echo "<img src=\"star_quality_active.png\" width=\"18\" height=\"18\">";
                                }
                                else
                                {
                                    // Bad stars
                                    echo "<img src=\"star_quality_default.png\" width=\"18\" height=\"18\">";
                                }
                            
                                $goodStars ++;
                            }
                        ?> 
                    </div>
                    <div class="quality_rating_equivalent">
                        <?php echo getRatingEquivalent(getAverageRating($db, $postid)); ?>
                    </div>
                </div>
            </div>
            <div id="ratings-and-review-all-content">
                <div id="virtual-seprator" style="margin-top: 8px; border-bottom: 1px solid #DEDEDE;"></div>
                    <?php 
                        while ($row = $allreviews->fetch_assoc())
                        {
                            // reviewer's name
                            $revrname = GetReviewersName($db, $row['ratedby']);

                            // users' ratings
                            $userratings = $row['rating'];

                            echo "<div id=\"rating-review-content-card\">
                                    <div id=\"reviewers-info\">
                                        <div id=\"rating-reviewer-name\">{$revrname}</div>
                                        <div id=\"rating-reviewer-stars\">";

                                        $yellowStars = 0;

                                        for ($k = 0; $k < 5; $k++)
                                        {
                                            // tell between good (yellow) and bad (gray) stars
                                            if ($yellowStars < intval($userratings))
                                            {
                                                // Good stars
                                                echo "<img src=\"star_quality_active.png\" width=\"18\" height=\"18\">";
                                            }
                                            else
                                            {
                                                // Bad stars
                                                echo "<img src=\"star_quality_default.png\" width=\"18\" height=\"18\">";
                                            }
                                        
                                            $yellowStars ++;
                                        }

                            echo        "</div>
                                    </div>
                                    <div id=\"review-content-comment\">
                                        {$row['comment']}
                                    </div>
                                </div>";
                        }
                    ?>
                    <!-- <div id="rating-review-content-card">
                        <div id="reviewers-info">
                            <div id="rating-reviewer-name">Abc Name</div>
                            <div id="rating-reviewer-stars">xxxx</div>
                        </div>
                        <div id="review-content-comment">
                            comment
                        </div>
                    </div> -->
            </div>
        </div>
        </div>
       
    </div>
 </div>
 <script src="star-rating.js"></script>
<script>
    // initialize the star controls
    var stars = new StarRating('.star-rating');
    // the selected star rating
    var rating = $(".star-rating").val();

    $(document).ready(() => 
    {
        // check if we already rated this product
        var val_reviewed = $("#reviewed").val();
        var isReviewed = false;

        if (val_reviewed != "")
        {
            var r = parseInt(val_reviewed);
            
            if (r > 0)
                isReviewed = true;
        }
        

        // we already rated this before
        if (isReviewed)
        {
            var currentStars = $("#numstars").val();
             
            $(".star-rating").val(currentStars);
            stars.rebuild();
            // rating = stars.value();
            rating = $(".star-rating").val();
            $("#star-rating-amount").val(rating);

            $("#btn-post-review").text("Update");
        }
        else
        {
            $("#btn-post-review").text("Post");
        }

        // alert(rating);
    });
     
    // get the selected rating value
    $(".star-rating").change(() => 
    {
        // update the selected rating
        rating = $(".star-rating").val();
        $("#star-rating-amount").val(rating);
    });

    // the comment to post
    var comment = comment = $("#input-comment-box").val();

    // get the comment currently typed
    $("#input-comment-box").keyup(() => 
    {
        comment = $("#input-comment-box").val();
    });

     
    $("form").submit((e) => 
    {
        // alert("If you have already reviewed a product, your existing ratings and review will be updated instead.");

        if (comment == "")
        {
            // e.preventDefault();
            e.stopImmediatePropagation();
            alert("Please provide a valid comment!");
            return false;
        }
        if (rating == "")
        {
            e.stopImmediatePropagation();
            alert("Please provide atleast a one-star rating!");
            return false;
        }
    });

</script>
</body>
</html>
