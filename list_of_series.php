<?php include "session.php" ?>
<?php 
$student = 'student';
$pending = 'APPROVE';
 $series = $_SESSION['series'];

$query = "SELECT * FROM register WHERE cata = '{$student}' and  series = '{$series}' ORDER by dept ";
    
    $select = mysqli_query($connection, $query);
  
    if(!$select){
       die("query failed". mysqli_error($connection));
    }



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
<html>
<title>Pending Request !!!</title>
    <link rel="stylesheet" type="text/css" href="style_listing.css">
</head>
<body>
    <header>
    <div class="hii">
        <form action="list_of_series.php" method="POST">
            
<table border="10">
                 <thead>
                     <th><b> IMAGE </b></th>
                    <th><b>STUDENT_NAME  </b></th>
                    <th><b>STUDENT_ROLL </b></th>
                     <th><b>EMAIL </b></th>
                    <th><b>PHONR NUMBER </b></th>
                      <th><b>DEPARTMENT</b></th>
                     <th><b>SERIES</b></th>
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
            
         $queryy = "SELECT * FROM upload WHERE userid = '{$db_id}' ";
    
        $select_user_queryy = mysqli_query($connection, $queryy);
      
        if(!$select_user_queryy){
           die("query failed". mysqli_error($connection));
        }
        while($ro = mysqli_fetch_array($select_user_queryy)){
            $dbb_image = $ro['images'];
        } 
            
            ?>
                    <td><img src = "uploads/<?php echo $dbb_image; ?>" class="imggg"></td>
                    <td><?php echo $db_username ;?></td>
                    <td><?php echo $db_roll ; ?></td>
                    <td><?php echo $db_email ; ?></td>
                    <td><?php echo $db_phone  ; ?></td>
                    <td><?php echo $db_dept  ; ?></td>
                    <td><?php echo $db_series  ; ?></td>
                    
                </tr>
       
     <?php
        $i++;
     $dbb_image = null;
      }
     ?>
    </table>
   </form>
 </div>
    </header>
   <a href="profile_student.php" >GO back!</a>
</body>
</html>