<?php

function event_calc_odds($odds_init, $bettors, $bettors_total) {
  $num_poss = 2;  //number of possibilities : win, lose
  $param_evolution = 2; //growth
  $threshold = 6;

  if ( $bettors_total == 0 ) {
    return $odds_init;
  }

  else {
    $ratio = $bettors/$bettors_total;
    $result = 1.01 + $odds_init/( pow( ($num_poss*$ratio), $param_evolution) + 0.01);     //formula in assignment

    if ( $result >= $threshold ) {
      $result = $threshold;
    }

    return round($result,2);      //round the result
  }
}
