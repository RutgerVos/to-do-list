<?php include 'header.php' ?>
<?php include 'footer.php' ?>
<?php //$var dating = date("Y/m/d h:i:s"); ?date=<?php echo $dating?>
<form action="addlist.php" method="POST">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">name to do list</span>
  </div>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="listname" value="">
  <br>
  <input type="submit" value="Submit">
</form>