<?php
$n = 4;

for ($i = 0; $i < $n; $i++) {
  for ($j = 0; $j < $n - $i - 1; $j++) {
    echo "&nbsp;";
  }
  echo "*<br>";
}
?>