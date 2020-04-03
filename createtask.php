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
$sql1 = 'SELECT * FROM `status`';
$query1 = $conn->prepare($sql1);
$query1->execute();
$status = $query1->fetchALL();
?>
<?php include 'header.php' ?>
<form action="addtask.php?id=<?php echo $id?>" method="POST">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">task</span>
  </div>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="task" value="">
  <br>
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">description</span>
  </div>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="taskdescription" value="">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">tasktime</span>
    <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="tasktime" value="" min="1" max="60">
  </div>
  <br><span class="input-group-text" id="inputGroup-sizing-default">status</span>
  ​ <select id="" name="taskstatus" value="">
  <?php foreach ($status as $stat) { ?>
    <option value="<?php echo $stat['status']?>"><?php echo $stat['status']?></option>
  <?php } ?>
  <input type="submit" value="Submit">
</form>