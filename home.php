<?php include 'header.php' ?>
<?php include 'footer.php'?>
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
	$sql = 'SELECT * FROM lists';
	$query = $conn->prepare($sql);
	$query->execute();
  $row = $query->fetchALL();

  $sql2 = 'SELECT * FROM tasks';
	$query2 = $conn->prepare($sql2);
	$query2->execute();
	$row2 = $query2->fetchALL();
  ?>

<html>
<a href="createlist.php" type="button" class="btn btn-primary btn-lg btn-block" >create a to do list </a>
<?php
foreach ($row as $list)
  {
?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $list['listname']?> status:<?php echo $row['status']?></h5>
    <p><?php echo $list['date']?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo $row2['task'] ?><a href="deletetask.php?id=<?php echo $row2['id']?>" class="card-link">edit on task</a><a href="#" class="card-link">delete on task</a></li>
  </ul>
  <div class="card-body">
  <a href="createtask.php?id=<?php echo $list['id'] ?>" class="card-link">add task</a>
    <a href="editlist.php?id=<?php echo $list['id']?>" class="card-link">edit list</a>
    <a href="deletelist.php?id=<?php echo $list['id']?>" class="card-link">delete list</a>
  </div>
</div>
  <?php }?>
</html>