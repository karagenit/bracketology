<!DOCTYPE html>
<html lang="en">
  <?php echo file_get_contents("./includes/head.html") ?>
  <body>
    <?php echo file_get_contents("./includes/header.html") ?>

    <form action="submit.php" method="post">
      <div class="form-row">
        <div class="form-group col">
          <label>Name</label>
          <input type="text" name="firstname" class="form-control" placeholder="First">
        </div>
        <div class="form-group col">
          <label>Name</label>
          <input type="text" name="lastname" class="form-control" placeholder="Last">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col">
          <label>Age (years)</label>
          <input type="number" name="age" class="form-control" step="1">
        </div>
        <div class="form-group col">
          <label>Gender</label>
          <select name="gender" class="custom-select">
            <option value="" selected>Choose...</option>
            <option value="M">Male</option>
            <option value="F">Female</option>
            <option value="O">Other</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col">
          <label>High School Affiliation</label>
          <input type="text" name="school" class="form-control" placeholder="School Name">
        </div>
        <div class="form-group col">
          <label>College Basketball Knowledge</label>
          <select name="knowledge" class="custom-select">
            <option value="" selected>Choose...</option>
            <option value="0">None</option>
            <option value="1">Little</option>
            <option value="2">Moderate</option>
            <option value="3">A Lot</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col">
          <label>Email</label>
          <input type="email" name="email" class="form-control" placeholder="you@example.com">
        </div>
      </div>
      <div class="form-row">
        <button type="button" id="S 0 0" class="btn btn-success" onclick="bracketClick(this)">Gonzaga</button>
        <button type="button" id="S 0 1" class="btn btn-success" onclick="bracketClick(this)">Purdue</button>
        <button type="button" id="S 1 0" class="btn btn-success" onclick="bracketClick(this)">Pick...</button>
      </div>
      <div class="form-row">
        <button type="submit" class="btn btn-success btn-submit">Submit</button>
      </div>
    </form>
  </body>
  <script src="./res/js/bracket.js"></script>
</html>
