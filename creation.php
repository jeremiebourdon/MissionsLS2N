<html>
<head>
  <title>Gestion de missions</title>
  <link rel="stylesheet" href="Modernist.css" type="text/css">
</head>

<body>
<h1 style="text-align: center;">Gestion des missions</h1>
<h1 style="text-align: center;">Creation de fiche</h1>

<form  action="TraitementCreer.php" method="post">
  <ul style="list-style-type: none;">

    <li><label for="equipe">Equipe :</label><input list="listequipes" type="text" name="equipe" id="equipe"/><label for="mailequipe">Responsable : </label><input list="listmailequipes" type="text" name="mailequipe" id="mailequipe"/></li>
    <li><label for="assistant">Assistante (mail) chargée du traitement de la demande :</label><input list="listassistant" type="text" name="assistant" id="assistant"/></li>
    <li><label for="datedemande">Date de la demande :</label><input type="date" name="datedemande" id="datedemande"/></li>
    <li><label for="statut">Statut de la demande :</label><input type="text" style="background-color:red;" name="statut" id="statut" value="en cours" readonly/></li>
    <li><label for="nom">Nom :</label><input type="text" name="nom" id="nom"/></li>
    <li><label for="prenom">Prénom :</label><input type="text" name="prenom" id="prenom"/></li>
    <li><label for="email">email :</label><input type="text" name="email" id="email"/></li>
    <li><label for="employeur">Employeur :</label><input list="listemployeur" type="text" name="employeur" id="employeur"/></li>
    <li><label for="grade">Grade/fonction :</label><input list="listgrade" type="text" name="grade" id="grade"/></li>
    <li><input type="radio" id="priseencharge1" name="priseencharge" value="1"/>Mission prise en charge en TOTALITE sur les CREDITS DE L’UNITE</li>
    <li><input type="radio" name="priseencharge" id="priseencharge2" value="2"/>Mission SANS FRAIS : préciser l’organisme prenant en charge les frais :
      <input type="text" name="priseenchargesansfrais" id="priseenchargesansfrais"/></li>
    <li><input type="radio" name="priseencharge" id="priseencharge3" value="3"/>Mission prise en charge PARTIELLEMENT : préciser l’organisme qui complète la prise en charge des frais :
      <input type="text" name="priseenchargepartiel" id="priseenchargepartiel"/></li>
<li><label for="objet">Objet du déplacement :</label><input type="text" name="objet" id="objet"/></li>
<li>Description du déplacement
  <table border=1 width="80%">
    <tr>
<th>Dates départ/retour</th>
<th>Ville départ</th>
<th>Heure départ</th>
<th>Ville arrivée</th>
<th>Heure arrivée</th>
    </tr>
    <tr>
<td><input type="date" name="descdate1" id="descdate1"/></td>
<td><input type="text" name="descvilledep1" id="descvilledep1"/></td>
<td><input type="time" name="descheuredep1" id="descheuredep1"/></td>
<td><input type="text" name="descvillearr1" id="descvillearr1"/></td>
<td><input type="time" name="descheurearr1" id="descheurearr1"/></td>
    </tr>
    <tr>
<td><input type="date" name="descdate2" id="descdate2"/></td>
<td><input type="text" name="descvilledep2" id="descvilledep2"/></td>
<td><input type="time" name="descheuredep2" id="descheuredep2"/></td>
<td><input type="text" name="descvillearr2" id="descvillearr2"/></td>
<td><input type="time" name="descheurearr2" id="descheurearr2"/></td>
    </tr>
    <tr>
<td><input type="date" name="descdate3" id="descdate3"/></td>
<td><input type="text" name="descvilledep3" id="descvilledep3"/></td>
<td><input type="time" name="descheuredep3" id="descheuredep3"/></td>
<td><input type="text" name="descvillearr3" id="descvillearr3"/></td>
<td><input type="time" name="descheurearr3" id="descheurearr3"/></td>
    </tr>
    <tr>
<td><input type="date" name="descdate4" id="descdate4"/></td>
<td><input type="text" name="descvilledep4" id="descvilledep4"/></td>
<td><input type="time" name="descheuredep4" id="descheuredep4"/></td>
<td><input type="text" name="descvillearr4" id="descvillearr4"/></td>
<td><input type="time" name="descheurearr4" id="descheurearr4"/></td>
    </tr>


  </table></li>

  <li><label for="prive">Séjour privé, préciser date(s) / heure(s) et lieu(x) : </label><input type="text" name="prive" id="prive"/></li>
  <li><dl><dt>Origine de crédits</dt>
    <dd><input type="radio" id="originecredits1" name="originecredits" value="1"/>CNRS</dd>
    <dd><input type="radio" id="originecredits2" name="originecredits" value="2"/>Centrale Nantes</dd>
    <dd><input type="radio" id="originecredits3" name="originecredits" value="3"/>Centrale Innovation</dd>
    <dd><input type="radio" id="originecredits4" name="originecredits" value="4"/>Université de Nantes</dd>
    <dd><input type="radio" id="originecredits5" name="originecredits" value="5"/>Capacité</dd>
    <dd><input type="radio" id="originecredits6" name="originecredits" value="6"/>IMT-Atlantique</dd>
    <dd><input type="radio" id="originecredits7" name="originecredits" value="7"/>Armines</dd>
