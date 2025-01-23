<?php global $tampon; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EtudiAppart</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" rel="stylesheet">
    <script type="text/javascript" src="./src/scripts/main.js"></script>
    <script
     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6OVk3KZS9TONu4GF8ALO2qFV1n588LPc&libraries=places" defer loading='async'>
    </script>
    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="stylesheet" href="./src/css/utilities.css">
</head>

<body>
    <?php


    include __DIR__ . '/header.php';
    ?>

    <?php
    if (isset($tampon)) {
        echo $tampon;
    } else {
        include __DIR__ . '/not-found.php';
    }
    ?>

    <?php

    include __DIR__ . '/footer.php';
    ?>
</body>

</html>