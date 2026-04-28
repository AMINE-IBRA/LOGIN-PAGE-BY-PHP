<?php

$n = 8;

echo "donner un entier n: $n\n";

// LIGNE HORIZONTALE (haut)
for ($i = 1; $i <= $n; $i++) {
    echo "-";
}
echo "\n";

// PARTIE HAUTE DU SABLIER
for ($i = 1; $i <= $n/2; $i++) {

    // espaces à gauche
    for ($s = 1; $s < $i; $s++) {
        echo " ";
    }

    // backslash \
    echo "\\";

    // espaces au centre
    for ($m = 1; $m <= $n - 2*$i; $m++) {
        echo " ";
    }

    // slash /
    echo "/";

    echo "\n";
}

// PARTIE BASSE DU SABLIER
for ($i = $n/2; $i >= 1; $i--) {

    // espaces à gauche
    for ($s = 1; $s < $i; $s++) {
        echo " ";
    }

    // slash /
    echo "/";

    // espaces au centre
    for ($m = 1; $m <= $n - 2*$i; $m++) {
        echo " ";
    }

    // backslash \
    echo "\\";

    echo "\n";
}

// LIGNE HORIZONTALE (bas)
for ($i = 1; $i <= $n; $i++) {
    echo "-";
}
echo "\n";

?>