<?php

$bejegyzesId = $_GET['id'] ?? null;

if ($bejegyzesId === null) {
    header('Location: index.php'); //átirányítás
    exit(); //leállítja a programot
}

$bejegyzesId = Bejegyzes::getById($bejegyzesId);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ujTartalom = $_POST['tartalom'] ?? '';
    $bejezes -> setTartalom($ujTartalom);
    // UPDATE...
    $bejezes -> mentes();
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Időjárás</title>
</head>
<body>
    <form method="POST"></form>
    <input type="text" name="" id="">
</body>
</html>