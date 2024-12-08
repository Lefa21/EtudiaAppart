<?php global $tampon ?>
<!DOCTYPE html >
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EtudiAppart</title>
    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="stylesheet" href="./src/css/utilities.css">
</head>
<body>
    <header class="entete bg-color">
        <nav class="navigation-bar">
            <div class="container-logo"> 
                <a  href="index.php"><img src="./assets/logo.png" alt="Logo du site web"></a>
                <a class="etudiappart-title" href="">EtudiAppart</a> 
            </div>
            <ul>
                <li><a href="">A propos</a></li>
                <li><a href="">Déposer une annonce</a></li>
                <li><a href="">Connexion</a></li>
                <li><a  class="right" href="#">Inscription</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php echo $tampon; ?>
    </main>

    <footer>
        <p>&copy; 2024 EtudiAppart. All rights reserved.</p>
    </footer>
</body>
</html>
