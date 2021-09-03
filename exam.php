<?php include "session2.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style_exam.css">
</head>
<body>
  <h1>Submit to continue</h1>
  <div class="div">
  <form action="exam.php" method="POST" class="exam">
  <div class="form">
  <p>ENTER EXAM ID</p>
  <input type="text" name="id" placeholder ="ExamID">
  <p>ENTER EXAM PASSWORD</p>
  <input type="text" name="pass" placeholder ="password"><br><br>
  <input type="submit" name="submit" value="submit">
  <div>
  </form>
  </div>
      <div class="div3">
        <a href="profile_student.php" >GO BACK ?</a>
      </div>

</body>
</html>