<?php
$nimi = $_POST['nimi'];
define('DEBUG',true);

function debuggeri($arvo){
    if (defined('DEBUG') and !DEBUG) return;
    $msg = is_array($arvo) ? var_export($arvo,true) : $arvo; 
    $msg = date("Y-m-d H:i:s")." ".$msg;
    file_put_contents("debug_log.txt", $msg."\n", FILE_APPEND);
    }

function summa($luku1 = 0, $luku2 = 0, $luku3 = 0) {  
   $summaluku = $luku1 + $luku2 + $luku3;
   $nimi = $_POST['nimi'];
   return $summaluku;
}

function summaII(...$luvut) { 
   $summaluku = array_sum($luvut);
   return $summaluku;
}



echo "Hello World!<br>";
$i = 4;
switch ($i) {
    case 0:
        echo "i equals 0";
        break;
    case 1:
        echo "i equals 1";
        break;
    case 2:
        echo "i equals 2";
        break;
    default:
        echo "muu luku";
}

$z = isset($_POST['x']) ? $_POST['x'] : "1";
$y = $x ?: 'default';
$x = $_POST['x'] ?? 'default';

$taulukko = [2,3,4];
$s1 = summa(...$taulukko);
$s2 = summaII(3,2,$z);
//$s = summa(luku3:4);

echo "<br>summaI, x: $x,y: $y, z:$z, summa: $s1";
echo "<br>summaII, x: $x,y: $y, z:$z, summa: $s2";

echo '123 == "123" on '. (123 == "123") . ".<br>\n";
echo '123 != "123" on '. (123 != "123") . ".<br>\n";
echo '123 === "123" on '. (123 === "123") . ".<br>\n";
echo '123 !== "123" on '. (123 !== "123") . '.';


if ($sahkop == "") { 
    echo "<b>Sähköpostiosoite puuttuu!</b>";
  } elseif (strpos($sahkop, "@")) {
    echo $sahkop;
  } else {
    echo "<b>Sähköpostiosoite on virheellinen!</b>";
  }

  function map ($n){
    return $n + 1;
    }

  function viitteet($param, $taulukko) {
    $param = 'uusi parametrin arvo';
    $tulostaulukko = array_map('map',$taulukko);
    return $tulostaulukko;
  }

  $mja1 = 'muuttujan 1 vanha arvo';
  $mja2 = 'muuttujan 2 vanha arvo';
  $alkuhetki = microtime(true);
  $t = array_fill(0,10,0);
  $t = viitteet($mja1, $t);
  debuggeri($t);
  $kesto = round(microtime(true) - $alkuhetki,3) * 1000;
  
  echo "<br>Kesto: $kesto millisekuntia<br>";
  //phpinfo();

//kommentti
//Pamela




?>