<?php
// Empêche la mise en cache
    header('Pragma: no-cache');
    header('Expires: 0');
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
    header('Cache-Control: no-cache, must-revalidate');
?>
<html>
<head>
  <title>Gestion de missions</title>
  <link rel="stylesheet" href="Modernist.css" type="text/css">
<script type="text/javascript">

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function Test(e) {
  if(e.preventDefault) e.preventDefault(); else e.returnValue = false;
  var aff="";
  var sf=false;
  if (! validateEmail(document.getElementById('email').value)) {
    document.getElementById('email').style.backgroundColor='rgb(255,100,100)';
    aff += "Vous devez saisir une adresse mail valide\n";
  }
  if (document.getElementById('priseencharge2').checked == true) {
    sf=true;
  }
  if (!sf && document.getElementById('typecredits1').checked == true && document.getElementById('typecreditprojet').value == "") {
    document.getElementById('typecreditprojet').style.backgroundColor='rgb(255,100,100)';
    aff+="Vous devez indiquer le nom du projet et fournir l'adresse mail du responsable de ces crédits s'il est différent du responsable d'équipe\n";
  }

  if (aff != "") alert(aff+'\n'); else document.getElementById('myform').submit();

}

function formateHeure(d) {
  if (d.indexOf('h') !== 0) {
    [h,m]=d.split('h');
    if (h.length == 1) h='0'+h;
    if (m.length == 1) m='0'+m;
    d=h+':'+m;
  }
  if (d.indexOf(':') !== 0) {
    [h,m]=d.split(':');
    if (h.length == 1) h='0'+h;
    if (m.length == 1) m='0'+m;
    d=h+':'+m;
  }

  return d;
}

function formateDate(d) {
  if (d.indexOf('/') !== 0) {
    [c1,c2,y] = d.split('/');
    if (c1.length == 1) c1 = '0' + c1;
    if (c2.length == 1) c2 = '0' + c2;
    if (y.length <4) y = '20' + y;
    d = y+'-'+c2+'-'+c1;
  }
  return d;
}

</script>
</head>

<body>
<h1 style="text-align: center;">Gestion des missions</h1>

<form id="myform" action="Traitement.php" method="post">
  <ul style="list-style-type: none;">

    <li><label for="equipe">Equipe :</label><input list="listequipes" type="text" name="equipe" id="equipe"/><label for="mailequipe">Responsable : </label><input list="listmailequipes" type="text" name="mailequipe" id="mailequipe" readonly placeholder="prenom.nom@ls2n.fr"/></li>
    <li><label for="assistant">Assistante (mail) chargée du traitement de la demande :</label><input list="listassistant" type="text" name="assistant" id="assistant" readonly placeholder="assistantsls2n-XXX@ls2n.fr"/></li>
    <li><label for="datedemande">Date de la demande :</label><input type="date" name="datedemande" id="datedemande"/></li>
    <li><label for="statut">Statut de la demande :</label><input type="text" style="background-color:red;" name="statut" id="statut" value="en cours" readonly/></li>
    <li><label for="nom">Nom :</label><input type="text" name="nom" id="nom"/></li>
    <li><label for="prenom">Prénom :</label><input type="text" name="prenom" id="prenom"/></li>
    <li><label for="email">email :</label><input type="text" name="email" id="email" placeholder="prenom.nom@ls2n.fr"/></li>
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
<td><input type="date" name="descdate1" id="descdate1" onfocusout="this.value=formateDate(this.value);"/></td>
<td><input type="text" name="descvilledep1" id="descvilledep1"/></td>
<td><input type="time" name="descheuredep1" id="descheuredep1" onfocusout="this.value=formateHeure(this.value);"/></td>
<td><input type="text" name="descvillearr1" id="descvillearr1"/></td>
<td><input type="time" name="descheurearr1" id="descheurearr1" onfocusout="this.value=formateHeure(this.value);"/></td>
    </tr>
    <tr>
<td><input type="date" name="descdate2" id="descdate2" onfocusout="this.value=formateDate(this.value);"/></td>
<td><input type="text" name="descvilledep2" id="descvilledep2"/></td>
<td><input type="time" name="descheuredep2" id="descheuredep2" onfocusout="this.value=formateHeure(this.value);"/></td>
<td><input type="text" name="descvillearr2" id="descvillearr2"/></td>
<td><input type="time" name="descheurearr2" id="descheurearr2" onfocusout="this.value=formateHeure(this.value);"/></td>
    </tr>
    <tr>
<td><input type="date" name="descdate3" id="descdate3" onfocusout="this.value=formateDate(this.value);"/></td>
<td><input type="text" name="descvilledep3" id="descvilledep3"/></td>
<td><input type="time" name="descheuredep3" id="descheuredep3" onfocusout="this.value=formateHeure(this.value);"/></td>
<td><input type="text" name="descvillearr3" id="descvillearr3"/></td>
<td><input type="time" name="descheurearr3" id="descheurearr3" onfocusout="this.value=formateHeure(this.value);"/></td>
    </tr>
    <tr>
