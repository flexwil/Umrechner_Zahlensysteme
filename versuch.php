


<?php
// function Hex_Umwandlung($Ausgabe){
//     $HexArray = ["0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F"];
//     return $HexArray[$Ausgabe];
// }   

// $Ausgabe = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];

// foreach ($Ausgabe as $key => $HexAusgabe){
//     echo Hex_Umwandlung($HexAusgabe);
// }
// $i=0;
// $bin = [1,1,1,1,1,1,0,1];
// $bin = array_reverse($bin);
// $test = [];
// $test += $bin[0];
// $ziel = []
// $ziel += $test;
// $zahl=0;
// $test = array_chunk($bin,3);
// $okt = array_chunk($bin,3);
// $okt = array_reverse($okt);
// foreach($okt as $v1){
//     foreach($v1 as $v2){
    //     $zwischen = $v2*2**$i;
    //     $zahl += $zwischen;

    //     $i++;

        // for($i = 0; $i < count($okt); $i++) {
        //     for($j=0; $j < count($okt[$i]); $j++){
                // echo "i: ".$i." , j: ".$j." , Wert: ".$okt[$i][$j];
                // $help = 1*2**$j;
                // echo " , binär: ".$help;
                // $zwischen = $okt[$i][$j]*2**$j;
                // echo " , zwischen: ".$zwischen.", ";
        //         $zahl = $zahl+$zwischen;
        // }
        // echo $zahl;
        // $zahl=0;

        // }    
    // echo $zahl;
// }

function convertBase($number, $fromBase, $toBase) {
    $digits = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
    // Umrechnung in Dezimal
    $decimalValue = 0;
    $number = strtoupper($number);
    for ($i = 0; $i < strlen($number); $i++) {
        $digit = strpos($digits, $number[$i]);
        $decimalValue = $decimalValue * $fromBase + $digit;
    }

    // Umrechnung von Dezimal in die gewünschte Basis
    $result = '';
    while ($decimalValue > 0) {
        $remainder = $decimalValue % $toBase;
        $result = $digits[$remainder] . $result;
        $decimalValue = intval($decimalValue / $toBase);
    }

    return $result;
}

// Test
$number = '4'; // Hexadezimalwert
$fromBase = 5; // Hexadezimal
$toBase = 16;    // Binär

echo convertBase($number, $fromBase, $toBase); // Ausgabe: 11111111





?>

