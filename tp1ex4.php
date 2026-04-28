<?php
// Ex4 Série n°3

class Point {
    private $x, $y;

    public function __construct($x, $y){
        $this->x = $x;
        $this->y = $y;
    }

    public function __get($att){
        return $this->$att;
    }

    public function __set($att, $val){
        $this->$att = $val;
    }

    public function afficher(){
        echo "POINT($this->x,$this->y)<br/>";
    }

    public function norme($p){
        return sqrt(pow($this->x - $p->x, 2) + pow($this->y - $p->y, 2));
    }
}

// Cercle
class Cercle {
    private $centre, $rayon;

    public function __construct($point, $rayon){
        $this->centre = $point;
        $this->rayon = $rayon;
    }

    public function __get($att){
        return $this->$att;
    }

    public function __set($att, $val){
        $this->$att = $val;
    }

    public function afficher(){
        echo "CERCLE(" . $this->centre->x . "," . 
             $this->centre->y . "," . $this->rayon . ")<br/>";
    }

    public function getPerimetre(){
        return 2 * pi() * $this->rayon;
    }

    public function getSurface(){
        return pi() * $this->rayon ** 2;
    }

    public function appartient($p){
        return $this->centre->norme($p) == $this->rayon;
    }
}

// PP
$centre = new Point(0,0);
$p = new Point(3,4);
$cercle = new Cercle($centre, 5);

$p->afficher();
$cercle->afficher();

echo "le périmètre du cercle : " . $cercle->getPerimetre();
echo "<br/>la surface du cercle : " . $cercle->getSurface();

if($cercle->appartient($p))
    echo "<br/>p appartient au cercle";
else
    echo "<br/>p n'appartient pas au cercle";

?>