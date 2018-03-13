<!DOCTYPE html>
<html lang="en">
  <?php echo file_get_contents("./includes/head.html") ?>
  <body>
    <?php echo file_get_contents("./includes/header.html") ?>

    <h3>
    <?php
      $db = new mysqli("localhost", posix_getpwuid(posix_getuid())["name"], file_get_contents(".db.token"), "bracket");
      $stmt = $db->prepare("INSERT INTO brackets (firstname, lastname, age, gender, school, knowledge, email, bracket) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssississ", $firstname, $lastname, $age, $gender, $school, $knowledge, $email, $bracket);

      $firstname = $_POST["firstname"];
      $lastname = $_POST["lastname"];
      $age = intval($_POST["age"]);
      $gender = $_POST["gender"];
      $school = $_POST["school"];
      $knowledge = intval($_POST["knowledge"]);
      $email = $_POST["email"];
      $bracket = json_encode(array_filter($_POST, function($value, $key) {
        return strpos($key, "_") !== false; // key contains an underscore
      }, ARRAY_FILTER_USE_BOTH));

      $success = $stmt->execute();

      if ($success) {
        echo "Bracket Saved!";
      } else {
        echo "Error Saving Bracket";
        // TODO print error info
      }
    ?>
    </h3>
  </body>
</html>
