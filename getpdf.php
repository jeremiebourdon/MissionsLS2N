<?php
if ($_GET["ACCESS"] != "") {
  $Token = $_GET["ACCESS"];
  $filename="Data/Mission_".$Token;
  if (file_exists($filename)) {
    $fd=fopen($filename,"r");
    $T=json_decode(fgets($fd,4096));
    fclose($fd);
  }
}

$T2=array();
foreach($T as $cle=>$valeur) $T2[$cle]=utf8_decode($valeur);

require('fpdf.php');

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

$pdf->SetFillColor(255);
$pdf->Rect(0,150,60,10,"F");


$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(0,0,0);

$pdf->Image("Images/formulairemission-min.png",0,0,210,297);

$pdf->Text(61,28.5,$T2["datedemande"]);
$pdf->Text(36,33.5,$T2["nom"]);
$pdf->Text(41,38,$T2["prenom"]);
$pdf->Text(45,43,$T2["employeur"]);
$pdf->Text(57,47.5,$T2["grade"]);

if ($T2["priseencharge"] == "1") {
  $pdf->Rect(25,51,3,3,"DF");
}
if ($T2["priseencharge"] == "2") {
  $pdf->Rect(25,56,3,3,"DF");
  $pdf->Text(141,60,$T2["priseenchargesansfrais"]);
}
if ($T2["priseencharge"] == "3") {
  $pdf->Rect(25,61,3,3,"DF");
  $pdf->Text(35,69.5,$T2["priseenchargepartiel"]);
}

$pdf->Text(67,77,$T2["objet"]);

$pdf->Text(30,98,$T2["descdate1"]);
$pdf->Text(60,98,$T2["descvilledep1"]);
$pdf->Text(96,98,$T2["descheuredep1"]);
$pdf->Text(126,98,$T2["descvillearr1"]);
$pdf->Text(160,98,$T2["descheurearr1"]);

$pdf->Text(30,103,$T2["descdate2"]);
$pdf->Text(60,103,$T2["descvilledep2"]);
$pdf->Text(96,103,$T2["descheuredep2"]);
$pdf->Text(126,103,$T2["descvillearr2"]);
$pdf->Text(160,103,$T2["descheurearr2"]);

$pdf->Text(30,108,$T2["descdate3"]);
$pdf->Text(60,108,$T2["descvilledep3"]);
$pdf->Text(96,108,$T2["descheuredep3"]);
$pdf->Text(126,108,$T2["descvillearr3"]);
$pdf->Text(160,108,$T2["descheurearr3"]);

$pdf->Text(30,113,$T2["descdate4"]);
$pdf->Text(60,113,$T2["descvilledep4"]);
$pdf->Text(96,113,$T2["descheuredep4"]);
$pdf->Text(126,113,$T2["descvillearr4"]);
$pdf->Text(160,113,$T2["descheurearr4"]);

$pdf->Text(106,121,$T2["prive"]);

if ($T2["originecredits"] == "1") {
  $pdf->Rect(25,134,3,3,"DF");
}
if ($T2["originecredits"] == "2") {
  $pdf->Rect(25,140,3,3,"DF");
}
if ($T2["originecredits"] == "3") {
  $pdf->Rect(60,140,3,3,"DF");
}
if ($T2["originecredits"] == "4") {
  $pdf->Rect(25,145,3,3,"DF");
}
if ($T2["originecredits"] == "5") {
  $pdf->Rect(60,145,3,3,"DF");
}
if ($T2["originecredits"] == "6") {
  $pdf->Rect(25,150,3,3,"DF");
}
if ($T2["originecredits"] == "7") {
  $pdf->Rect(60,150,3,3,"DF");
}

if ($T2["originecredits"] == "7") {
  $pdf->Rect(60,150,3,3,"DF");
}


if ($T2["typecredits"] == "1") {
  $pdf->Rect(113,134,3,3,"DF");
  $pdf->Text(130,137,$T2["typecreditprojet"]);
}

if ($T2["typecredits"] == "2") {
  $pdf->Rect(113,139,3,3,"DF");
  $pdf->Text(157,142,$T2["typecreditequipe"]);
}
if ($T2["typecredits"] == "3") {
  $pdf->Rect(113,144,3,3,"DF");
  $pdf->Text(143,152,$T2["typecreditressources"]);
}

if ($T2["transportinscription"] == "inscription") {
  $pdf->Rect(25,157,3,3,"DF");
}
if ($T2["transporttrain"] == "train") {
  $pdf->Rect(25,171,3,3,"DF");
}
if ($T2["transportavion"] == "avion") {
  $pdf->Rect(50,171,3,3,"DF");
}
if ($T2["transportcommun"] == "commun") {
  $pdf->Rect(75,171,3,3,"DF");
}
if ($T2["transportlocation"] == "location") {
  $pdf->Rect(25,176,3,3,"DF");
}
if ($T2["transportpersonnel"] == "personnel") {
  $pdf->Rect(25,181,3,3,"DF");
}
if ($T2["transportadministratif"] == "administratif") {
  $pdf->Rect(25,189,3,3,"DF");
  $pdf->Text(69,197,$T2["immatriculation"]);
}
if ($T2["transportparking"] == "parking") {
  $pdf->Rect(25,199,3,3,"DF");
}
if ($T2["transportmarche"] == "marche") {
  $pdf->Rect(25,204,3,3,"DF");
}


if ($T2["transporthebergement"] == "hebergement") {
  $pdf->Rect(110,213.5,3,3,"DF");
}

$pdf->Text(75,216.5,$T2["nuitees"]);
$pdf->Text(70,221,$T2["repas"]);
$pdf->Text(27,234,$T2["renseignements"]);
$pdf->Text(73,245,$T2["cout"]);

if (substr($T2["statut"],0,strlen("valid")) == "valid" || substr($T2["statut"],0,strlen("trait")) == "trait") {
  $pdf->SetFont('Arial','',8);
  $pdf->Text(100,261,$T2["mailequipe"]);
  if (file_exists("Images/Signature_".$T2["equipe"].".png")) {
    $pdf->Image("Images/Signature_".$T2["equipe"].".png",86,262,40,10);
  }
  if ($T2["typecredits"] == "1") {
    $pdf->Text(140,271,$T2["typecreditprojetresp"]);
  }
}






/*
$pdf->SetFont('Arial','',6);
for($i=10; $i<=210; $i+=40) {
  $pdf->Text($i,10,$i);
}
for($j=10; $j<=297; $j+=40) {
  $pdf->Text(10,$j,$j);
}


for($i=5; $i<=210; $i+=5) {
  for($j=5; $j<=297; $j+=5) {
    $pdf->Text($i,$j,".");
  }
}
*/

$pdf->Output();
/*
echo "<pre>";
print_r($T);
echo "</pre>";
*/

?>
