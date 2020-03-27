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
  $lists = $query->fetchALL();

  $sql2 = 'SELECT * FROM tasks';
	$query2 = $conn->prepare($sql2);
	$query2->execute();
	$tasks = $query2->fetchALL();
  ?>
<?php include 'header.php' ?>
<a href="createlist.php" type="button" class="btn btn-primary btn-lg btn-block" >create a to do list </a>
<?php
foreach ($lists as $list)//id,date,listname,status
  {
?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h1 class="card-title"><?php echo $list['listname']?> status:<?php echo $list['status']?></h1>
    <p>Date:<?php echo $list['date']?></p>
  </div>
  <ul class="list-group list-group-flush">
  <?php foreach($tasks as $task){// id,listid,task,date
  if ($list['id'] == $task['listid']) 
  {
  
  ?>
    <li class="list-group-item"><?php echo $task['task'] ?><a href="edittask.php?id=<?php echo $task['id']?>" class="card-link">edit on task</a>
    <a href="deletetask.php?id=<?php echo $task['id']?>" class="card-link">delete on task</a></li>
    <?php } ?>
  <?php } ?>
  </ul>
  <div class="card-body">
  <a href="createtask.php?id=<?php echo $list['id'] ?>" class="card-link">add task</a>
    <a href="editlist.php?id=<?php echo $list['id']?>" class="card-link">edit list</a>
    <a href="deletelist.php?id=<?php echo $list['id']?>" class="card-link">delete list</a>
  </div>
</div>
  <?php }?>
</html>