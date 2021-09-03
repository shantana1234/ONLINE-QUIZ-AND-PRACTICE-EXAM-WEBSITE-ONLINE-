<?php include 'session.php' ?>
<?php

if(isset($_SESSION['username'])){
    
    $id = $_SESSION['id'];
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
                    $filenamenew = uniqid('',true).".".$fileactualext;
                    $filedestination = 'uploads/'.$filenamenew;
                    move_uploaded_file($filetmpname,$filedestination);

                    $query ="INSERT INTO upload(userid,images)" ;
                    $query.= "VALUES('$id','$filenamenew')" ;
                    $result =  mysqli_query( $connection, $query);
                                           if(!$result){
                                               die("query failed");
                                           }                   


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
<link href ="style_update.css" rel = "stylesheet" type = "text/css">
<form action="upload2.php" method="post" enctype="multipart/form-data">
    Select image to upload:<br>
    <label for = "file" >PROFILE IMAGE</label>
    <input type="file" name="file" >
    <button type="submit"  name="submit">upload</button>
</form>

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
    <img src = "uploads/<?php echo $dbb_image; ?>" class ="img">

</body>
</html>
