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

$T["statut"]="en cours";
if (! isset($T["ACCESS"])) $T["ACCESS"] = md5($res);
/*
if ($T["typecreditprojetresp"] == "") {
  $T["typecreditprojetresp"] = $T["mailequipe"];
}
if ($T["priseencharge"] == "2") {
  $T["priseencharge"] =100;
}
*/
$json=json_encode($T);

$fd=fopen("Data/Mission_".$T["ACCESS"],"w");
fputs($fd,$json);
fclose($fd);

echo "<p>La fiche a été créée.</br>Pour y accéder : <a href=\"".$prefix."/index.php?ACCESS=".$T["ACCESS"]."\">".$prefix."/index.php?ACCESS=".$T["ACCESS"]."</a></p>";

?>
</body>
</html>
