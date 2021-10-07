<?php
    session_start();

    if (isset($_SESSION['user_ID']))
    {
        session_unset();
        session_destroy(); 
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
                <header><h1>theCloud.com</h1></header>
            </div>
            
            <div class="row mt-5">
                <div class="offset-lg-1 col-lg-9 mt-5">
                    <div id="signup" class="formsheet">
                        <h3>Sign Up</h3>
                        
                        <form action="home.php" method="POST">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label for="firstname">First Name&#58;</label><br />
                                    <input type="text" id="firstname" name="fname" placeholder="John" required="required" />
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="surname">Surname&#58;</label><br />
                                    <input type="text" id="surname" name="sname" placeholder="Doe" required="required" />
                                </div>
                            </div>
                            
                            <div class="row mt-2">
                                <div class="col-12 col-md-6">
                                    <label for="username">Username&#58;</label><br />
                                    <input type="text" id="username" name="uname" placeholder="JohnDoe12" required="required" />
                                </div>

                                <div class="col-12 col-md-4">
                                    <label for="gmail">E-mail&#58;</label><br />
                                    <input type="email" id="gmail" name="email" placeholder="JohnDoe@email.com" required="required" />
                                </div>
                            </div>
                            
                            <div class="row mt-2">
                                <div class="col-12 col-md-6">
                                    <label for="password">Password&#58;</label><br />
                                    <input type="password" id="password" name="pword" placeholder="*******" required="required" />
                                </div>
                                
                                <div class="col-12 col-md-6">
                                    <label for="password2">Confirm Password&#58;</label><br />
                                    <input type="password" id="password2" name="pword2" placeholder="*******" />
                                </div>
                            </div>
                            
                            <div class="row mt-2">
                                <div class="col-12 col-md-6">
                                    <input type="submit" class="sbmt" name="signupsbm" value="Sign Up"/>
                                </div>
                                <div class="col-12 col-md-6">
                                    <span id="subtn">Already a cloud-watcher? <b>Log in</b></span>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div id="login" class="formsheet outview">
                        <h3>Log in</h3>
                        
                        <form action="home.php" method="POST">
				<div class="row mt-2">
                                <div class="col-12 col-md-6">
                                    <label for="logingmail">E-mail&#58;</label><br />
                                    <input type="email" id="logingmail" name="loginEmail" placeholder="JohnDoe@email.com" required="required" />
                                </div>
                                    
                                <div class="col-12 col-md-6">
                                    <label for="loginpassword">Password&#58;</label><br />
                                    <input type="password" id="loginpassword" name="loginPword" placeholder="*******" required="required" />
                                </div>
                            </div>
                            
                            <div class="row mt-2">
                                <div class="col-12 col-md-6">
                                    <input type="submit" class="sbmt" name="loginsbm" value="Log In"/>
                                </div>
                                <div class="col-12 col-md-6">
                                    <span id="libtn">Not a cloud-watcher? <b>Sign Up</b></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="row about">
                <div class="col-12">
                    <p>
                       Just like any other cloud in the sky, you can make your cloud whatever you want it to be.
                       You are only limited by your imagination.
                    </p>
                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

        <script src="JS/animations.js" type="text/javascript"></script>
    </body>
</html>