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
    <input value="Berechnen" type="submit">
</form>
</body>
</html>

<?php
// Umwandlung Eingabewerte in Dezimal
function convertToDecimal($input, $baseinput){
    $decimal = 0;
    $reverseInput = array_reverse(str_split($input));
    for($i = 0; $i < count($reverseInput); $i++) {
        $interim = $reverseInput[$i]*$baseinput**$i;
        $decimal += $interim;
    }
    return $decimal;
}
// Umwandlung der Dezimalzahl in andere Zahlensysteme
function convertFromDecimal($decimal, $base){
        $result = [];
        while ($decimal > 0) {
            $result[] = $decimal%$base;
            $decimal = intdiv($decimal, $base);           
        }
        $result = array_reverse($result);
        if($base === 16) {return convertToHexa($result);}
        else {return $result;}
    }

// Array zur Umwandlung in Hexadezimal
function convertToHexa($result){
    $hexaArray = ["0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F"];
    $convertedToHexa = [];
    $i = 0;
    foreach ($result as $key => $hexaValue){
        $convertedToHexa[$i] = $hexaArray[$hexaValue];
        $i++;
    }
    return $convertedToHexa;
}    
// Array für Basis der Zahlensysteme
$numberSystems = [
    "bin" => 2,
    "okt" => 8,
    "dez" => 10,
    "hex" => 16,
];

//Eingabeverarbeitung
if (isset($_POST["eingabe"]) && isset($_POST["EingabeSys"])) {
    $input = $_POST["eingabe"];
    $inputSystem = $_POST["EingabeSys"];
    $baseinput = $numberSystems[$inputSystem];
    if($baseinput !== "dez"){
        if($baseinput === "hex"){
            
        }
        $convertedDecimal = convertToDecimal($input, $baseinput);
    }

    foreach($numberSystems as $system => $base){
        $output = convertFromDecimal($convertedDecimal, $base);
            echo $input." als ".$system." beträgt: ".implode("",$output)."<br>";    
    }
   }
      
?>
