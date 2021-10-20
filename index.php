<?php
require_once "db.php";
require_once "Idojaras.php";

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
        <input type="date"><br>
        <input type="number"><br>
        <input type="text"><br>
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