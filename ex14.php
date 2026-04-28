<?php
$n = 4; 

for ($i = $n; $i >= 1; $i--) {

  for ($j = 1; $j <= $n - $i; $j++) {
    echo "&nbsp;";
  }

  for ($k = 1; $k <= (2 * $i - 1); $k++) {
    echo "*";
  }

  echo "<br>";
}
?>