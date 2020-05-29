<?php require 'require.php' ?>
<?php
$id= $_GET['id'];
$sql = 'SELECT * FROM lists WHERE id='.$id.'';
$query = $conn->prepare($sql);
$query->execute();
$list = $query->fetch();

$sql1 = 'SELECT * FROM `status`';
$query1 = $conn->prepare($sql1);
$query1->execute();
$status = $query1->fetchALL();
?>
<?php include 'header.php' ?>
<form action="changelist.php?id=<?php echo $id?>" method="POST">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">listname</span>
  </div>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="listname" value="<?php echo $list['listname']?>">
  <br>
  <select id="" name="liststatus" value="<?php echo $list['liststatus']?>" class ="custom-select custom-select-lg mb-3">
  <?php foreach ($status as $stat) { ?>
    <option value="<?php echo $stat['status']?>"><?php echo $stat['status']?></option>
  <?php } ?>
  <input type="submit" value="Submit">
</form>