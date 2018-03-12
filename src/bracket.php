<?php
  function generateBracket() {
    $html = "";

    $teamdata = json_decode(file_get_contents("./data/teams.json"));

    foreach ($teamdata as $region => $teams) {
      $html .= '<h3>' . ucfirst($region) . '</h3><hr>';
      $html .= '<div class="form-row">';
      $html .= '<div class="form-group col col-bracket">';
      foreach ([1,8,5,4,6,3,7,2] as $seedcnt) {
        $topseed = $seedcnt;
        $botseed = 17 - $seedcnt;

        $topname = $teams->$topseed;
        $botname = $teams->$botseed;
        $topid = $region . " 0 " . (2 * $seedcnt);
        $botid = $region . " 0 " . (2 * $seedcnt + 1);

        $html .= '<div style="margin-bottom:8px;">';
        $html .= '<button type="button" id="' . $topid .'" value="' . $topname . '" class="btn btn-outline-success btn-block btn-bracket" onclick="bracketClick(this)">' . $topname . '</button>';
        $html .= '<input type="hidden" name="' . $topid . '" id="' . 'I' . $topid . '" value="' . $topname . '">';
        $html .= '<button type="button" id="' . $botid .'" value="' . $botname . '" class="btn btn-outline-success btn-block btn-bracket" onclick="bracketClick(this)">' . $botname . '</button>';
        $html .= '<input type="hidden" name="' . $botid . '" id="' . 'I' . $botid . '" value="' . $botname . '">';
        $html .= '</div>';
      }

      $html .= '</div>';

      foreach (range(1,4) as $roundcnt) {
        $html .= '<div class="form-group col col-bracket">';
        foreach (range(0, (16 / pow(2, $roundcnt))-1) as $indexcnt) {
          $id = $region . ' ' . $roundcnt . ' ' . $indexcnt;
          $html .= '<button type="button" id="' . $id . '" value="" class="btn btn-outline-success btn-block btn-bracket" onclick="bracketClick(this)">[None]</button>';
          $html .= '<input type="hidden" name="' . $id . '" id="' . 'I' . $id . '" value="">';
        }
        $html .= '</div>';
      }
 
      $html .= '</div>';
    }

    $html .= '<h3>Final Four</h3><hr>';
    $html .= '<div class="form-row">';
    $html .= '<div class="form-group col"></div>'; 
    foreach (range(4,6) as $roundcnt) {
      $html .= '<div class="form-group col col-bracket">';
      foreach (range(0, (4/pow(2, $roundcnt-4)-1)) as $indexcnt) {
        $id = 'F ' . $roundcnt . ' ' . $indexcnt;
        $html .= '<button type="button" id="' . $id . '" value="" class="btn btn-outline-success btn-block btn-bracket" onclick="bracketClick(this)">[None]</button>';
        $html .= '<input type="hidden" name="' . $id . '" id="' . 'I' . $id . '" value="">';
      }
      $html .= '</div>';
    }
    $html .= '<div class="form-group col"></div>';
    $html .= '</div>';

    echo $html;
  }
?>

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
      <?php generateBracket() ?>
      <div class="form-row">
        <button type="submit" class="btn btn-success btn-submit">Submit</button>
      </div>
    </form>
  </body>
  <script src="./res/js/bracket.js"></script>
</html>
