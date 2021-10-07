<?php
    // See all errors and warnings
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "dbUser";
    $mysqli = mysqli_connect($server, $username, $password, $database);
    
    if(!$mysqli)
    {
       die("Connection Error: ".$mysqli_connect_error()); 
    }

    $name = $_POST["regName"];
    $surname = $_POST["regSurname"];
    $email = $_POST["regEmail"];
    $date = $_POST["regBirthDate"];
    $pass = $_POST["pass1"];

    $query = "INSERT INTO tbusers (name, surname, email, birthday, password) VALUES ('$name', '$surname', '$email', '$date', '$pass');";

    $res = mysqli_query($mysqli, $query) == TRUE;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>IMY 220 - Assignment 2</title>
        <meta name="author" content="Matthew Reed">
        <!-- Replace Name Surname with your name and surname -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
              integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <?php
                if ($res)
                    echo '<div class="alert alert-primary mt-3" role="alert">
  						The account has been created
  					</div>';
                else
                    echo '<div class="alert alert-danger mt-3" role="alert">
  						The account could not be created
  					</div>';
            ?>
        </div>
    </body>
</html>
