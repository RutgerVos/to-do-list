<?php include 'header.php' ?>
<?php include 'footer.php' ?>

<?php $id= $_GET['id']; ?>
<form action="addtask.php?id=<?php echo $id?>" method="POST">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">name to do list</span>
  </div>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="" value="">
  <br>
  <input type="submit" value="Submit">
</form>