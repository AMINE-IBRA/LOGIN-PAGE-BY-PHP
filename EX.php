<?php

class Employe {
    // Attributs
    private $matricule;
    private $nom;
    private $prenom;
    private $dateNaissance;
    private $dateEmbauche;
    private $salaire;

    // 1. Constructeur
    public function __construct($mat, $n, $p, $dn, $de, $s) {
        $this->matricule = $mat;
        $this->nom = $n;
        $this->prenom = $p;
        $this->dateNaissance = $dn;
        $this->dateEmbauche = $de;
        $this->salaire = $s;
    }

    // 2. Accesseurs et Mutateurs (Magic Methods)
    public function __get($att) {
        return $this->$att;
    }

    public function __set($att, $val) {
        $this->$att = $val;
    }

    // 3. Calcul de l'Age
    public function Age() {
        $dateNaissance = new DateTime($this->dateNaissance);
        $today = new DateTime();
        $interval = $today->diff($dateNaissance);
        return $interval->y; // Retourne l'année ('y')
    }

    // 4. Calcul de l'Ancienneté
    public function Anciennete() {
        $dateEmbauche = new DateTime($this->dateEmbauche);
        $today = new DateTime();
        $interval = $today->diff($dateEmbauche);
        return $interval->y;
    }

    // 5. Augmentation du Salaire
    public function AugmentationDuSalaire() {
        $anciennete = $this->Anciennete();

        if ($anciennete < 5) {
            $this->salaire *= 1.02; // +2%
        } elseif ($anciennete < 10) {
            $this->salaire *= 1.05; // +5%
        } else {
            $this->salaire *= 1.10; // +10%
        }
    }

    // 6. Affichage des informations
    public function AfficherEmploye() {
        $nomMaj = strtoupper($this->nom);
        $prenomFormat = ucfirst(strtolower($this->prenom));

        echo "Matricule : " . $this->matricule . "<br>";
        echo "Nom Complet : " . $nomMaj . " " . $prenomFormat . "<br>";
        echo "Age : " . $this->Age() . " ans<br>";
        echo "Ancienneté : " . $this->Anciennete() . " ans<br>";
        echo "Salaire : " . $this->salaire . " DH<br>";
    }
}

// --- Programme de Test ---

$employe = new Employe(201, "Samir", "Farah", "1992-03-11", "2016-02-17", 4000);

echo "<h3>Avant Augmentation :</h3>";
$employe->AfficherEmploye();

// Application de l'augmentation
$employe->AugmentationDuSalaire();

echo "<h3>Après Augmentation :</h3>";
$employe->AfficherEmploye();

?>