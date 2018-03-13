<!DOCTYPE html>
<html lang="en">
  <?php echo file_get_contents("./includes/head.html") ?>
  <body>
    <?php
      echo file_get_contents("./includes/header.html");

      $db = new mysqli("localhost", "caleb", "", "bracket");
      $stmt = $db->prepare("INSERT INTO brackets (firstname, lastname, age, gender, school, knowledge, email, bracket) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssississ", $firstname, $lastname, $age, $gender, $school, $knowledge, $email, $bracket);

      // TODO use POST fields - convert to #s, and grab all bracket info
      $firstname = "caleb";
      $lastname = "smith";
      $age = 3;
      $gender = "M";
      $school = "CHS";
      $knowledge = 999;
      $email = "no";
      $bracket = "{test: data}";

      $success = $stmt->execute();

      if ($success) {
        echo "Bracket Saved!";
      } else {
        echo "Error saving...";
        // TODO print error info
      }
    ?>
  </body>
</html>
