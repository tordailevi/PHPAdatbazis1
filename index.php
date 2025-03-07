<?php
    include_once "AB.php";
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MagyarKártya</title>
</head>
<body>
    <?php
        $adatbazis = new AB();
    if ($adatbazis->meret("kartya") == 0) {
        $adatbazis->feltoltes("kartya", "szAzon", "formaAzon");
    }

    $matrix = $adatbazis->oszlopLeker("kep", "szin");
    $adatbazis->megjelenit($matrix);

    $adatbazis->bezar();

    ?>
</body>
</html>