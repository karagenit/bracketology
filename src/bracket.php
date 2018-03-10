<!DOCTYPE html>
<html lang="en">
  <?php echo file_get_contents("./includes/head.html") ?>
  <body>
    <?php echo file_get_contents("./includes/header.html") ?>

    <form action="submit.php" method="post">
      <div class="form-row">
        <h5>Name</h5>
      </div>
      <div class="form-row">
        <div class="form-group col">
          <input type="text" name="firstname" class="form-control" placeholder="First">
        </div>
        <div class="form-group col">
          <input type="text" name="lastname" class="form-control" placeholder="Last">
        </div>
      </div>
      <div class="form-row">
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </form>
  </body>
</html>
