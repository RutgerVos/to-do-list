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
$sql = 'SELECT * FROM tasks WHERE id='.$id.'';
$query = $conn->prepare($sql);
$query->execute();
$task = $query->fetch();

$sql1 = 'SELECT * FROM `status`';
$query1 = $conn->prepare($sql1);
$query1->execute();
$status = $query1->fetchALL();
?>
<?php include 'header.php' ?>
<form action="changetask.php?id=<?php echo $id?>" method="POST">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">task</span>
  </div>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="task" value="<?php echo $task['task']?>">
  <br>
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">description</span>
  </div>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="taskdescription" value="<?php echo $task['taskdescription']?>">
  <br>
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">tasktime</span>
    <input type="time" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="tasktime" value="<?php echo $task['tasktime']?>">
  </div>
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">status</span>
  </div>
  <select id="" name="taskstatus" value="<?php echo $task['taskstatus']?>" class ="custom-select custom-select-lg mb-3">
  <?php foreach ($status as $stat) { ?>
    <option value="<?php echo $stat['status']?>"><?php echo $stat['status']?></option>
  <?php } ?>
  <input type="submit" value="Submit">
</form>