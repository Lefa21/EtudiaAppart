<?php global $tampon; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EtudiAppart</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" rel="stylesheet">
    <script type="text/javascript" src="./src/scripts/main.js"></script>
    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="stylesheet" href="./src/css/utilities.css">
</head>

<body>
    <?php

    include __DIR__ . '/header.php';
    ?>

    <main>
        <?php echo $tampon; ?>
    </main>

    <footer>
        <p>&copy; 2024 EtudiAppart. All rights reserved.</p>
    </footer>
</body>

</html>
