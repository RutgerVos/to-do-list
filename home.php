<?php require 'require.php' ?>
<?php
 	
	$sql = 'SELECT * FROM lists';
	$query = $conn->prepare($sql);
	$query->execute();
  $lists = $query->fetchALL();
  /*
* a way to sort
*/
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
 <?php
  /*
* a way to search for a task
*/
?>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<?php include 'header.php' ?>
<input id="myInput" type="text" placeholder="Search..">
<a href="createlist.php" type="button" class="btn btn-primary btn-lg btn-block" >create a to do list </a>

      <a href="home.php?sort=taskstatus">sort on task status</a>
      <a style="display:block" href="home.php?sort=tasktime">sort on time task</a> 
      
 
<?php
foreach ($lists as $list)//id,date,listname,status
  {
?>
<table class="table table-bordered table-dark">
<td><?php echo $list['listname']?></td>
      <td><?php echo $list['liststatus']?></td>
      <td><?php echo $list['date']?></td>
</table>
<table class="table table-bordered table-dark">
  <tbody id="myTable">

      <?php foreach($tasks as $task){// id,listid,task,date
        if ($list['id'] == $task['listid']) 
      {
  
      ?>
      <tr>
      <td><?php echo $task['task'] ?></td>
      <td><?php echo $task['taskstatus']?></td>
      <td><?php echo $task['tasktime']?>:min</td>
      <td><?php echo $task['taskdescription']?></td>
      <td><a href="edittask.php?id=<?php echo $task['id']?>" class="">edit task</a></td>
      <td><a href="deletetask.php?id=<?php echo $task['id']?>" class="">delete task</a></td>
      </tr>
      <?php } ?>
  <?php } ?>
  <td><a href="createtask.php?id=<?php echo $list['id'] ?>" class="card-link">add task</a></td>
  <td><a href="editlist.php?id=<?php echo $list['id']?>" class="card-link">edit list</a></td>
  <td><a href="deletelist.php?id=<?php echo $list['id']?>" class="card-link">delete list</a></td>
  </tbody>
</table>
  <?php }?>
