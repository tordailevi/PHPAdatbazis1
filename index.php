<?php
    include_once "AB.php";
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MagyarKártya</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $adatbazis = new AB();
    if ($adatbazis->meret("kartya") == 0) {
        $adatbazis->feltoltes("kartya", "szAzon", "formaAzon");
    }

    //matrix objektum
    //$matrix = $adatbazis->oszlopLeker("kep", "szin");
    //$matrix = $adatbazis->oszlopLeker("nev", "szin");
    //$adatbazis->megjelenit($matrix);

    //$matrix = $adatbazis->oszlopLeker("kep", "szin");
    $matrix = $adatbazis->oszlopLeker2("kep", "nev", "szin");


    $adatbazis->megjelenito2($matrix);







    $adatbazis->bezar();
    ?>
</body>
</html>