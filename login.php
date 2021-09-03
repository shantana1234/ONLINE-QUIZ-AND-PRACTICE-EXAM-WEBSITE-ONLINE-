<?php include "session.php"; ?>
<html>
<head>
<title></title>

  <link rel="stylesheet" type="text/css" href="style_login.css">
    </head>
<body>
    <header>
    <div class ="loginbox">
    <img src="avatar.jpg" class="avatar">
         <h1>Login Here</h1>
         <form action="login.php" method="POST">
         <p>Name : </p>
         <input type="text" name="username" placeholder="Enter Username" required>
         <p>Password: </p>  
         <input type ="password" name="password"  placeholder="Enter password" required>
         <input type="submit" name="login" value="login">
         <a href="forget.php">**Lost your passward?</a><br>
         <a href="reg.php">**Don't Have any accont?</a><br>
        <a href="home.php">**Go to home</a>
    
        </form>
        </div>
    </header>
</body>
</html>