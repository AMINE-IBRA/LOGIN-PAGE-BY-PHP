<?php
// TP1
// Q1
class Chauffeur {
    private string $cin, $nom, $prenom;

    public function __construct(string $cin, string $nom, string $prenom) {
        $this->cin = $cin;
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    public function getCin(): string {
        return $this->cin;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getPrenom(): string {
        return $this->prenom;
    }

    public function toString(): string {
        return "$this->cin $this->nom $this->prenom";
    }
}

// Q2
class Bus {
    private string $matricule, $marque, $type;

    public function __construct(string $matricule, string $marque, string $type) {
        $this->matricule = $matricule;
        $this->marque = $marque;
        $this->type = $type;
    }

    public function getMatricule(): string {
        return $this->matricule;
    }

    public function getMarque(): string {
        return $this->marque;
    }

    public function getType(): string {
        return $this->type;
    }

    public function toString(): string {
        return "$this->matricule $this->marque $this->type";
    }
}

// Q3
class Voyage {
    private int $numeroVoyage;
    private static int $nbrVoyage = 0;
    private Chauffeur $chauffeur;
    private Bus $bus;
    private DateTime $dateVoyage;
    private string $villeDepart, $villeArrivee;
    private float $prixVoyage;
    private int $nombreVoyageurs;

    public function __construct(
        Chauffeur $chauffeur,
        Bus $bus,
        DateTime $date,
        string $villeD,
        string $villeA,
        float $prix,
        int $nombreVoyageurs
    ) {
        $this->numeroVoyage = ++self::$nbrVoyage;
        $this->chauffeur = $chauffeur;
        $this->bus = $bus;
        $this->dateVoyage = $date;
        $this->villeDepart = $villeD;
        $this->villeArrivee = $villeA;
        $this->prixVoyage = $prix;
        $this->nombreVoyageurs = $nombreVoyageurs;
    }

    public function getNumeroVoyage(): int {
        return $this->numeroVoyage;
    }

    public function getChauffeur(): Chauffeur {
        return $this->chauffeur;
    }

    public function getBus(): Bus {
        return $this->bus;
    }

    public function getDateVoyage(): DateTime {
        return $this->dateVoyage;
    }

    public function getVilleDepart(): string {
        return $this->villeDepart;
    }

    public function getVilleArrivee(): string {
        return $this->villeArrivee;
    }

    public function getPrixVoyage(): float {
        return $this->prixVoyage;
    }

    public function getNombreVoyageurs(): int {
        return $this->nombreVoyageurs;
    }

    public function toString(): string {
        $infoVoyage = "********************* Info Voyage *********************<br/>";
        $infoVoyage .= "Numéro voyage : " . $this->numeroVoyage . "<br/>";
        $infoVoyage .= "Chauffeur : " . $this->chauffeur->toString() . "<br/>";
        $infoVoyage .= "Bus : " . $this->bus->toString() . "<br/>";
        $infoVoyage .= "Date voyage : " . $this->dateVoyage->format("d/m/Y") . "<br/>";
        $infoVoyage .= "Ville Départ : " . $this->villeDepart . "<br/>";
        $infoVoyage .= "Ville Arrivée : " . $this->villeArrivee . "<br/>";
        $infoVoyage .= "Recette : " . ($this->prixVoyage * $this->nombreVoyageurs) . " DH<br/><br/>";
        return $infoVoyage;
    }
}
 
// Q4a PP (Programme Principal)
$listeChauffeur = []; // tableau vide
$listeChauffeur[] = new Chauffeur("Q12345", "Fahim", "Maati");
$listeChauffeur[] = new Chauffeur("Q11111", "Fakhir", "Ahmed");
$listeChauffeur[] = new Chauffeur("Q22222", "Karima", "Imane");

$listeBus = [
    new Bus("1000|A|57", "Mercedes", "Car"),
    new Bus("20000|A|57", "Toyota", "MiniBus"),
    new Bus("30000|A|57", "BMW", "Car")
];

$listeVoyages = [];
$listeVoyages[] = new Voyage(
    rechercherChauffeur("Q12345"),
    $listeBus[0],
    new DateTime("2026-03-04 09:30:00"),
    "Khouribga",
    "Tanger",
    200,
    50
);

$listeVoyages[] = new Voyage(
    $listeChauffeur[1],
    $listeBus[1],
    new DateTime("2026-03-04 10:00:00"),
    "Casablanca",
    "Agadir",
    200,
    20
);

foreach ($listeVoyages as $voyage) {
    echo $voyage->toString();
}

// b
function rechercherChauffeur(string $cin): ?Chauffeur {
    global $listeChauffeur;
    foreach ($listeChauffeur as $chauffeur) {
        if ($chauffeur->getCin() === $cin) {
            return $chauffeur;
        }
    }
    return null;
}

$ch = rechercherChauffeur("Q12345");
if ($ch != null) {
    echo $ch->toString();
} else {
    echo "Chauffeur introuvable";
}

// c
function rechercherBus(string $matricule): ?Bus {
    global $listeBus;
    foreach ($listeBus as $bus) {
        if ($bus->getMatricule() === $matricule) {
            return $bus;
        }
    }
    return null;
}

$bus = rechercherBus("20000|A|57");
if ($bus != null) {
    echo $bus->toString();
} else {
    echo "Bus introuvable";
}

// d
function rechercherVoyage(int $numeroVoyage): ?Voyage {
    global $listeVoyages;
    foreach ($listeVoyages as $voyage) {
        if ($voyage->getNumeroVoyage() === $numeroVoyage) {
            return $voyage;
        }
    }
    return null;
}

$v = rechercherVoyage(1);
if ($v != null) {
    echo $v->toString();
} else {
    echo "Voyage introuvable";
}
?>