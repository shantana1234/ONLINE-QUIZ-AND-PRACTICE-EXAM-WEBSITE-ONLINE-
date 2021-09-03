<?php include "connections.php"; ?>
<?php session_start() ?>
<?php
if(isset($_POST['submit'])){
    $username = $_POST['seach'];
    $username = mysqli_real_escape_string($connection, $username);
    
    $query = "SELECT * FROM register WHERE username = '{$username}' ";
    
    $select_user_query = mysqli_query($connection, $query);
  
    if(!$select_user_query){
       die("query failed". mysqli_error($connection));
    }
    
    while($row = mysqli_fetch_array($select_user_query)){
        $db_id = $row['id'];
        $db_cata = $row['cata'];
        $db_username = $row['username'];
        $db_roll =$row['roll'];
        $db_password = $row['passwords'];
        $db_email = $row['email'];
        $db_phone = $row['phone']; 
        $db_status = $row['checkk'];
        $db_dept = $row['dept'];
        $db_series = $row['series'];
        
    
       if($db_status =='APPROVE'){
        $_SESSION['cata'] = $db_cata;
        $_SESSION['id'] = $db_id;
        $_SESSION['radio'] = $db_radio;
        $_SESSION['username'] = $db_username;
        $_SESSION['roll']= $db_roll;
        $_SESSION['email']= $db_email;
        $_SESSION['phone'] = $db_phone;
        $_SESSION['dept']= $db_dept;
        $_SESSION['series']= $db_series;
        
        
       }
    }
     $_SESSION['name'] = $username;
     header("Location: ..//project%202/search.php");
}
?>