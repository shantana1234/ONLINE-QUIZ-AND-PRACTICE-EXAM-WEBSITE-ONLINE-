<?php include "connections.php"; ?>
<?php session_start() ?>
<?php
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = "APPROVE";
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);   
    
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
        
    }
    
    if($username !== $db_username && $password !== $db_password ){
        echo "INVALID USERNAME AND PASSWORD";
    }
     else if ($username == $db_username && $password == $db_password && $status != $db_status){
         echo "YOUR ACCOUNT HAS NOT BEEN APPROVED";
     }
    
    else if ($username == $db_username && $password == $db_password && $status == $db_status){
        $_SESSION['cata'] = $db_cata;
        $_SESSION['id'] = $db_id;
        $_SESSION['radio'] = $db_radio;
        $_SESSION['username'] = $db_username;
        $_SESSION['roll'] = $db_roll;
        $_SESSION['email'] = $db_email;
        $_SESSION['phone'] = $db_phone;
        $_SESSION['checkk'] = $db_status;
         $_SESSION['dept'] = $db_dept;
         $_SESSION['series'] = $db_series;
        
        
        if($db_cata == 'teacher'){
            header("Location: ..//project%202/profile_admin.php");
        }
        else if($db_cata == 'admin'){
                header("Location: ..//project%202/main_admin.php");
            }
        else {
        header("Location: ..//project%202/profile_student.php");
        }
    }
    else {
        echo "INVALID PASSWORD";
    }
}

?>

