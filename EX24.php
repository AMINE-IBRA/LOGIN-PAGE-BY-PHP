<?php

$n = 8; // doit être pair

echo "donner la taille paire: $n\n";

// PARTIE HAUTE
for ($i = 1; $i <= $n/2; $i++) {

    // espaces à gauche
    for ($s = 1; $s <= ($n/2 - $i); $s++) {
        echo " ";
    }

    // slash /
    echo "/";

    // espaces au centre
    for ($m = 1; $m <= (2*$i - 2); $m++) {
        echo " ";
    }

    // backslash \
    echo "\\";

    echo "\n";
}

// LIGNE HORIZONTALE
for ($i = 1; $i <= $n+1; $i++) {
    echo "-";
}
echo "\n";

// PARTIE BASSE
for ($i = $n/2; $i >= 1; $i--) {

    // espaces à gauche
    for ($s = 1; $s <= ($n/2 - $i); $s++) {
        echo " ";
    }

    // backslash \
    echo "\\";

    // espaces au centre
    for ($m = 1; $m <= (2*$i - 2); $m++) {
        echo " ";
    }

    // slash /
    echo "/";

    echo "\n";
}

?>