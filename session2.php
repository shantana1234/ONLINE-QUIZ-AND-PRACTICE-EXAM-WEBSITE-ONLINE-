<?php include "connections.php"; ?>
<?php session_start() ?>
<?php
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $pass= $_POST['pass'];
    $username = mysqli_real_escape_string($connection, $id);
    $password = mysqli_real_escape_string($connection, $pass);   
    
    $query = "SELECT * FROM exam WHERE name = '{$id}' ";
    
    $select_user_query = mysqli_query($connection, $query);
  
    if(!$select_user_query){
       die("query failed". mysqli_error($connection));
    }
    
    while($row = mysqli_fetch_array($select_user_query)){
        $db_id = $row['id'];
        $db_userid = $row['userid'];
        $db_name = $row['name'];
        $db_password = $row['password'];
        $db_ques = $row['ques'];
        $db_ans = $row['answer']; 
        $db_o1= $row['o1'];
        $db_o2= $row['o2'];
        $db_o3= $row['o3'];
        $db_o4= $row['o4'];
        
    }
    
    if($id !== $db_name && $pass !== $db_password ){
        echo "Wrong ExamID and Password ! ";
    }
    
    else if ($id == $db_name && $pass == $db_password){
         $_SESSION['name'] = $db_name;
         $_SESSION['password'] = $db_password;
        
         header("Location: ..//project%202/getexam.php");
        }
         
        else {
            echo "Wrong Password ! ";
        }
}

?>

