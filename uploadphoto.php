<?php include 'session.php' ?>
<?php

if(isset($_SESSION['username'])){
    $cata = $_SESSION['cata'];
    $id = $_SESSION['id'];
}
$queryy = "SELECT * FROM upload WHERE userid = '{$id}' ";
    
                                           $select_user_queryy = mysqli_query($connection, $queryy);
                                         
                                           if(!$select_user_queryy){
                                              die("query failed". mysqli_error($connection));
                                           }
                                           while($row = mysqli_fetch_array($select_user_queryy)){
                                               $dbb_id = $row['userid'];
                                               $dbb_image = $row['images'];
                                               $dbb_status = $row['status'];
                                           }


if(isset($_POST['submit'])){
    $file = $_FILES['file'];
    $filename = $_FILES['file']['name'];
    $filetmpname = $_FILES['file']['tmp_name'];
    $filesize = $_FILES['file']['size'];
    $fileerror = $_FILES['file']['error'];
    $filetype = $_FILES['file']['type'];

    $fileext = explode('.',$filename);
    $fileactualext = strtolower(end($fileext));
    
    $allowed = array('jpg','jpeg','png','pdf');

    if(in_array($fileactualext ,$allowed)){
         if($fileerror === 0){
                if($filesize < 100000000){
                    if($dbb_status==0){
                    $filenamenew = uniqid('',true).".".$fileactualext;
                    $filedestination = 'uploads/'.$filenamenew;
                    move_uploaded_file($filetmpname,$filedestination);

                    $query ="INSERT INTO upload(userid,images,status)" ;
                    $query.= "VALUES('$id','$filenamenew','1')" ;
                    $result =  mysqli_query( $connection, $query);
                                           if(!$result){
                                               die("query failed");
                                           }  
                    echo "Photo Uploaded!";


                }
                else {echo "already exits!!";}
            }
                else { 
                    echo "your file is too big! ";
                }
         }
         else {
             echo "There was an error uploading your file .";
         }
    }
    else{
        echo "you cannot upload files of this type";
    }
 
}

?>


<!DOCTYPE html>
<html>
<body>
<link href ="style_uploadphoto.css" rel = "stylesheet" type = "text/css">
<header>
<div class="upload">
<form action="uploadphoto.php" method="post" enctype="multipart/form-data">
    <p><b>Select image to upload:</b></p><br>
    <input type="file" name="file" ><br>
    <button type="submit"  name="submit">UPLOAD</button><br><br>
    <?php 
    $stu = "student";
    if($cata==$stu){
       echo "<a href='profile_student.php'>GO BACK</a>";
    }
    else{
        echo "<a href='profile_admin.php'>GO BACK</a>";
    }
    ?>
</form>
</div>
</header>
</body>
</html>
