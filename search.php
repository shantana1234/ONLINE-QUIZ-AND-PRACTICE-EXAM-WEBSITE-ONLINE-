<?php include "session3.php"; ?>
<?php 
if(isset($_SESSION['username'])){
   $name =  $_SESSION['name'];     
  $username = $_SESSION['username'];
 $roll = $_SESSION['roll'];
  $email= $_SESSION['email'];
  $phone= $_SESSION['phone'] ;
   $dept = $_SESSION['dept'];
   $id = $_SESSION['id'];
   $db_cata=$_SESSION['cata'];
 $db_series= $_SESSION['series'];
        
    }
    ?>

<html>
    <head>
    <title>

</title>
            <link rel="stylesheet" type="text/css" href="style_search.css">
    </head>

<body>
    <div class="div">
   
    <a href="home.php" >Go Home</a><br><br>
     <p>Result for searching - <?php echo $name ; ?></p><br><br>
     <p1>OCCUPATION :  </p1>&nbsp <p2><?php echo $db_cata; ?></p2><br><br>
    <p1>NAME : </p1>&nbsp <p2>  <?php echo $username; ?></p2><br><br>
    <p1>ROLL : </p1> &nbsp <p2> <?php echo $roll; ?></p2><br><br>
    <p1>DEPARTMENT : </p1>&nbsp <p2><?php echo $dept; ?></p2><br><br>
    <p1>EMAIL : &nbsp </p1> <p2><?php echo $email; ?></p2><br><br>
     <p1>PHONE : &nbsp </p1> <p2><?php echo $phone; ?></p2><br><br>
     <p1>SERIES : &nbsp </p1> <p2><?php echo $db_series; ?></p2><br><br><br><br>
        </div>
    
    </body>
</html>
