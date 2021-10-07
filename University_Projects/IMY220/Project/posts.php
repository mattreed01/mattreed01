<?php
require_once 'connectDB.php';

session_start();

$name = $_SESSION['name'];
$sname = $_SESSION['surname'];
$uName = $_SESSION['user_name'];
$userID = $_SESSION["user_ID"];

    if (isset($_GET['imageID']))
    {
        $postCardImageID = $_GET['imageID'];
        $postCardUser = $_GET['user'];
        $where = $_GET['from'];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <!-- Replace Name Surname with your name and surname -->
        <meta name="author" content="Matthew Reed" />
        <title>theCloud.com</title>
        <link rel="icon" href="images/favicon2.png" type="image/x-icon" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
              integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
              integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

        <link href="CSS/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <header class="pages">
                    <div class="row">
                        <div class="offset-0 offset-sm-3 offset-md-4 col-1 offset-lg-0 centerText">
                            <h1>theCloud.com</h1>
                        </div>

                        <div class="offset-3 col-1 largeScreen">
                            <?php
                                if($where == "homePage")
                                {
                                   echo "<a href='home.php#$postCardImageID'><i class='fas fa-arrow-circle-left'></i></a>"; 
                                }
                                elseif ($where == "profilePage")
                                {
                                    echo "<a href='profile.php#$postCardImageID'><i class='fas fa-arrow-circle-left'></i></a>";
                                }
                            ?>
                        </div>
                        <div class="col-1 largeScreen">
                            <a href="global.php"><i class="fas fa-globe-africa inactive"></i></a>
                        </div>
                        <div class="col-1 largeScreen">
                            <a href="upload.php"><i class="fas fa-plus-square inactive"></i></a>
                        </div>
                        <div class="col-1 largeScreen">
                            <a href="profile.php"><i class="fas fa-id-badge inactive"></i></a>
                        </div>

                        <div class="offset-0 offset-md-1 offset-lg-2 col-2 largeScreen">
                            <a href="index.php"><b id="logoutbtn">Log out</b></a>
                        </div>
                    </div>
                </header>
            </div>
            <?php
                if (isset($_GET['imageID']))
                {                    
                    $getPostCardImage = "SELECT * FROM tbGallery WHERE image_id = '$postCardImageID';";
                                        
                    $getPostCardImageResult = $mysqli->query($getPostCardImage)->fetch_assoc();
                    $getPostCardImageResultImageName = $getPostCardImageResult['filename'];
                    $getPostCardImageResultCaption = $getPostCardImageResult['caption'];
                                        
                    echo "<figure>
                        <img src='Gallery/$getPostCardImageResultImageName' alt='image' />
                                                
                        <figcaption>
                            <h2>$postCardUser</h2>
                            <p>$getPostCardImageResultCaption</p>
                            <hr />";
                    
                    $qryComments = "SELECT * FROM tbposts WHERE image_id LIKE '$postCardImageID' ORDER BY comment_id DESC;";
                    $fetchComments = $mysqli->query($qryComments);
                    $getCommentUser;
                                                            
                    if ($fetchComments->num_rows > 0)
                    {
                        while ($commentsArray = $fetchComments->fetch_assoc())
                        {
                            $getCommentUser = "SELECT username FROM tbusers WHERE user_id LIKE '".$commentsArray['user_id']."'";
                            $getCommentUserResult = $mysqli->query($getCommentUser)->fetch_assoc()['username'];
                            echo "<p><b>$getCommentUserResult</b> ".$commentsArray['comments']."</p>";
                        }
                    }
                    
                        echo "</figcaption>
                    </figure>";  
                }
            ?>
            <footer class="smallScreen">
                <?php
                    if($where == "homePage")
                    {
                        echo "<a href='home.php#$postCardImageID'><i class='fas fa-arrow-circle-left'></i></a>"; 
                    }
                    elseif ($where == "profilePage")
                    {
                        echo "<a href='profile.php#$postCardImageID'><i class='fas fa-arrow-circle-left'></i></a>";
                    }
                ?>
                <a href="global.php"><i class="fas fa-globe-africa inactive"></i></a>
                <a href="upload.php"><i class="fas fa-plus-square inactive"></i></a>
                <a href="profile.php"><i class="fas fa-id-badge inactive"></i></a>
                <a href="index.php"><b id="logoutbtn">Log out</b></a>
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>