<?php
// Héritage - série n°4 ex0
class Personne{ // Q1
    private string $nom, $prenom, $adresse, $tel;
    public function __construct($nom, $prenom, $adresse, $tel){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->tel = $tel;
    }

    public function toString():string{
        return "$this->nom $this->prenom $this->adresse $this->tel";
    }
}

class Stagiaire extends Personne{ // Q2
    private string $groupe;
    public function __construct($nom, $prenom, $adresse, $tel, $groupe){
        parent::__construct($nom, $prenom, $adresse, $tel);
        $this->groupe = $groupe;
    }

    public function getGroupe():string{
        return $this->groupe;
    }

    public function setGroupe($groupe):void{
        $this->groupe = $groupe;
    }
    public function toString():string{
        return parent::toString()." $this->groupe";
    }
}
class Formateur extends Personne{
    private float $salaire;

    public function __construct($nom, $prenom, $adresse, $tel, $salaire){
        parent::__construct($nom, $prenom, $adresse, $tel);
        $this->salaire = $salaire;
    }

    public function toString():string{
        return parent::toString()." $this->salaire DH";
    }
}
// Q5
$p = new Personne("Hrimate", "Ahmed", "ahmed@gmail.com", "0611223344");
$s = new Stagiaire("Karim", "Med", "med@gmail.com", "0600998877", "DEV101");
echo "p : ".$p->toString();
echo "<br/>s : ".$s->toString();

$f = new Formateur("Abidi", "Imane", "imane@gmail.com", "0633445566", 9000);
echo "<br/>f : ".$f->toString();
?>