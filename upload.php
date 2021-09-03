<?php include "connections.php"; ?>
<?php
if(isset($_POST['uploadfilesub'])){
    $filename = $_FILES['uploadfile']['name'];
    $filetmpname = $FILES['uploadfile']['tmp_name']; 
    $folder = 'imageupload/';
    move_uploaded_file($filetmpname , $folder.$filename);
    
$sql = "INSERT INTO `upload`(`image`) VALUES ('$filename')";
$qry = mysqli_query($connection , $sql);
if($qry){
    echo "done";
}
}
?>
<html>
<body>
    
    <form action ="" method="post" enctype="multipart/form-data">
        
        <input type="file" name="uploadfile"/>
        <input type="submit" name="uploadfilesub" />
    </form>
    </body></html>