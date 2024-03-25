<html>
<head><title>Umrechner</title></head>
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

$zahl1 = $_POST["eingabe"];    
$i = 0;
$zahl = 0;

// Eingabe Dezimal
if($_POST["EingabeSys"] === "dez"){

    // Umrechnung nach Binär
    if (isset($_POST["nachbin"])){
        $zzw = $zahl1;
        while ($zzw > 0) {
            $Rest = $zzw%2;
            $zzw = intdiv($zzw, 2);
            $Rechnebin[$i] = $Rest;
            $i = $i + 1;
        }

        $Ausgabebin = array_reverse($Rechnebin);
        echo $zahl1." als Binärzahl beträgt: ";
        for($i = 0; $i < count($Ausgabebin); $i++) {
            echo $Ausgabebin[$i];
        }
        echo "<br>";
    }

    // Umrechnung in Oktal
    if (isset($_POST["nachokt"])){
        $zzw = $zahl1;
        while ($zzw > 0) {
            $Rest = $zzw%8;
            $zzw = intdiv($zzw, 8);
            $Rechneokt[$i] = $Rest;
            $i = $i + 1;
        }

        $Ausgabeokt = array_reverse($Rechneokt);
        echo $zahl1." als Oktalzahl beträgt: ";
        for($i = 0; $i < count($Ausgabeokt); $i++) {
            echo $Ausgabeokt[$i];
        }
        echo "<br>";
    }

    // Umrechnung in Hexadezimal
    if (isset($_POST["nachhex"])){
        $zzw = $zahl1;
        while ($zzw > 0) {
            $Rest = $zzw%16;
            $zzw = intdiv($zzw, 16);
            $Rechnehex[$i] = $Rest;
            $i = $i + 1;
        }

        $Ausgabehex = array_reverse($Rechnehex);
        echo $zahl1." als Hexadezimal beträgt: ";
        for($i = 0; $i < count($Ausgabehex); $i++) {
            switch ($Ausgabehex[$i]){
                case 10:
                    echo "A";
                    break;
                case 11:
                    echo "B";
                    break;
                case 12:
                    echo "C";
                    break;
                case 13:
                    echo "D";
                    break;
                case 14:
                    echo "E";
                    break;
                case 15:
                    echo "F";
                    break;            
                default:
                    echo $Ausgabehex[$i];
            }    
        }
        echo "<br>";
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