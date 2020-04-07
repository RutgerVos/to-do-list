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
    $id = $_GET['id'];
    $task = $_GET['task'];
$sql = 'SELECT * FROM tasks WHERE task="$task"';
$query = $conn->prepare($sql);
$query->execute();
$tasks= $query->fetchALL();

$sql1 = 'SELECT * FROM lists';
$query1 = $conn->prepare($sql1);
$query1->execute();
$lists= $query1->fetchALL();
?>

<?php include 'header.php' ?>      
<?php
foreach ($lists as $list)//id,date,listname,status
  {
?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h1 class="card-title"><?php echo $list['listname']?> status:<?php echo $list['liststatus']?></h1>
    <p>Date created:<?php echo $list['date']?></p>
  </div>
  <ul class="list-group list-group-flush" id="myTable">
  <?php foreach($tasks as $task){// id,listid,task,date
  if ($list['id'] == $task['listid']) 
  {
  
  ?>
  <p>status:<?php echo $task['taskstatus']?></p>
  <p>time needed for task:<?php echo $task['tasktime']?>:min</p>
  <p>description:<?php echo $task['taskdescription']?></p>
    <li class="list-group-item"><?php echo $task['task'] ?><a href="edittask.php?id=<?php echo $task['id']?>" class="card-link">edit on task</a>
    <a href="deletetask.php?id=<?php echo $task['id']?>" class="card-link">delete on task</a>
    <a href="listswithsametasks.php?id=<?php echo $task['id']?>" class="card-link">same list</a></li>
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

