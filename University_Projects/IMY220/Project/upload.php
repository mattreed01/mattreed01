<?php
require_once 'connectDB.php';
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
                            <a href="home.php"><i class="fas fa-home inactive"></i></a>
                        </div>
                        <div class="col-1 largeScreen">
                            <a href="global.php"><i class="fas fa-globe-africa inactive"></i></a>
                        </div>
                        <div class="col-1 largeScreen">
                            <i class="fas fa-plus-square active"></i>
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

            <div class="uploadForm">
                <form action="upload.php" method="POST" enctype='multipart/form-data'>
                    <?php //echo "<input type='hidden' name='uID' value='" . $userID . "' />" ?>
                    <input type='file' name='picture[]' id='picToUpload' multiple='multiple' /><br />
                    <label for="comments">Caption&#58;</label><br />
                    <input type='textarea' name='caption' id='comments' cols="50" rows="5" /><br />
                    <input type='submit' value='Upload Image' name='submit' />
                </form>
            </div>       

            <?php
            if (isset($_POST['submit'])) {
                
                $caption = htmlspecialchars($_POST['caption']);
                
                $uploadedFile = $_FILES['picture'];
                $numFiles = count($uploadedFile['name']);

                for ($i = 0; $i < $numFiles; $i++) {
                    $targetDirectory = "Gallery/";
                    $targetFile = $targetDirectory . basename($uploadedFile['name'][$i]);
                    $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);
                    //echo "Target File: " . $targetFile . "<br />";
                    //echo "Path Info: " . pathinfo($targetFile,PATHINFO_EXTENSION) . "<br/>";
                    //echo "Image File Type: " . $imageFileType . "<br/>";
                    //if(isset($_POST['submit']))
                    {
                        $check = getimagesize($uploadedFile['tmp_name'][$i]);

                        if (!($check !== false)) {
                            echo "File is not an image";
                        }
                    }

                    $allowedFileTypes = array("jpg", "jpeg", "png");
                    //echo $allowedFileTypes[0] . "<br/>";
                    //echo $allowedFileTypes[1] . "<br/>";
                    //echo "Image File Size: " . $uploadedFile['size'] . "<br/>";
                    $maxImageSize = 5242880; //5mb expressed in Bytes

                    if (in_array($imageFileType, $allowedFileTypes) && $uploadedFile['size'][$i] < $maxImageSize) {
                        if ($uploadedFile['error'][$i] > 0) {
                            echo '<div class="message"><div class="alert alert-danger mt-3 message" role="alert">
                                                Error: ' . $uploadedFile["error"][$i] . '
                                            </div></div>';
                        } else {
                            if (move_uploaded_file($uploadedFile['tmp_name'][$i], $targetFile)) {
                                $fileName = basename($uploadedFile['name'][$i]);
                                //echo "File name: ".$fileName."<br/>"; 
                                $insertQRY = "INSERT INTO tbgallery (user_id, filename, caption) VALUES ('$userID', '$fileName', '$caption');";
                                $insert = $mysqli->query($insertQRY);
                                
                                echo '<div class="message"><div class="alert alert-primary mt-3 message" role="alert">
                                                    Image Uploaded
                                                </div></div>';
                            } else {
                                echo '<div class="message"><div class="alert alert-danger mt-3 message" role="alert">
                                                    Could Not Upload Image
                                                </div></div>';
                            }
                        }
                    } else {
                        echo '<div class="message"><div class="alert alert-danger mt-3" role="alert">
                                            Invalid File
                                        </div></div>';
                    }
                }
            }
            ?>

            <footer class="smallScreen">
                <i class="fas fa-home inactive"></i>
                <a href="global.php"><i class="fas fa-globe-africa inactive"></i></a>
                <a href="upload.php"><i class="fas fa-plus-square active"></i></a>
                <a href="profile.php"><i class="fas fa-id-badge inactive"></i></a>
                <a href="index.php"><b id="logoutbtn2">Log out</b></a>
            </footer>
        </div>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        
    </body>
</html>