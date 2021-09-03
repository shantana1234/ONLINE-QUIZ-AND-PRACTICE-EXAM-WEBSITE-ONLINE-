<?php include "session.php" ?>
<?php 
$student = 'student';
$pending = 'Pending';

$query = "SELECT * FROM register WHERE cata = '{$student}' and  checkk = '{$pending}'";
    
    $select = mysqli_query($connection, $query);
  
    if(!$select){
       die("query failed". mysqli_error($connection));
    }
?>
<html>
<title>Pending Request !!!</title>
    <link rel="stylesheet" type="text/css" href="style_appr.css">
</head>
<body>
    <header>
    <div class="hii">
        <form action="appr.php" method="POST">
            
<table border="10">
                 <thead>
                    <th><b>STUDENT_NAME  </b></th>
                    <th><b>STUDENT_ROLL </b></th>
                     <th><b>EMAIL </b></th>
                    <th><b>PHONR NUMBER </b></th>
                      <th><b>DEPARTMENT</b></th>
                    <th><b>SERIES</b></th>
                    <th>CHECK</th>
                    <th>STATUS</th>
                </thead>
                <tr>
            
    <?php
        $i = 1;
        while($row = mysqli_fetch_array($select)){
        $db_id = $row['id'];
        $db_cata = $row['cata'];
        $db_username = $row['username'];
        $db_roll =$row['roll'];
        $db_password = $row['passwords'];
        $db_email = $row['email'];
        $db_phone = $row['phone']; 
        $db_status = $row['checkk'];
        $db_dept = $row['dept'];
        $db_series= $row['series'];  
            
            ?>
                    <td><?php echo $db_username ;?></td>
                    <td><?php echo $db_roll ; ?></td>
                    <td><?php echo $db_email ; ?></td>
                    <td><?php echo $db_phone  ; ?></td>
                    <td><?php echo $db_dept  ; ?></td>
                    <td><?php echo $db_series  ; ?></td>
                    
                   <?php echo "<td><input type='checkbox' name = 'check[$i]' value = '$db_id' ></td>"; ?>
                    <td><?php echo $db_status ; ?></td>
                    
                </tr>
       
     <?php
        $i++;
      }
     ?>
    </table>
        <p><input type ="submit" name="submit" value="submit"></p>
        
        <?php
           
       if(isset($_POST['submit'])){
        if(isset($_POST['check']))
            {
                    foreach ($_POST['check'] as $value){
                     $sql = "update register set checkk='APPROVE' where id = '$value'" ; 
                        $selec = mysqli_query($connection, $sql);
                         if(!$selec){
       die("query failed". mysqli_error($connection));
    }
                        
    if($sql == "APPROVE"){
       echo "yes";  
       }
       }
                    }
           
         header("Location: ..//project%202/appr.php");
        }
    ?>   
   </form>
 </div>
    </header>
      <a href="profile_admin.php" >GO back!</a>
    
</body>
</html>