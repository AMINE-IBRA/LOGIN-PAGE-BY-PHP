
<?php
$n = 5; 

for ($i = 1; $i <= $n; $i++) {

  for ($j = 1; $j <= $n; $j++) {

    if ($i == 1 || $i == $n || $j == 1 || $j == $n) {
      echo "*";   
    } else {
      echo "&nbsp;"; 
    }

  }

  echo "<br>";
}
?> 