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
    <label for="AusgabeSys">In Welches System soll umgewandelt werden?</label><br>
    <input type="checkbox" id="nachbin">Binär<br>
    <input type="checkbox" id="nachdez">Dezimal<br>
    <input type="checkbox" id="nachhex">Hexadezimal<br>
    <input type="checkbox" id="nachokt">Oktal<br>
    <br>
    <input value="Berechnen" type="submit">
</form>
</body>
<p>test</p>
</html>

<?php
echo "Das Ergebnis beträgt: ";
$zahl1 = $_POST["eingabe"];    

$i = 0;
$zzw = $zahl1;
while ($zzw > 0) {
    $Rest = $zzw%2;
    $zzw = intdiv($zzw, 2);
    $Rechnebin[$i] = $Rest;
    $i = $i + 1;
}

$Ausgabebin = array_reverse($Rechnebin);
for($i = 0; $i < count($Ausgabebin); $i++) {
    echo $Ausgabebin[$i];
}


?>