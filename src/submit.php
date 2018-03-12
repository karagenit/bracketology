<!DOCTYPE html>
<html lang="en">
  <?php echo file_get_contents("./includes/head.html") ?>
  <body>
    <?php
      file_put_contents("./brackets/" . microtime() . ".json", json_encode($_POST));
      echo file_get_contents("./includes/header.html");
    ?>
    <h3>Bracket Saved!</h3>
  </body>
</html>
