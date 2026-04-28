<?php
public function getNom(){ return sthis->nom; ]public function setNom($nom){ sthis->nom = $nom; }public function getprenom(){ return sthis->prenom; }
public function setPrenom(sprenom){ sthis->prenom = $prenom; }
public function getGroupe(){ return $this->groupe; ]
public function setGroupe(sgroupe){ sthis->groupe = $groupe;}
public function getcode(){ return sthis->code;]
public static function getNbrStagiaire(){ return self::$nbrStagiaire; ]
public function tostring(){
return "sthis->code - sthis->nom sthis->prenom - sthis->groupe";
18
20
34
$s1
= new Stagiaire("Sami","Med","DEV101");$s2 = new Stagiaire("Khalil","Hamza","DEV101");$s3= new Stagiaire("Karam","Amina","DEV102");echo "s1 :".$s1->toString()."<br>";
echo "s2 :".$s2->toString()."<br>",
echo "s3 :
".$s3->toString()."<br>";
echo "nbr de Stagiaire :".Stagiaire::getNbrStagiaire();
$s1->setNom("Samir");
echo "<br>s1 :".$s1->tostring();
?>