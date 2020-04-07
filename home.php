<?php

$servername = "localhost";
$username = "root";
$password = "mysql";
$myDB = "todolist";



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
  
  $sort = (isset($_GET['sort']))?$_GET['sort']:'none'; // home.php?sort=taskstatus
  $sql2 = 'SELECT * FROM tasks';
  if ($sort != 'none')
  {
    $sql2 = $sql2 . ' ORDER BY ' .$sort.' DESC ';
  }
	$query2 = $conn->prepare($sql2);
	$query2->execute();
	$tasks = $query2->fetchALL();
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable p").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<?php include 'header.php' ?>
<input id="myInput" type="text" placeholder="Search..">
<a href="createlist.php" type="button" class="btn btn-primary btn-lg btn-block" >create a to do list </a>

      <a href="home.php?sort=taskstatus">sort on task status</a><br>
      <a href="home.php?sort=tasktime">sort on time task</a><br>
      
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
    <a href="listswithsametasks.php?id=<?php echo $task['id']?>?task=<?php echo $task['task'] ?>" class="card-link">same list</a></li>
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