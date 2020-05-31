<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf_8">
        <meta name="description" content="This is an example of meta description.This will often show in search result.">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <title></title>
    </head>
    <body>

        <header>
            <nav>
                <a href='#'>
                    <img src="img/logo.png" alt="logo"> 
                </a>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">PageX</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <div>
                    <?php
                        if (isset($_SESSION['userID'])) {
                            echo'<form action="includes/logout.inc.php" method="post">
                            <button type="submit" name="logout-submit">Logout</button>
                            </from>';
                        }
                        else{
                            echo'<form action="includes/login.inc.php" method="post">
                            <input type="text" name="correousername" placeholder="Correo o Username...">
                            <input type="text" name="pwd" placeholder="Password...">
                            <button type="submit" name="login-submit">Login</button>
                            </from>
                            <a href="signup.php">Signup</a>';
                        }
                    ?>
                    
                    
                </div>
            </nav>        

        </header>