<?php include 'header.php' ?>
<?php include 'footer.php' ?>

<html>
<a href="createlist.php" type="button" class="btn btn-primary btn-lg btn-block" >create a to do list </a>
<?php
//foreach ()
  //{
?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">list title</h5>
    <p class="card-text"></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">name tasks</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">edit</a>
    <a href="#" class="card-link">delete all</a>
    <a href="#" class="card-link">edit on tasks</a>
  </div>
</div>
  <?php //}?>
</html>