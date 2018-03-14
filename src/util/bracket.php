<?php
  function generateBracket() {
    $html = "";

    $teamdata = json_decode(file_get_contents("./data/teams.json"));

    foreach ($teamdata as $region => $teams) {
      $html .= '<h3>' . ucfirst($region) . '</h3><hr>';
      $html .= '<div class="form-row row-bracket">';
      $html .= '<div class="form-group col col-bracket">';
      foreach ([1,8,5,4,6,3,7,2] as $seedindex => $seedcnt) {
        $topseed = $seedcnt;
        $botseed = 17 - $seedcnt;

        $topname = "<small>$topseed </small>" . $teams->$topseed;
        $botname = "<small>$botseed </small>" . $teams->$botseed;
        $topid = $region . "_0_" . (2 * $seedindex);
        $botid = $region . "_0_" . (2 * $seedindex + 1);

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
          $id = $region . '_' . $roundcnt . '_' . $indexcnt;
          $html .= '<button type="button" id="' . $id . '" value="" class="btn btn-outline-success btn-block btn-bracket" onclick="bracketClick(this)">[None]</button>';
          $html .= '<input type="hidden" name="' . $id . '" id="' . 'I' . $id . '" value="">';
        }
        $html .= '</div>';
      }
 
      $html .= '</div>';
    }

    $html .= '<h3>Final Four</h3><hr>';
    $html .= '<div class="form-row" style="min-width:800px;">';
    $html .= '<div class="form-group col"></div>'; 
    foreach (range(4,6) as $roundcnt) {
      $html .= '<div class="form-group col col-bracket">';
      foreach (range(0, (4/pow(2, $roundcnt-4)-1)) as $indexcnt) {
        $id = 'F_' . $roundcnt . '_' . $indexcnt;
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
