<html>
<head><title>Traitement</title></head>
<body>
<?php

include "config.php";

$res="";
$T=array();
foreach($_POST as $cle=>$valeur) {
  $res.=$cle." = ".$valeur."\n";
  $T[$cle]=$valeur;
  //echo $cle." = ".$valeur."\n";
}

$T["statut"]="attente validation";
$T["ACCESS"] = md5($res);
if ($T["typecreditprojetresp"] == "") {
  $T["typecreditprojetresp"] = $T["mailequipe"];
}
if ($T["priseencharge"] == "2") {
  $T["priseencharge"] =100;
}

$json=json_encode($T);

$fd=fopen("Data/Mission_".$T["ACCESS"],"w");
fputs($fd,$json);
fclose($fd);




$resV="";
$resV.="Version pdf               : \n".$prefix."/getpdf.php?ACCESS=".$T["ACCESS"]."\n\n";
$resV.="-----------------\n";
$resV.="Nom Prénom : ".$T["nom"]." ".$T["prenom"]."\n";
$resV.="Objet : ".$T["objet"]."\n";
if ($T["priseencharge"] == "1") {
  $resV.="Type de prise en charge : Complète\n";
}
if ($T["priseencharge"] == "2") {
  $resV.="Type de prise en charge : Sans Frais\n";
}
if ($T["priseencharge"] == "3") {
  $resV.="Type de prise en charge : Partiel\n";
}
$resV.="Départ 1 : ".$T["descdate1"]." ".$T["descvilledep1"].", ".$T["descheuredep1"]." -> ".$T["descvillearr1"].", ".$T["descheurearr1"]."\n";
$resV.="Départ 2 : ".$T["descdate2"]." ".$T["descvilledep2"].", ".$T["descheuredep2"]." -> ".$T["descvillearr2"].", ".$T["descheurearr2"]."\n";
if ($T["typecredits"] == "1") {
  $resV.="Prise en charge : Projet ".$T["typecreditprojet"]." géré par ".$T["typecreditprojetresp"]."\n";
}
if ($T["typecredits"] == "2") {
  $resV.="Prise en charge : Dotation équipe ".$T["typecreditequipe"]."\n";
}
if ($T["typecredits"] == "3") {
  $resV.="Prise en charge : Ressources propres ".$T["typecreditressources"]."\n";
}
$resV.="Cout : ".$T["cout"]."\n";
$resV.="-----------------\n";


$resValideur="Pour accéder à la mission : \n".$prefix."/validation.php?ACCESS=".$T["ACCESS"]."\n\n";
$resValideur.=$resV;

$resEquipe="Pour information, nouvelle mission à valider par ".$T["typecreditprojetresp"]."\n";
$resEquipe.="Pour accéder à la mission : \n".$prefix."/index.php?ACCESS=".$T["ACCESS"]."\n\n";



$resA="Votre demande a été transmise à ".$T["typecreditprojetresp"]." pour validation\nPour accéder à la mission : \n".$prefix."/index.php?ACCESS=".$T["ACCESS"]."\nVersion pdf               : \n".$prefix."/getpdf.php?ACCESS=".$T["ACCESS"]."\n\n";

mail($T["typecreditprojetresp"],"[Mission à valider] ".$_POST["nom"]."  ".$_POST["prenom"], $resValideur, "From:".$T["email"]);
if (strtolower($T["typecreditprojetresp"]) != strtolower($T["mailequipe"])) mail($T["mailequipe"],"[Mission à valider par ".$T["typecreditprojetresp"]."] ".$_POST["nom"]."  ".$_POST["prenom"], $resEquipe, "From:".$T["email"]);
mail($T["email"],"[Mission transmise en attente de validation par ".$T["typecreditprojetresp"]."] ".$_POST["nom"]."  ".$_POST["prenom"], $resA, "From:".$T["email"]);

echo "<p>Votre demande a été transmise à ".$T["typecreditprojetresp"]." pour validation</br>Pour accéder à la mission : <a href=\"".$prefix."/index.php?ACCESS=".$T["ACCESS"]."\">".$prefix."/index.php?ACCESS=".$T["ACCESS"]."</a><a href=\"".$prefix."/getpdf.php?ACCESS=".$T["ACCESS"]."\">(Version pdf)</a></p>";

?>
</body>
</html>
