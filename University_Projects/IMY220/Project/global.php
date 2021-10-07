<?php
require_once 'connectDB.php';
session_start();
unset($_SESSION['from']);
unset($_SESSION['visitID']);

$name = $_SESSION['name'];
$sname = $_SESSION['surname'];
$uName = $_SESSION['user_name'];
$userID = $_SESSION["user_ID"];
$email = $_SESSION['email'];

if (isset($_POST['subcom'])) {
    $commentUID = $_POST['uID'];
    $commentIID = $_POST['iID'];
    $comment = htmlspecialchars($_POST['comment']);

    $insertComment = "INSERT INTO tbposts (image_id, user_id, comments) VALUES ('$commentIID', '$commentUID', '$comment');";
    $executeInsertCommentQRY = $mysqli->query($insertComment);
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
                            <a href="home.php"><i class="fas fa-home inactive"></i></a>
                        </div>
                        <div class="col-1 largeScreen">
                            <i class="fas fa-globe-africa active"></i>
                        </div>
                        <div class="col-1 largeScreen">
                            <a href="upload.php"><i class="fas fa-plus-square inactive"></i></a>
                        </div>
                        <div class="col-1 largeScreen">
                            <a href="profile.php"><i class="fas fa-id-badge inactive"></i></a>
                        </div>

                        <div class="offset-0 offset-md-1 offset-lg-2 col-2 largeScreen">
                            <a href="index.php"><b id="logoutbtn2">Log out</b></a>
                        </div>
                    </div>
                </header>
            </div>

            <div class="home imageGallery">
                <div class="row mt-5">
                    <?php
                    $qryTBGallery = "SELECT * FROM tbgallery ORDER BY image_id DESC";
                    $tbGalleryResult = $mysqli->query($qryTBGallery);

                    $qryTBUser;

                    if ($tbGalleryResult->num_rows > 0) {
                        while ($row = $tbGalleryResult->fetch_assoc()) {
                            $qryTBUser = "SELECT username FROM tbusers WHERE user_id LIKE '" . $row['user_id'] . "'";
                            $tbusersresult = $mysqli->query($qryTBUser)->fetch_assoc()['username'];

                            echo "<div class='offset-1 col-block-4 col-md-4 col-lg-3 mt-3' id='" . $row['image_id'] . "'>
                                                <div class='card'>
                                                    <a class='postCard' href='posts.php?imageID=" . $row['image_id'] . "&user=" . $tbusersresult . "&from=" . 'homePage' . "'>
                                                        <img class='card-img-top' src='Gallery/" . $row['filename'] . "' alt='Image' />
                                                    </a>
                                                        
                                                    <div class='card-body'>
                                                        <div class='card-title'>
                                                            <h4><a href='user.php?request="."global"."&visit=".$row['user_id']."'> $tbusersresult </a></h4>
                                                        </div>
                                                        <div class='card-text'>
                                                            <p>" . $row['caption'] . "</p>
                                                            <hr />
                                                            <form action='global.php' method='POST'>
                                                                <input type='hidden' name='uID' value='" . $_SESSION['user_ID'] . "' />
                                                                <input type='hidden' name='iID' value='" . $row['image_id'] . "'/>
                                                                <input type='textarea' name='comment' rows='5' placeholder='Add your comment here' />
                                                                <input type='submit' name='subcom' value='Post' />
                                                            </form>
                                                            <hr />";
                            $qryComments = "SELECT * FROM tbposts WHERE image_id LIKE '" . $row['image_id'] . "' ORDER BY comment_id DESC LIMIT 1;";
                            $fetchComments = $mysqli->query($qryComments);
                            $getCommentUser;

                            if ($fetchComments->num_rows > 0) {
                                while ($commentsArray = $fetchComments->fetch_assoc()) {
                                    $getCommentUser = "SELECT username FROM tbusers WHERE user_id LIKE '" . $commentsArray['user_id'] . "'";
                                    $getCommentUserResult = $mysqli->query($getCommentUser)->fetch_assoc()['username'];
                                    echo "<p><b>$getCommentUserResult</b> " . $commentsArray['comments'] . "</p>";
                                }
                            }

                            echo "</div>
                                                    </div>
                                                </div>                                            
                                        </div>";
                        }
                    } else {
                        echo "<div class='col-12 noActivity'><p>No new activity!</p></div>";
                    }
                    ?>
                </div>
            </div>

            <footer class="smallScreen">
                <a href="home.php"><i class="fas fa-home inactive"></i></a>
                <i class="fas fa-globe-africa active"></i>
                <a href="upload.php"><i class="fas fa-plus-square inactive"></i></a>
                <a href="profile.php"><i class="fas fa-id-badge inactive"></i></a>
                <a href="index.php"><b id="logoutbtn2">Log out</b></a>
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