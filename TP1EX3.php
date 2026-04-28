<?php
// Ex3 série n°3
class Stagiaire {
    private $code, $nom, $prenom, $groupe;
    private static $nbrStagiaire = 0;

    public function __construct($nom, $prenom, $groupe) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->groupe = $groupe;
        $this->code = ++self::$nbrStagiaire;
    }
    // public function getNom() {
    //     return $this->nom;
    // }
    // public function setNom($nom) {
    //     $this->nom = $nom;
    // }
    // public function getPrenom() {
    //     return $this->prenom;
    // }
    // public function setPrenom($prenom) {
    //     $this->prenom = $prenom;
    // }
    // public function getGroupe() {
    //     return $this->groupe;
    // }
    // public function setGroupe($groupe) {
    //     $this->groupe = $groupe;
    // }
    // public function getCode() {
    //     return $this->code;
    // }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public static function getNbrStagiaire() {
        return self::$nbrStagiaire;
    }
    public function toString() {
        return "$this->code - $this->nom $this->prenom - $this->groupe";
    }
}
// PP
$s1 = new Stagiaire("Sami", "Med", "DEV101");
$s2 = new Stagiaire("Khalil", "Hamza", "DEV101");
$s3 = new Stagiaire("Karam", "Amina", "DEV102");
echo "s1 : " . $s1->toString() . "<br>";
echo "s2 : " . $s2->toString() . "<br>";
echo "s3 : " . $s3->toString() . "<br>";
echo "nbr de Stagiaire : " . Stagiaire::getNbrStagiaire();
$s1->setNom("Samir");
echo "<br>s1 : " . $s1->toString();
?>