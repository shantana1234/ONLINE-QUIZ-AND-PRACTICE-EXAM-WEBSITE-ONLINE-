<?php include "session.php" ?>
<?php 
    
if(isset($_SESSION['username'])){
    
 $username = $_SESSION['username'];
 $roll  = $_SESSION['roll'] ;
  $email= $_SESSION['email'];
  $phone= $_SESSION['phone'] ;
   $dept = $_SESSION['dept'];
   $id = $_SESSION['id'];

        
$quer = "SELECT * FROM register WHERE username = '{$username}' ";
    
    $select_user_quer = mysqli_query($connection, $quer);
  
    if(!$select_user_quer){
       die("query failed". mysqli_error($connection));
    }
}
if(isset($_POST['submit'])){
    
    $name = $_POST['name'];
    $roll =$_POST['roll'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];  
    $dept = $_POST['dept'];
    $series = $_POST['series'];
     if($name != null){
     $query = "update register set username = '{$name}' where id='$id'";
     $result =  mysqli_query( $connection, $query);
     }
    if($roll != null)
        { $query = "update register set roll = '{$roll}' where id='$id'";
    $result =  mysqli_query( $connection, $query);
                           if(!$result){
                               die("query failed");
                           }}
     if($email != null){
     $query = "update register set email= '{$email}' where id='$id'";
          $result =  mysqli_query( $connection, $query);
     }
     if($phone != null){
     $query = "update register set phone = '{$phone}' where id='$id'";
          $result =  mysqli_query( $connection, $query);
     }
     if($dept != null){
     $query = "update register set dept = '{$dept}' where id='$id'";
          $result =  mysqli_query( $connection, $query);
     }
     if($series != null){
     $query = "update register set series = '{$series}' where id='$id'";
          $result =  mysqli_query( $connection, $query);
     }
    
    
}

?>
<html>
<title></title>
    <link rel="stylesheet" type="text/css" href="style_update_bio.css">
</head>
<body>
    <div class="div">
    <h1>EDIT Your personal information  </h1>
    <h1>where you want to change </h1><br><br>
    <form action="update_bio.php" method="post">
     <p>**Change UserName ?</p> <input type="text" name="name">
     <p>**Change Roll ?</p> <input type="int" name="roll">
     <p>**Change Email ID ?</p><input type="text" name="email">
     <p>**Change Phone Number ?</p><input type="int" name="phone">
     <p>**Change Department ?</p><input type="text" name="dept">
     <p>**Change Series ?</p><input type="text" name="series">  
     <br><br>
     <p>****Submit to UPLOAD changes****</p><br>
     <input type="submit" name="submit" value="submit" ><br>
     <a href="profile_student.php" >Go Back!</a>
    </form>
        </div>
</body>
</html>