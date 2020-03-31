<?php

$servername = "localhost";
$username = "root";
$password = "mysql";
$myDB = "todolist";

//header('Content-type: text/html; charset=iso-8859-1');

try {
    $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    } 
$id= $_GET['id'];
$sql = 'SELECT * FROM lists WHERE id='.$id.'';
$query = $conn->prepare($sql);
$query->execute();
$list = $query->fetch();

$sql1 = 'SELECT * FROM `status`';
$query1 = $conn->prepare($sql1);
$query1->execute();
$status = $query->fetchALL();
?>
<?php include 'header.php' ?>
<form action="changelist.php?id=<?php echo $id?>" method="POST">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">listname</span>
  </div>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="listname" value="<?php echo $list['listname']?>">
  <br>
  </select>
  <input type="submit" value="Submit">
</form>