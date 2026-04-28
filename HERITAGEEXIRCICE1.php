<?php
// Héritage - série n°4 ex1

// Q1: Classe de base Compte
class Compte {
    private int $code;
    protected float $solde; // Changé en protected pour permettre l'accès aux classes filles
    private static int $nbrCompte = 0;

    public function __construct($solde) {
        $this->solde = $solde;
        $this->code = ++self::$nbrCompte;
    }
    
    public function getCode() {
        return $this->code;
    }

    public function getSolde() {
        return $this->solde;
    }

    public function toString(): string {
        return "code : " . $this->code . " - solde : " . $this->solde . " DH";
    }

    public function deposer($mnt): void {
        $this->solde += $mnt;
    }

    public function retirer($mnt): void {
        $this->solde -= $mnt;
    }
}

// Q2: Classe CompteEpargne
class CompteEpargne extends Compte {
    private const TAUX_INTERET = 0.05;

    public function __construct($solde) {
        parent::__construct($solde);
    }

    public function calculInteret() {
        $this->solde *= (1 + self::TAUX_INTERET);
    }
}

// Q3: Classe ComptePayant
class ComptePayant extends Compte {
    private const TARIF = 5;

    public function __construct($solde) {
        parent::__construct($solde);
    }

    public function deposer($mnt): void {
        parent::deposer($mnt - self::TARIF);
    }

    public function retirer($mnt): void {
        parent::retirer($mnt + self::TARIF);
    }
}

// PP Q4: Programme Principal
$compte = new Compte(10000);
$comptePayant = new ComptePayant(10000);
$compteEpargne = new CompteEpargne(10000);

$compte->deposer(2000);
$compte->retirer(1000);

$comptePayant->deposer(2000);
$comptePayant->retirer(1000);

$compteEpargne->deposer(2000);
$compteEpargne->retirer(1000);
$compteEpargne->calculI
echo "compte : " . $compte->toString();
echo "<br/>comptePayant : " . $comptePayant->toString();
echo "<br/>compteEpargne : " . $compteEpargne->toString();
?>                         