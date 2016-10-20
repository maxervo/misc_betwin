<?php
  //History contains some entries
  if (mysqli_num_rows($history) != 0) {
    $i = 1;
    echo '<table class="table">';
    echo '
          <thead>
          <tr>
            <th>Pari n°</th>
            <th>Argent parié €</th>
            <th>Côte obtenue</th>
            <th>Equipe choisie</th>
            <th>Resultat</th>
          </tr>
        </thead>
        ';
    echo '<tbody>';
    while ($history_row = mysqli_fetch_assoc($history)) {
      echo '<tr>';
      echo '<th scope="row">'.$i.'</th>';
      echo '<td>'.$history_row['betting_money'].'</td>';
      echo '<td>'.$history_row['odds'].'</td>';
      echo '<td>'.$history_row['which_team'].'</td>';
      echo '<td>'.$history_row['result'].'</td>';
      echo '</tr>';
      $i++;
    }
    mysqli_free_result($history);
    echo '</tbody>';
    echo '</table>';
  }

  //History is empty
  else {
    echo '<p>Historique vide pour le moment. Aller parier sur des évènements!</p>';
    mysqli_free_result($history);                                     //Good to do it or not?
  }
