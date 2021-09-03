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
if(isset($_POST['logout'])){
       header("Location: ..//project 2/logout.php");
}

?>
<html>
<title>profile_admin_teachers!</title>
    <link rel="stylesheet" type="text/css" href="style_profile_admin.css">
</head>
<body>
    <div class="div2">
     <div class="l">
         <img src="ruet.png" class="img">
        <h1>Welcome <?php echo "$username"; ?> !</h1>
       <li><a href="uploadphoto.php">Upload a photo </a></li><br>
      <li><a href="update_bio.php" >Edit yout bio </a></li><br>
       <li><a href="forget.php">Change Passward </a></li><br>
     </div>
        </div>
    <header>
        <div class="class">
        <div class="imgg">
        <?php
        $queryy = "SELECT * FROM upload WHERE userid = '{$id}' ";
    
        $select_user_queryy = mysqli_query($connection, $queryy);
      
        if(!$select_user_queryy){
           die("query failed". mysqli_error($connection));
        }
        while($row = mysqli_fetch_array($select_user_queryy)){
            $dbb_id = $row['userid'];
            $dbb_image = $row['images'];
        }
        ?>
        <img src = "uploads/<?php echo $dbb_image; ?>" class="imggg">
        </div>
        <div class="name">
        <h1><?php echo "$username"; ?></h1> 
        <p><b>ID : </b><?php echo " $roll"; ?></p>
        <p><b>Email :</b><?php echo "$email"; ?></p>
        <p><b>Phone :</b> <?php echo " $phone"; ?></p>
        <p><b>Depatment : </b><?php echo " $dept"; ?></p>
         <p class="p">RAJSHAHI UNIVERSITY OF ENGINEERING AND TECHNOLOGY</p>
        </div>
            </div>
        
</header>
    <form action="main_admin.php" method="post">
       <div class="div">
        <div class="t">
      <li><a href="appr_teacher.php">Pending Request </a></li><br>
      </div>
      <input type="submit" name="logout" value = "LOGOUT">
     </div>
    </form>
    
</body>
</html>