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
$T["statut"]="traitée";
//$T["ACCESS"] = md5($res);
$json=json_encode($T);

$fd=fopen("Data/Mission_".$T["ACCESS"],"w");
fputs($fd,$json);
fclose($fd);

$resV="Mission validée par ".$T["mailequipe"]." et traitée par ".$T["nomassistante"]."\n";
$resV="Pour accéder à la mission : \n".$prefix."/index.php?ACCESS=".$T["ACCESS"]."\n\n";
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

$resA="Votre demande a été traitée par ".$T["nomassistante"]."\nPour accéder à la mission : \n".$prefix."/index.php?ACCESS=".$T["ACCESS"]."\n\n";
$resA.="Formulaire pdf            : \n".$prefix."/getpdf.php?ACCESS=".$T["ACCESS"]."\n\n";
if ($T["havasBC"] != "") {
  $resA.="Vous pouvez réserver vos billets sur le site d'Havas (https://havas-voyages-connect.com) en utilisant les informations suivantes\n";
  $resA.=" Numéro de bon de commande : ".$T["havasBC"]."\n";
  $resA.=" Centre de coût : ".$T["havasCC"]."\n";

}

/*
echo "<pre>";
print_r($T);
echo "</pre>";
 */

// Pour envoie département enseignements

$resD="Mission validée par ".$T["mailequipe"]." et traitée par ".$T["nomassistante"]."\n";
$resD.="Formulaire pdf            : \n".$prefix."/getpdf.php?ACCESS=".$T["ACCESS"]."";

$resD.="\n\nRécapitulatif\n";
$resD.="-----------------\n";
$resD.="Nom Prénom : ".$T["nom"]." ".$T["prenom"]."\n";
$resD.="Objet : ".$T["objet"]."\n";
$resD.="Départ 1 : ".$T["descdate1"]." ".$T["descvilledep1"].", ".$T["descheuredep1"]." -> ".$T["descvillearr1"].", ".$T["descheurearr1"]."\n";
$resD.="Départ 2 : ".$T["descdate2"]." ".$T["descvilledep2"].", ".$T["descheuredep2"]." -> ".$T["descvillearr2"].", ".$T["descheurearr2"]."\n";
$resD.="-----------------\n";





mail($T["mailequipe"].",".$T["assistant"],"[Mission traitée] ".$_POST["nom"]."  ".$_POST["prenom"], $resV, "From:".$T["email"]);
if ($T["typecreditprojetresp"] != $T["mailequipe"]) mail($T["typecreditprojetresp"],"[Mission traitée] ".$_POST["nom"]."  ".$_POST["prenom"], $resV, "From:".$T["email"]);
mail($T["email"],"[Mission traitée] ".$_POST["nom"]."  ".$_POST["prenom"], $resA, "From:".$T["email"]);

echo "<p>La demande a été traitée par ".$T["nomassistante"]."</br>Pour accéder à la mission : <a href=\"".$prefix."/index.php?ACCESS=".$T["ACCESS"]."\">".$prefix."/index.php?ACCESS=".$T["ACCESS"]."</a><a href=\"".$prefix."/getpdf.php?ACCESS=".$T["ACCESS"]."\">(Version pdf)</a></p>";
if ($T["enseignement"] != "Aucun") {
  mail($T["enseignement"],"[Mission d'un membre du département] ".$T["nom"]."  ".$T["prenom"], $resD, "From:".$T["email"]);
  echo "<p>Le département d'enseignement est informé de la mission via cette adresse : ".$T["enseignement"]."</p>";
}

// DEBUG
/*
echo "<pre>";
echo "mail pour ".$T["mailequipe"].",".$T["assistant"];
echo "\n\n";
echo "sujet : [Mission traitée] ".$_POST["nom"]."  ".$_POST["prenom"];
echo $resV;
echo "\n\n";
echo "---------------\n";
echo $resA;
echo "\n\n";
echo "---------------\n";
echo $_POST["enseignement"];
echo "\n\n";
echo "</pre>";
*/
?>
</body>
</html>
