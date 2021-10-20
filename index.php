<?php
require_once "db.php";
require_once "Idojaras.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ujDatum = $_POST['datum'] ?? null;
    $ujNumber = $_POST['szam'] ?? null;
    $ujSzoveg = $_POST['szoveg'] ?? null;
    if ($ujNumber !== null && $ujSzoveg !== null) {
        $ujIdojaras = new Idojaras(new DateTime($ujDatum), (int)$ujNumber, $ujSzoveg);
    
        $ujIdojaras -> hozzaad();
    }
}

$lista = Idojaras::beolvas();

?><!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Időjárás</title>
</head>
<body>
    <form method="POST">
        <input type="date" name="datum"><br>
        <input type="number" name="szam"><br>
        <input type="text" name="szoveg"><br>
        <input type="submit" value="Küldés">
    </form>
    <div>
        <?php
        foreach ($lista as $e) {
            echo $e -> getDatum() -> format('Y-m-d') . " " . $e -> getHofok() . " " . $e -> getLeiras() . "<br>";
        }
        ?>
    </div>
</body>
</html>