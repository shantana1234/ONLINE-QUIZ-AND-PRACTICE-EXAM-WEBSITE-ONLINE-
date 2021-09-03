<?php include "session.php" ;?>
<?php session_start() ?>
<?php
  $j = 0;
$i = 0;
if(isset(  $_SESSION['id'])){
    $id= $_SESSION['id'];
}
if(isset($_POST['submit'])){
       $cat = $_POST['dc'];
       $quer = "SELECT * FROM exam2 WHERE cata = '{$cat}' ";
       
       $select_user_quer = mysqli_query($connection, $quer);
     
       if(!$select_user_quer){
          die("query failed". mysqli_error($connection));
       }
    
    
       while($row = mysqli_fetch_array($select_user_quer)){
        $i++;
        $j++;
        $db_cata[$i] = $row['cata'];
        $db_userid[$i] = $row['id'];
        $db_ques[$i] = $row['ques'];
        $db_ans[$i] = $row['ans']; 
        $db_o1[$i] = $row['o1'];
        $db_o2[$i] = $row['o2'];
        $db_o3[$i] = $row['o3'];
        $db_o4[$i] = $row['o4'];
        $_SESSION['ans'][$i] =  $db_ans[$i];
        $_SESSION['cata'] = $db_cata[$i];
        $_SESSION['i'] = $i;
          
       }
    
    
    }

   if(isset($_POST['sub'])){
       
    $cat = $_SESSION['cata'] ;
     $i = $_SESSION['i'];  
    $marks = 0;
    while($i>0){
       $db_ans[$i]= $_SESSION['ans'][$i] ;
       $o1 = $_POST['radio'][$i] ;
       if($o1 == $db_ans[$i]){
           $marks++;
       }
       $i--;
    }
    $query ="INSERT INTO relation(user_id,exam_name,marks)" ;
       $query.= "VALUES('$id','$cat','$marks')" ;
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
</head>
<body>
<div>
<p>Choose Catagory : </p>&nbsp<form action = "exam2.php" method ="POST" >
        <select name="dc">
    <option>Language</option>
          <?php include "connections.php";
                    $query = "SELECT distinct cata FROM exam2";
                    $select_user_query = mysqli_query($connection, $query);
  
                    if(!$select_user_query){
                         die("query failed". mysqli_error($connection));
                                     }
    
                    while($row = mysqli_fetch_array($select_user_query)){
                         $cata = $row['cata']; 
            ?>

     <option value = "<?php echo $cata ; ?>"> <?php echo "$cata" ?></option>
        <?php
                    }
        ?>
        
    </select>
    <br>
    <form action= "exam2.php" method="POST" class= "sim">
        <?php echo "<input type='submit' name='submit' value='submit to choose'>";?></form>
   <form action= "exam2.php" method="POST" class= "simple">
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
$i = $j;
?>
<?php echo "<input type='submit' name='sub' value='submit'>";?>
</form>
    <a href="profile_student.php">GO Back</a>
</div>

</body>
</html>