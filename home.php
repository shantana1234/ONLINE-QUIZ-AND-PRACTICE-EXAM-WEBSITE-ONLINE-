<?php include "session3.php"; ?>
<html>
    <head>
    <title>
        website design</title>
        <link href ="testing.css" rel = "stylesheet" type = "text/css">
    </head>
    <body>
        <header>
            <div class="nav">
            <ul class="menu">
            <li><a href="about_us.php">About Us</a></li>
                <li><form action="home.php" method="post">
             <input type="text" name="seach" placeholder="search member's name">
            <input type="submit" name="submit" placeholder="submit">
            </form>
            </li>
                
            </ul>
            </div>
                 <video class="video-background" autoplay loop muted plays-inline >
                         <source src="video1.mp4" type = "video/mp4" > 
                 </video>

            <div class ="center">
                <ul class="here">
                    <li><a href="login.php">SIGN IN</a></li>
                    <li><a href="reg.php">SIGN UP</a></li>
                </ul>
            </div>
            
            <div class="nav2">
                 <h1>YOUR IDEAS</h1>
            </div>
    
            <div class="nav3">
            <ul class="menu2">
                <li>Copyright @ Rajshahi University Of Engineering And Technology</li>
            </ul>
        </div>
        </header>
    </body>

</html>       