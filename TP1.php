<?php
// Exemple 
// classe Rectangle caractérisé par largeur et longueur
// calculer surface et périmètre => définir la classe Rectangle

class Rectangle {
    // attributs
    private $largeur;
    private $longueur;
   
    // constructeur
    public function __construct($largeur, $longueur) {
        $this->largeur = $largeur;
        $this->longueur = $longueur;
    }

    // calcul surface
    public function getSurface() {
        return $this->largeur * $this->longueur;
    }

    // calcul périmètre
    public function getPerimetre() {
        return 2 * ($this->largeur + $this->longueur);
    }
}

// programme principal
$r1 = new Rectangle(2, 7);
echo $r1->getSurface();
echo "<br>le périmètre de r1 est : " . $r1->getPerimetre();

$r2 = new Rectangle(1, 10);
echo "<br>la surface de r2 est " . $r2->getSurface();

?>