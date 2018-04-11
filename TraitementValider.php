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
$T["statut"]="validée";
//$T["ACCESS"] = md5($res);
$json=json_encode($T);

$fd=fopen("Data/Mission_".$T["ACCESS"],"w");
fputs($fd,$json);
fclose($fd);

$resV="Mission validée par ".$T["mailequipe"]."\n";
$resV="Pour accéder à la mission : \n".$prefix."/Traiter.php?ACCESS=".$T["ACCESS"]."\n\n";
$resV.="Formulaire pdf            : \n".$prefix."/getpdf.php?ACCESS=".$T["ACCESS"]."";

$resV.="\n\nRécapitulatif\n";
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

$resA="Votre demande a été transmise à ".$T["assistant"]." pour traitement\nPour accéder à la mission : \n".$prefix."/index.php?ACCESS=".$T["ACCESS"]."\n\n";
$resA.="Formulaire pdf            : \n".$prefix."/getpdf.php?ACCESS=".$T["ACCESS"]."";

mail($T["mailequipe"].",".$T["assistant"],"[Mission à traiter] ".$_POST["nom"]."  ".$_POST["prenom"], $resV, "From:".$T["email"]);
if ($T["typecreditprojetresp"] != $T["mailequipe"]) mail($T["typecreditprojetresp"],"[Mission à traiter] ".$_POST["nom"]."  ".$_POST["prenom"], $resV,"From:".$T["email"]);
mail($T["email"],"[Mission validée] ".$_POST["nom"]."  ".$_POST["prenom"], $resA,"From:".$T["email"]);

echo "<p>Votre demande a été transmise à ".$T["assistant"]." pour traitement</br>Pour accéder à la mission : <a href=\"".$prefix."/index.php?ACCESS=".$T["ACCESS"]."\">".$prefix."/index.php?ACCESS=".$T["ACCESS"]."</a><a href=\"".$prefix."/getpdf.php?ACCESS=".$T["ACCESS"]."\">(Version pdf)</a></p>";

?>
</body>
</html>
