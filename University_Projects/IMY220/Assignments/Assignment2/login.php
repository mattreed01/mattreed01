<?php
    // See all errors and warnings
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "dbUser";
    $mysqli = mysqli_connect($server, $username, $password, $database);

    $email = isset($_POST["loginEmail"]) ? $_POST["loginEmail"] : false;
    $pass = isset($_POST["loginPass"]) ? $_POST["loginPass"] : false;
    // if email and/or pass POST values are set, set the variables to those values, otherwise make them false
    
    $userID = " ";
    $qryTBUsers = "SELECT user_id FROM tbusers WHERE email LIKE '$email' AND password LIKE '$pass';";
    $tbUserResult = $mysqli->query($qryTBUsers);
    if ($row = mysqli_fetch_array($tbUserResult))
    {
        $userID = $row['user_id'];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>IMY 220 - Assignment 2</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
              integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta charset="utf-8" />
        <meta name="author" content="Matthew Reed">
        <!-- Replace Name Surname with your name and surname -->
    </head>
    <body>
        <div class="container">
            <?php
                if ($email && $pass)
                {
                    $query = "SELECT * FROM tbusers WHERE email = '$email' AND password = '$pass'";
                    $res = $mysqli->query($query);
                    if ($row = mysqli_fetch_array($res))
                    {
                        echo "<table class='table table-bordered mt-3'>
                                <tr>
                                    <td>Name</td>
                                    <td>" . $row['name'] . "</td>
                                <tr>
                                <tr>
                                    <td>Surname</td>
                                    <td>" . $row['surname'] . "</td>
                                <tr>
                                <tr>
                                    <td>Email Address</td>
                                    <td>" . $row['email'] . "</td>
                                <tr>
                                <tr>
                                    <td>Birthday</td>
                                    <td>" . $row['birthday'] . "</td>
                                <tr>
                            </table>

                            <form action='login.php' method='POST' enctype='multipart/form-data'>
                                <div class='form-group'>
                                    <input type='hidden' name='loginEmail' value='" . $email . "' />
                                    <input type='hidden' name='loginPass' value='" . $pass . "' />
                                    <input type='file' class='form-control' name='picToUpload[]' id='picToUpload' multiple='multiple' /><br/>
                                    <input type='submit' class='btn btn-standard' value='Upload Image' name='submit' />
                                </div>
                           </form>"; 
                        
                        if(isset($_POST['submit']))
                        {
                            $uploadedFile = $_FILES['picToUpload'];
                            $numFiles = count($uploadedFile['name']);
                            
                            for ($i = 0; $i < $numFiles; $i++)
                            {
                                $targetDirectory = "gallery/";
                                $targetFile = $targetDirectory.basename($uploadedFile['name'][$i]);
                                $imageFileType = pathinfo($targetFile,PATHINFO_EXTENSION);
                                //echo "Target File: " . $targetFile . "<br />";
                                //echo "Path Info: " . pathinfo($targetFile,PATHINFO_EXTENSION) . "<br/>";
                                //echo "Image File Type: " . $imageFileType . "<br/>";

                                //if(isset($_POST['submit']))
                                {
                                    $check = getimagesize($uploadedFile['tmp_name'][$i]);
                                
                                    if(!($check !== false))
                                    {
                                        echo "File is not an image";
                                    }
                                }
                            
                                $allowedFileTypes = array("jpg", "jpeg");
                                //echo $allowedFileTypes[0] . "<br/>";
                                //echo $allowedFileTypes[1] . "<br/>";
                                //echo "Image File Size: " . $uploadedFile['size'] . "<br/>";
                                $maxImageSize = 1048576; //1mb expressed in Bytes
                            
                                if(in_array($imageFileType, $allowedFileTypes) && $uploadedFile['size'][$i] < $maxImageSize)
                                {
                                    if ($uploadedFile['error'][$i] > 0)
                                    {
                                        echo '<div class="alert alert-danger mt-3" role="alert">
                                                Error: '.$uploadedFile["error"][$i].'
                                            </div>';
                                    }
                                    else
                                    {
                                        if(move_uploaded_file($uploadedFile['tmp_name'][$i], $targetFile))
                                        {
                                            $fileName = basename($uploadedFile['name'][$i]);
                                            //echo "File name: ".$fileName."<br/>"; 
                                            $insertQRY = "INSERT INTO tbgallery (user_id, filename) VALUES ('$userID', '$fileName');";
                                            $insert = $mysqli->query($insertQRY);
                                        
                                            /*if($insert)
                                            {
                                                echo "Sheer Genius";
                                            }
                                            else
                                            {
                                                echo "Habe, you dumb";
                                            }*/
                                        }
                                        else
                                        {
                                            echo '<div class="alert alert-danger mt-3" role="alert">
                                                    Image Upload Failed
                                                </div>'; 
                                        }
                                    }   
                                }
                                else
                                {
                                    echo '<div class="alert alert-danger mt-3" role="alert">
                                            Invalid File
                                        </div>';  
                                }
                            }
                        }
                        
                        $qryTBGallery = "SELECT filename FROM tbgallery WHERE user_id LIKE '$userID'";
                        $tbGalleryResult = $mysqli->query($qryTBGallery);
                        
                        if($tbGalleryResult->num_rows > 0)
                        {
                            echo "<h3>Image Gallery</h3>";
                            
                            echo "<div class='row imageGallery'>";
                                    while($row = $tbGalleryResult->fetch_assoc())
                                    {
                                       echo "<div class='col-3' style='background-image: url(gallery/".$row['filename'].");'>
                                        </div>";
                                    }
                            echo "</div>";
                        }
                    }
                    else 
                    {
                        echo '<div class="alert alert-danger mt-3" role="alert">
                                You are not registered on this site!
                            </div>';
                    }
                } 
                else 
                {
                    echo '<div class="alert alert-danger mt-3" role="alert">
                            Could not log you in
                        </div>';
                }
            ?>
        </div>
    </body>
</html>
