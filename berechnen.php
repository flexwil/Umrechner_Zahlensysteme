<html>
<head><title>Umrechner</title></head>
<body>
<header> <h1>Dein Umrechner für Zahlensysteme</h1> </header>


<form action="berechnen.php" method="POST" >
    <label for="eingabe">Was möchtest du umrechnen?</label>
    <input type="text" id="eingabe" name="eingabe">
    <br>
    <br>
    <label for="EingabeSys">Zahl 2</label>
    <select id="EingabeSys" name="EingabeSys">
        <option value="bin">Binär</option>
        <option value="dez">Dezimal</option>
        <option value="hex">Hexadezimal</option>
        <option value="okt">Oktal</option>
    </select>
    <br>
    <br>
    <label for="AusgabeSys">In Welches System soll umgewandelt werden?</label>
    <input type="checkbox" id="nachbin">Binär<br>
    <input type="checkbox" id="nachdez">Dezimal<br>
    <input type="checkbox" id="nachhex">Hexadezimal<br>
    <input type="checkbox" id="nachokt">Oktal<br>
    <br>
    <input value="Berechnen" type="submit">
</form>
</body>
</html>

<?php
echo "Das Ergebnis beträgt: ";
$zahl1 = $_POST["eingabe"];    
$zahl2 = $_POST["EingabeSys"];

do {
    $zzw = intdiv($zahl1, 2);
    $zm = $zahl1%2;
}


$zzw = intdiv($zahl1, 2);
$zm = $zahl1%2;

$Ausgabebin = array();


echo $zzw . "<br>";
echo $zm;
?>