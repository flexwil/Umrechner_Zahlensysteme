<?php
function Hex_Umwandlung($Ausgabe){
    $HexArray = ["0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F"];
    return $HexArray[$Ausgabe];
}   

$Ausgabe = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];

foreach ($Ausgabe as $key => $HexAusgabe){
    echo Hex_Umwandlung($HexAusgabe);
}

?>

