<?php
require_once 'connectDB.php';
if(isset($_SESSION['from']))
{
    unset($_SESSION['from']);
    unset($_SESSION['visitID']); 
}


session_start();

$name = $_SESSION['name'];
$sname = $_SESSION['surname'];
$uName = $_SESSION['user_name'];
$userID = $_SESSION["user_ID"];
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
                            <a href='profile.php'><i class='fas fa-arrow-circle-left'></i></a>
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

            <div id="listResults">
            <?php
                if($_GET['result'] === 'followers')
                {
                    $getFollowerList = "SELECT follower_id FROM tbfollowers WHERE following_id LIKE '$userID'";
                    $getFollowerListResult = $mysqli->query($getFollowerList);
                    
                    if($getFollowerListResult->num_rows > 0)
                    {
                        echo "<ol>";
                        
                        while($row = $getFollowerListResult->fetch_assoc())
                        {
                            $tbUsersQRY = "SELECT username FROM tbusers WHERE user_id LIKE '".$row['follower_id']."'";
                            $tbUsersQRYResult = $mysqli->query($tbUsersQRY)->fetch_assoc()['username'];
                            
                            echo "<li><a href='user.php?request=".'follower'."&visit=".$row['follower_id']."'>$tbUsersQRYResult</a></li>";
                        }
                        
                        echo "</ol>";
                    }
                    else
                    {
                        echo "<div>Looks Like Nobody Is Following You</div>";
                    }
                }
                elseif($_GET['result'] === 'following')
                {
                    $getFollowingList = "SELECT following_id FROM tbfollowers WHERE follower_id LIKE '$userID'";
                    $getFollowingListResult = $mysqli->query($getFollowingList);
                    
                    if($getFollowingListResult->num_rows > 0)
                    {
                        echo "<ol>";
                        
                        while($row = $getFollowingListResult->fetch_assoc())
                        {
                            $tbUsersQRY = "SELECT username FROM tbusers WHERE user_id LIKE '".$row['following_id']."'";
                            $tbUsersQRYResult = $mysqli->query($tbUsersQRY)->fetch_assoc()['username'];
                            
                            echo "<li><a href='user.php?request="."following"."&visit=".$row['following_id']."'>$tbUsersQRYResult</a></li>";
                        }
                        
                        echo "</ol>";
                    }
                    else
                    {
                        echo "<div>Looks Like You Are Not Following Anyone</div>";
                    }
                }
            ?>
            </div>
            
            <footer class="smallScreen">
                <a href='profile.php'><i class='fas fa-arrow-circle-left'></i></a>
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