<dt>Type de crédits</dt>
<dd><input type="radio" id="typecredits1" name="typecredits" value="1"/>Projet <input type="text" name="typecreditprojet" id="typecreditprojet"/>, mail du responsable des crédits : <input type="text" name="typecreditprojetresp" id="typecreditprojetresp"/></dd>
<dd><input type="radio" id="typecredits2" name="typecredits" value="2"/>Dotation équipe/service <input type="text" name="typecreditequipe" id="typecreditequipe"/></dd>
<dd><input type="radio" id="typecredits3" name="typecredits" value="3"/>Ressources Propres Banalisées équipe/service <input type="text" name="typecreditressources" id="typecreditressources"/></dd>
</dl>
</li>

<li><input type="checkbox" id="transportinscription" name="transportinscription" value="inscription"/>Droits d’inscription (joindre le programme préliminaire, le formulaire d’inscription et la demande d’achat)</li>
<li><dl><dt>Moyens de transport</dt>
  <dd><input type="checkbox" id="transporttrain" name="transporttrain" value="train"/>Train</dd>
  <dd><input type="checkbox" id="transportavion" name="transportavion" value="avion"/>Avion</dd>
  <dd><input type="checkbox" id="transportcommun" name="transportcommun" value="commun"/>Transports en commun</dd>
  <dd><input type="checkbox" id="transportlocation" name="transportlocation" value="location"/>Véhicule de location</dd>
  <dd><input type="checkbox" id="transportpersonnel" name="transportpersonnel" value="personnel"/>Véhicule personnel (joindre une demande d’autorisation d’utilisation de véhicule personnel + permis de conduire + copie carte grise et police d’assurance)</dd>
  <dd><input type="checkbox" id="transportadministratif" name="transportadministratif" value="admonistratif"/>Véhicule administratif (joindre la demande d’utilisation de véhicule de service + permis de conduire)<br/>
  <label for="immatriculation">N° immatriculation :</label><input type="text" id="immatriculation" name="immatriculation"/></dd>
  <dd><input type="checkbox" id="transportparking" name="transportparking" value="parking"/>Frais de parking (limité à 72h)</dd>
  <dd><input type="checkbox" id="transportmarche" name="transportmarche" value="marche"/>Marché Transport (obligatoire pour CNRS, UN, CN, et IMT-A)</dd>
<dt>Hébergement/Repas :</dt>
<dd><input type="checkbox" id="transporthebergement" name="transporthebergement" value="hebergement"/>Marché Hébergement (obligatoire pour CNRS)</dd>
<dd><label for="nuitees">Nombre de nuitées payantes :</label><input type="text" id="nuitees" name="nuitees"/></dd>
<dd><label for="repas">Nombre de repas payants :</label><input type="text" id="repas" name="repas"/></dd>
<dd><label for="renseignements">Renseignements utiles (nuits ou repas gratuits, …) :</label><input type="text" id="renseignements" name="renseignements"/></dd>
<dd><label for="cout">Coût estimatif de la mission :</label><input type="text" id="cout" name="cout"/></dd>
</dl>
</li>
    <li><input type="submit" value="Creation"/></li>
    <li><label for="ACCESS">Clé d'accès (ACCESS)</label><input type="text" id="ACCESS" name="ACCESS"/></li>
</ul>

<datalist id="listequipes">
  <option value="ComBi">
  <option value="Aelos">
  <option value="Autre">
</datalist>

<datalist id="listassistant">
  <option value="assistantsls2n-fst@univ-nantes.fr">
</datalist>

<datalist id="listmailequipes">
  <option value="Jeremie.Bourdon@ls2n.fr">
  <option value="Christian.Attiogbe@ls2n.fr">
</datalist>


<datalist id="listemployeur">
  <option value="Université de Nantes">
  <option value="CNRS">
  <option value="Centrale Nantes">
  <option value="CHU">
  <option value="Autre">
</datalist>

<datalist id="listgrade">
  <option value="Maître de conférences">
  <option value="Professeur des Universités">
  <option value="Directeur de recherches">
  <option value="Chargé de recherches">
  <option value="Doctorant">
  <option value="Post-doctorant">
  <option value="Ingénieur">
  <option value="Autre">
</datalist>

</form>

</body>
</html>


<?php
include "config.php";

if ($_GET["ACCESS"] != "") {
  $Token = $_GET["ACCESS"];
  $filename="Data/Mission_".$Token;
  if (file_exists($filename)) {
    $fd=fopen($filename,"r");
    $T=json_decode(fgets($fd,4096));
    fclose($fd);
    echo "<script type=\"text/javascript\">\nfunction Init() {\n";
    foreach($T as $cle=>$valeur) {
      if ($cle == "priseencharge" || $cle == "originecredits" || $cle == "typecredits") {
        echo "   if (document.getElementById('".$cle.$valeur."') != null) document.getElementById('".$cle.$valeur."').checked=true;\n";
      } else {
          if (substr($cle,0,strlen("transport")) == "transport") {
            echo "   document.getElementById('transport".$valeur."').checked=true;\n";
          } else {
            echo "   document.getElementById('".$cle."').value=\"".$valeur."\";\n";
          }
        }
    }
    if ($T->statut=="attente validation") echo "   document.getElementById('statut').style.backgroundColor='orange';\n";
    if ($T->statut=="validée") echo "   document.getElementById('statut').style.backgroundColor='green';\n";
    if ($T->statut=="traitée") echo "   document.getElementById('statut').style.backgroundColor='blue';\n";

    echo "}\n window.addEventListener('load',Init,true);\n</script>\n";
  }
}
/*
echo "Envoi de mail";

mail("Jeremie.Bourdon@univ-nantes.fr","[MISSIONS] Test", "Essai de message");
*/


?>
