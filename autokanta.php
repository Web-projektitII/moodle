<?php
$tunnukset = "../../../tunnukset.php";
if (file_exists($tunnukset)) include($tunnukset);
else {
  die ("Tietokantayhteys ei toimi.<br>"); 
  }
$palvelin = "localhost";
$kayttaja = $db_kayttajatunnus;  
$salasana = $db_salasana;
$tietokanta = "autokanta";

function db_connect(){
static $yhteys;
if (!$yhteys) {
    $yhteys = new mysqli(
        $GLOBALS['palvelin'], $GLOBALS['kayttaja'], 
        $GLOBALS['salasana'], $GLOBALS['tietokanta']);
}
if ($yhteys->connect_error) {
   die("<br>Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
}
return $yhteys;
}

function mysql_kysely($query){    
$yhteys = db_connect();
//$yhteys = $GLOBALS['yhteys'];
try {
    $result = $yhteys->query($query);
    if (!$result) throw new Exception("Queryn result on false: ".$yhteys->error);
    else {
        //$vaikutti = $yhteys->affected_rows;
        //echo "Vaikutti $vaikutti riviin.<br>";    
        return $result;
        }
    } 
catch (Exception $e) {
    //debuggeri('<br>Virhe: ' .  $e->getMessage());
    echo 'Virhe: '. $e->getMessage() . '<br>';
    return false;
    }
}

// $yhteys = new mysqli($palvelin, $kayttaja, $salasana, $tietokanta);
// if ($yhteys->connect_error) {
//   die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
// }
// $yhteys->set_charset("utf8");
$yhteys = db_connect();
$query = "SELECT * FROM auto";
$result = $yhteys->query($query);
if ($result->num_rows > 0) {
   while($row = $result->fetch_array(MYSQLI_ASSOC)) {
      echo "Rekisterinumero: " . $row["rekisterinro"]. " - Merkki: " . $row["merkki"]. " - Väri: " . $row["vari"]. "<br>";
    }
} else {
   echo "Ei tuloksia";
}

$query = "INSERT INTO henkilo (hetu,nimi,osoite,puhelinnumero) VALUES
            ('080173-169T','Matti Miettinen','Koivukuja 25','358401842950'),
            ('120760-093B','Tapio Tamminen','Tammistontie 18','358400576397'),
            ('200292-195H','Teemu Tamminen','Tammistontie 18','358409740768')";
if (mysql_kysely($query)){
    $lisatty = $yhteys->affected_rows;
    echo "Lisätty $lisatty henkilöä.<br>";
    }
else echo "Henkilöä ei Lisätty.<br>";   

$query = "DELETE FROM henkilo WHERE hetu = '281182-070W'";
/* try {
    $result = $yhteys->query($query);
    if (!$result) throw new Exception("Queryn result on false: ".$yhteys->error);
    } 
catch (Exception $e) {
    //debuggeri('Virhe: ' .  $e->getMessage());
    echo 'Virhe: auton omistajaa ei voi poistaa.';
    }*/
if (mysql_kysely($query)){    
    $poistettu = $yhteys->affected_rows;
    echo "Poistettu $poistettu henkilöä.<br>";     
    }
else echo "Henkilöä ei poistettu.<br>";       

$query = "INSERT INTO henkilo (hetu,nimi,osoite,puhelinnumero) VALUES
            ('080173-168T','Teemu Tamminen','Koivukuja 25','358401842950')";
if (mysql_kysely($query)){
    $lisatty = $yhteys->affected_rows;
    echo "Lisätty $lisatty henkilöä.<br>";
    }
else echo "Henkilöä ei Lisätty.<br>";   

?>

