<?php
    require_once 'connectDB.php';
    session_start();
    
    $name = $_SESSION['name'];
    $sname = $_SESSION['surname'];
    $uName = $_SESSION['user_name'];
    $userID = $_SESSION["user_ID"];
    $email = $_SESSION['email'];
    
    if(isset($_POST['changeBio']))
    {
        $newName = htmlspecialchars($_POST['nameInput']);
        $newSname = htmlspecialchars($_POST['snameInput']);
        $newEmail = htmlspecialchars($_POST['emailInput']);
        
        $updateTBUsersQRY = "UPDATE tbusers SET name = '$newName', surname = '$newSname', email = '$newEmail' WHERE user_id LIKE '$userID'";
        $mysqli->query($updateTBUsersQRY);
        
        $name = $newName;
        $sname = $newSname;
        $email = $newEmail;
    }
    
    if(isset($_POST['changePic']))
    {
        $uploadedFile = $_FILES['newPic'];
        //$numFiles = count($uploadedFile['name']);
        
        $targetDirectory = "Gallery/ProfileImages/";
        $targetFile = $targetDirectory . basename($uploadedFile['name']);
        $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);
        
        $allowedFileTypes = array("jpg", "jpeg", "png");
        $maxImageSize = 5242880; //5mb expressed in Bytes
        
        $check = getimagesize($uploadedFile['tmp_name']);
        
        if($check !== false && in_array($imageFileType, $allowedFileTypes) && $uploadedFile['size'] < $maxImageSize && $uploadedFile['error'] <= 0)
        {
            if(move_uploaded_file($uploadedFile['tmp_name'], $targetFile))
            {
                $fileName = basename($uploadedFile['name']);
                $updateTBUsersQRY = "UPDATE tbusers SET profile_photo = '$fileName' WHERE user_id LIKE '$userID'";
                $mysqli->query($updateTBUsersQRY);
            }
        }
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
                            <a href="global.php"><i class="fas fa-globe-africa inactive"></i></a>
                        </div>
                        <div class="col-1 largeScreen">
                            <a href="upload.php"><i class="fas fa-plus-square inactive"></i></a>
                        </div>
                        <div class="col-1 largeScreen">
                            <i class="fas fa-id-badge active"></i>
                        </div>

                        <div class="offset-0 offset-md-1 offset-lg-2 col-2 largeScreen">
                            <a href="index.php"><b id="logoutbtn2">Log out</b></a>
                        </div>
                    </div>
                </header>
            </div>
            
            <?php
                $getProfilePhoto = "SELECT profile_photo FROM tbusers WHERE user_id LIKE '$userID'";
                $getProfilePhotoResult = $mysqli->query($getProfilePhoto)->fetch_assoc()['profile_photo'];
                
                $getTotalFollowers = "SELECT COUNT(follower_id) AS NumFollowers FROM tbfollowers WHERE following_id LIKE '$userID'";
                $getTotalFollowersResult = $mysqli->query($getTotalFollowers)->fetch_assoc()['NumFollowers'];
                
                $getTotalFollowing = "SELECT COUNT(following_id) AS NumFollowing FROM tbfollowers WHERE follower_id LIKE '$userID'";
                $getTotalFollowingResult = $mysqli->query($getTotalFollowing)->fetch_assoc()['NumFollowing'];
                
                echo "<div class='profileInfo'>
                    <div id='Image'>
                        <img src='Gallery/ProfileImages/$getProfilePhotoResult' alt='dp'/>
                    </div>
                    <div id='bio'>
                        <b>$uName</b>
                        <br />
                        <span id='followers'>
                            <a href='userList.php?result=".'followers'."'>Followers: $getTotalFollowersResult</a> 
                            <a href='userList.php?result=".'following'."'>Following: $getTotalFollowingResult</a>
                        </span>
                        <div>
                            <span id='name' data-type='text'>$name</span><span id='surname' data-type='text'> $sname</span>
                            <br />
                            <span id='email' data-type='email'>$email</span>
                        </div>
                        <button id='editProfPhoto'>Change Profile Photo</button> <button id='editBio'>Edit Bio</button>
                    </div>
                </div>";
                
                echo "<div class='profile imageGallery'>";
                echo "<div class='row'>";
                
                $qryTBGallery = "SELECT * FROM tbgallery WHERE user_id LIKE '$userID' ORDER BY image_id DESC";
                $tbGalleryResult = $mysqli->query($qryTBGallery);
                    
                $qryTBUser;
                    
                if($tbGalleryResult->num_rows > 0)
                {  
                    while($row = $tbGalleryResult->fetch_assoc())
                    {
                        $qryTBUser = "SELECT username FROM tbusers WHERE user_id LIKE '".$row['user_id']."'";  
                        $tbusersresult = $mysqli->query($qryTBUser)->fetch_assoc()['username'];
                            
                        echo "<div class='offset-1 col-block-4 col-md-4 col-lg-3 mt-3'>
                                <div class='card'>
                                    <a class='postCard' href='posts.php?imageID=".$row['image_id']."&user=".$tbusersresult."&from=".'profilePage'."'>
                                        <img class='card-img-top' src='Gallery/".$row['filename']."' alt='Image' />
                                    </a>
                                    
                                    <div class='card-body'>
                                        <div class='card-title'>
                                            <h4> $tbusersresult </h4>
                                        </div>
                                        <div class='card-text'>
                                            <p>".$row['caption']."</p>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                    }
                }
                else 
                {
                    echo "<div class='col-12 noActivity'><p>No posts yet!</p></div>";
                }
                
                echo "</div>";
                echo "</div>";
            ?>

            <footer class="smallScreen">
                <a href="home.php"><i class="fas fa-home inactive"></i></a>
                <a href="global.php"><i class="fas fa-globe-africa inactive"></i></a>
                <a href="upload.php"><i class="fas fa-plus-square inactive"></i></a>
                <i class="fas fa-id-badge active"></i>
                <a href="index.php"><b id="logoutbtn2">Log out</b></a>
            </footer>
        </div>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        
        <script src="JS/buttonFunctionality.js" type="text/javascript"></script>
        
    </body>
</html>