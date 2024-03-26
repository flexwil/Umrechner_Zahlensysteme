<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale1.0">    
    <title>Umrechner</title>
</head>
<body>
<header> <h1>Dein Umrechner für Zahlensysteme</h1> </header>


<form action="berechnen.php" method="POST" >
    <label for="eingabe">Was möchtest du umrechnen?</label>
    <input type="text" id="eingabe" name="eingabe">
    <br>
    <br>
    <label for="EingabeSys">Aus welchem Zahlensystem kommt deine Eingabe?</label>
    <select id="EingabeSys" name="EingabeSys">
        <option value="dez">Dezimal</option>
        <option value="bin">Binär</option>
        <option value="okt">Oktal</option>
        <option value="hex">Hexadezimal</option>
    </select>
    <br>
    <br>
    <label for="AusgabeSys">In Welches System soll umgewandelt werden?</label><br>
    <input type="checkbox" name="nachbin">Binär<br>
    <input type="checkbox" name="nachdez">Dezimal<br>
    <input type="checkbox" name="nachokt">Oktal<br>
    <input type="checkbox" name="nachhex">Hexadezimal<br>
    <br>
    <input value="Berechnen" type="submit">
</form>
</body>
</html>

<?php
// Berechnung aus dem Dezimalsystem
function DezBerechnung($ZSystem, $zahl1, $Ausgabesys){
    $i = 0;
    $zzw = $zahl1;
    while ($zzw > 0) {
        $Rest = $zzw%$ZSystem;
        $zzw = intdiv($zzw, $ZSystem);
        $Rechne[$i] = $Rest;
        $i ++; 
    }
    $Ausgabe = array_reverse($Rechne);
    if ($ZSystem === 16){
        foreach ($Ausgabe as $key => $HexAusgabe){
            echo $zahl1." als ".$Ausgabesys." beträgt: ".Hex_Umwandlung($HexAusgabe);
        }
        echo "<br>";
    }
    else{        
        echo $zahl1." als ".$Ausgabesys." beträgt: ";
        for($i = 0; $i < count($Ausgabe); $i++) {
            echo $Ausgabe[$i];
        }
        echo "<br>";
    }   
}
// Array zur Umwandlung in Hexadezimal
function Hex_Umwandlung($Ausgabe){
    $HexArray = ["0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F"];
    return $HexArray[$Ausgabe];
}    

$zahl1 = $_POST["eingabe"];    
$zahl = 0;

// Eingabe Dezimal
if($_POST["EingabeSys"] === "dez"){
    // Umrechnung nach Binär
    if (isset($_POST["nachbin"])){
        $ZSystem = 2;
        $Ausgabesys = "Binärwert";
        DezBerechnung($ZSystem, $zahl1, $Ausgabesys);
    }

    // Umrechnung in Oktal
    if (isset($_POST["nachokt"])){
        $ZSystem = 8;
        $Ausgabesys = "Oktalwert";
        DezBerechnung($ZSystem,$zahl1, $Ausgabesys);
    }

    // Umrechnung in Hexadezimal
    if (isset($_POST["nachhex"])){
        $ZSystem = 16;
        $Ausgabesys = "Hexadezimalwert";
        DezBerechnung($ZSystem,$zahl1, $Ausgabesys);
    }
}

// Eingabe Binär
if($_POST["EingabeSys"] === "bin"){
    $bin = str_split($zahl1);
    $bin = array_reverse($bin);

    for($i = 0; $i < count($bin); $i++) {
        $zwischen = $bin[$i]*2**$i;
        echo $zwischen.", ";
        echo $zahl = $zahl+$zwischen;
        echo "<br>";
}

}
?>