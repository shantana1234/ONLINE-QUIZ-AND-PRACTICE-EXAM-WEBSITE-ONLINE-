<?php include "connections.php"; ?>
<?php
if(isset($_POST['c'])){
    $count = $_POST['count'];
    $i = $_POST['count'];  
}

if(isset($_POST['submit'])){
    $i = 0;
    echo $i;
    $ques = $_POST['cou'];
    echo $ques;
    while($ques>0){
        echo $ques;
        $query ="INSERT INTO exam(userid,o1)" ;
        $query.= "VALUES('".$_POST['id'][$ques]."','".$_POST['o1'][$ques]."')" ;
        $result =  mysqli_query( $connection, $query);
                               if(!$result){
                                   die("query failed");
                               }
                               $ques = $ques-1;
    }

    }

?>

<html>

<head>
<title></title>
<link rel="stylesheet" type="text/css" href="style_ques_paper.css">
    </head>
<body> 
    <div class="div">
    <form action="test.php" method="POST" class="simple">
    <h1>MAKE A QUESTION PAPER</h1>
    <h4>HOW MANY QUESTION???</h4>
    <input type="int" name="count" placeholder="enter the number">
    <button type="submit" name="c">submit</button>
    </form>
     </div>
    </div>
    <header>
    <?php
    $j = $count;
    echo $j;
    ?>
    <form action="test.php" method="POST" class="simpleform">
    <input type="int" name="cou" placeholder="enter">
    <p>NAME :</p>
         <?php echo "<input type='text' name='name[$count]' placeholder='Enter quesname'><br>" ?>
         <p>PASSWORD :</p>
         <?php echo "<input type='text' name='pass[$count]' placeholder='Enter password'><br>" ?>
    <?php
    while($count > 0){
        ?>
        <br>
    <div class ="ques">
        <br>
        <div class="form">
         <p>QUESTION NO. :</p>
        <?php echo " <input type='int' name='id[$count]' placeholder='Enter question number'><br>" ?>
        <p>OPTION 1 :</p>
          <?php echo "<input type='text' name='o1[$count]' placeholder='Enter option1'><br>" ?>
         <?php
         $count=$count-1;
        }
         echo "<br><input type='submit' name='submit' value='submit' ><br>";
         echo $count;
         echo "<a href='profile_admin.php'>GO TO profile</a>";
         ?>
        </div>
        </div>
        </form> 
        </header>
    </body>
</html>