<td><input type="date" name="descdate4" id="descdate4" onfocusout="this.value=formateDate(this.value);"/></td>
<td><input type="text" name="descvilledep4" id="descvilledep4"/></td>
<td><input type="time" name="descheuredep4" id="descheuredep4" onfocusout="this.value=formateHeure(this.value);"/></td>
<td><input type="text" name="descvillearr4" id="descvillearr4"/></td>
<td><input type="time" name="descheurearr4" id="descheurearr4" onfocusout="this.value=formateHeure(this.value);"/></td>
    </tr>


  </table></li>
<li><label for="prive">Séjour privé, préciser date(s) / heure(s) et lieu(x) : </label><input type="text" name="prive" id="prive"/></li>
  <li><dl><dt>Origine de crédits (uniquement pour les missions avec frais)</dt>
    <dd><input type="radio" id="originecredits1" name="originecredits" value="1"/>CNRS</dd>
    <dd><input type="radio" id="originecredits2" name="originecredits" value="2"/>Centrale Nantes</dd>
    <dd><input type="radio" id="originecredits3" name="originecredits" value="3"/>Centrale Innovation</dd>
    <dd><input type="radio" id="originecredits4" name="originecredits" value="4"/>Université de Nantes</dd>
    <dd><input type="radio" id="originecredits5" name="originecredits" value="5"/>Capacité</dd>
    <dd><input type="radio" id="originecredits6" name="originecredits" value="6"/>IMT-Atlantique</dd>
    <dd><input type="radio" id="originecredits7" name="originecredits" value="7"/>Armines</dd>
<dt>Type de crédits (uniquement pour les missions avec frais)</dt>
<dd><input type="radio" id="typecredits1" name="typecredits" value="1"/>Projet <input type="text" name="typecreditprojet" id="typecreditprojet"/>, mail du responsable des crédits : <input type="text" name="typecreditprojetresp" id="typecreditprojetresp" placeholder="prenom.nom@ls2n.fr"/></dd>
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
    <li><input type="submit" onclick="Test(event);" value="Envoyer"/><input type="reset" value="Effacer"/></li>
    <li style="display: none;"><label for="ACCESS">Access Token</label><input type="text" id="ACCESS" name="ACCESS"/></li>

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

<p>Liens utiles : <ul>
  <li><a href="https://havas-voyages-connect.com">Centrale de réservation Havas</a></li>
</ul>
</p>


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
            echo "   document.getElementById('".$cle."').value=\"".addslashes($valeur)."\";\n";
          }
        }
    }
    if ($T->statut=="attente validation") echo "   document.getElementById('statut').style.backgroundColor='orange';\n";
    if ($T->statut=="validée") echo "   document.getElementById('statut').style.backgroundColor='green';\n";
    if ($T->statut=="traitée") echo "   document.getElementById('statut').style.backgroundColor='blue';\n";

    if ($_GET["ADMIN"] == "12345") {
      echo "   document.getElementById('mailequipe').readOnly=false;\n";
      echo "   document.getElementById('assistant').readOnly=false;\n";
    }
    // Date de la demande
    echo "if (document.getElementById('datedemande').value == '') {\n var today = new Date(); var y=today.getFullYear(), m=today.getMonth()+1, d=today.getDate(); m=(m<10)?'0'+m:m; d=(d<10)?'0'+d:d; document.getElementById('datedemande').value = y+'-'+m+'-'+d;}";
    echo "}\n";
    echo "window.addEventListener('load',Init,true);\n</script>\n";
  } else {
  echo "<script>document.body.innerHTML='Erreur ! Votre code d\'accès n\'est pas valide. Vous pouvez vous connecter en utilisant le nom de votre équipe en majuscules (par exemple : ".$prefix."/?ACCESS=COMBI)';</script>";
}
}
 else {
  if ($_GET["ADMIN"] != "12345") {
    echo "<script>document.body.innerHTML=('Erreur ! Vous devez au vous connecter en précisant votre équipe (par exemple : ".$prefix."/?ACCESS=COMBI )');</script>";
  }
}
/*
echo "Envoi de mail";

mail("Jeremie.Bourdon@univ-nantes.fr","[MISSIONS] Test", "Essai de message");
*/


echo "<p><br/><br/><br/>Un problème avec votre mission ? <a href=\"mailto:Jeremie.Bourdon@ls2n.fr?subject=[Problème gestion mission] ACCESS=".$T->ACCESS."&body=Bonjour,%0D%0A%0D%0AJ'ai un problème avec la mission dont le code d'accès est%0D%0A".$T->ACCESS."%0D%0A%0D%0A[DEUX MOTS SUR LE PROBLÈME RENCONTRÉ ICI]%0D%0A%0D%0ACordialement\">Contactez-moi</a></p>";


?>
