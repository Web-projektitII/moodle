<!DOCTYPE html>
<html>
<head>
<title>Kertotaulu</title>
<link rel="stylesheet" href="site.css">
</head>
<body></body>
<?php

$paakaupungit = array( "Italia"=>"Rooma", 
    "Tanska"=>"Kööpenhamina", 
    "Suomi"=>"Helsinki", 
    "Ranska" => "Pariisi", 
    "Saksa" => "Berliini", 
    "Kreikka" => "Ateena", 
    "Irlanti"=>"Dublin", 
    "Hollanti"=>"Amsterdam", 
    "Espanja"=>"Madrid", 
    "Ruotsi"=>"Tukholma", 
    "Iso-Britannia"=>"Lontoo", 
    "Viro"=>"Tallinna", 
    "Unkari"=>"Budapest", 
    "Itävalta" => "Vienna", 
    "Puola"=>"Varsova") ;

function kaupungit($kaupungit,$haku = ""){
    ksort($kaupungit);
    foreach ($kaupungit as $maa => $paakaupunki){
    echo "$maa: $paakaupunki<br>";
    }    
    $loytyi = ($haku) ? array_search($haku,$kaupungit) : false; 
    return ($loytyi) ?: "$haku ei löytynyt";
   }

function  summaTaulukosta($taulukko){
   return array_sum($taulukko);
}
 

function shakkilauta(){
    echo "<h1>Shakkilauta</h1>";
    echo "<table>";
    for($rivi = 8; $rivi > 0; $rivi--) {
        $pariton_rivi = $rivi % 2;
        echo "<tr>";
        for($sarake = 1; $sarake <= 8; $sarake++) {
            // tulosta parillisten rivien parilliset solut ja parittomien rivien parittomat solut valkoisiksi, muut mustiksi
            $pariton = ($rivi + $sarake) % 2;
            $vari = ($pariton) ? "valkoinen" : "musta"; 
            echo "<td class='$vari'></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

echo "<h1>Summa</h1>";
echo "summa: ".summaTaulukosta([3,4,5])."<br>";

echo "<h1>Pääkaupungit</h1>";
$tulos = kaupungit($paakaupungit,"Tallinna");
echo "<p>Hakutulos: $tulos</p>";

echo "<h1>Kertotaulu</h1>";
echo "<table>";
for ($i = 1;$i <= 10;$i++){
    echo "<tr>";
    for ($j = 1;$j <= 10;$j++){
        echo "<td>".$i*$j."</td>";
    }
    echo "</tr>\n";
 }

echo "</table>";

shakkilauta();
?>
</body>
</html>