<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $pdo = new PDO("mysql:host=localhost;dbname=client","root","",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)); ?>
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav >
            <ul class="header_page">
                <div>
                    <ul class="header_page_left">
                        <li><a href="index.php" class="space_header">Home</a></li>
                        <li><a href="profile.php" class="space_header">Profile</a></li>
                        <li><a href="#" class="space_header">about me</a></li>
                        <li><a href="#" class="space_header">contact</a></li>
                    </ul>
                </div>
                <div class="space">

                </div>
                <ul class="header_page_right">
                    <form action="includes/login.inc.php" method='post'>
                        <input type="text" class="space_header" name="mailuid" placeholder="Username/Email...">
                        <input type="text" class="space_header" name="pwd" placeholder="Password">  
                        <button type="submit" name="Login_submit" class="space_header">login</button>
                    </form>
                    <a href="sign_up.php" class="space_header">Signup</a>
                    <form action="includes/logout.inc.php" method='post' class="space_header">
                        <button type="submit" name="Logout_submit">logout</button>
                    </form>
                </ul>
                </div>
            </ul> 
        </nav>
    </header>