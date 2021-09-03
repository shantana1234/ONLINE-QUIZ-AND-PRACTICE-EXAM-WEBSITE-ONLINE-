<?php include "session2.php"; ?>
<?php include "session.php" ;?>
<?php
if(isset(  $_SESSION['id'])){
    $id= $_SESSION['id'];
}
if(isset($_SESSION['name'])){
    
    $name = $_SESSION['name'];
    $pass  = $_SESSION['password'] ;
           
   $quer = "SELECT * FROM exam WHERE name = '{$name}' and password = '{$pass}'";
       
       $select_user_quer = mysqli_query($connection, $quer);
     
       if(!$select_user_quer){
          die("query failed". mysqli_error($connection));
       }
    $i = 0;
       while($row = mysqli_fetch_array($select_user_quer)){
        $i++;
        $db_id[$i] = $row['id'];
        $db_name[$i] = $row['name'];
        $db_userid[$i] = $row['userid'];
        $db_ques[$i] = $row['ques'];
        $db_ans[$i] = $row['answer']; 
        $db_o1[$i] = $row['o1'];
        $db_o2[$i] = $row['o2'];
        $db_o3[$i] = $row['o3'];
        $db_o4[$i] = $row['o4'];
       }
   }

   if(isset($_POST['sub'])){
    $marks = 0;
    while($i>0){
       $o1 = $_POST['radio'][$i] ;
       if($o1 == $db_ans[$i]){
           $marks++;
       }
       $i--;
    }
    $query ="INSERT INTO relation(user_id,exam_name,marks)" ;
       $query.= "VALUES('$id','$name','$marks')" ;
       $result =  mysqli_query( $connection, $query);
                              if(!$result){
                                  die("query failed");
                              }
                              header("Location: ..//project%202/profile_student.php");
}
   
?>
<!DOCTYPE html>
<head>
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style_getexam.css">
</head>
<body>

<div class="div">
    <p>QUESTION PAPER</p>
    <p>EXAM NAME : <?php echo  $name; ?></p> <br>
<form action= "getexam.php" method="POST" class= "simple">
<?php 
while($i>0){
?>
 <?php echo $db_userid[$i]; ?>. <?php echo $db_ques[$i]; ?><br>
<?php echo "<input type='radio' name='radio[$i]' value='$db_o1[$i]'>";
echo $db_o1[$i];?><br>
<?php echo "<input type='radio' name='radio[$i]' value='$db_o2[$i]'>";
echo $db_o2[$i]; ?> <br>
<?php echo "<input type='radio' name='radio[$i]' value='$db_o3[$i]'>";
echo $db_o3[$i]; ?> <br>
<?php echo "<input type='radio' name='radio[$i]' value='$db_o4[$i]'>";
echo $db_o4[$i]; ?> <br>
<br>
<?php
$i--;
}
?>
<?php echo "<input type='submit' name='sub' value='submit'>";?>
</form>
</div>

</body>
</html>