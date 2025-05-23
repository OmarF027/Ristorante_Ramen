<?php
// header.php
$currentPage = basename($_SERVER['PHP_SELF']);
$isHome = ($currentPage === 'index.php');
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>21OVEN | Pizzeria</title>

    <!-- Font e Icone -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet" />

    <!-- Fogli di stile -->
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/home.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/cards.css" />
    <link rel="stylesheet" href="css/ordina.css" />
    <link rel="stylesheet" href="css/contatti.css" />
    <link rel="stylesheet" href="css/mediaqueries.css" />
    
</head>
<body>
<header>
    <div class="logo">
        <a href="index.php" aria-label="Vai alla home">
            <img src="img/logo3.jpg" alt="Logo 21OVEN" />
        </a>
    </div>

    <div class="menu-toggle" id="menuToggle" aria-label="Apri menu" aria-expanded="false" aria-controls="main-navigation">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <nav class="navigation" id="main-navigation">
        <ul>
            <li><a href="<?php echo $isHome ? '#home' : 'index.php#home'; ?>">Home</a></li>
            <li><a href="menu.php">Menù</a></li>
            <li><a href="<?php echo $isHome ? '#ordina' : 'index.php#ordina'; ?>">Ordina</a></li>
            <li><a href="<?php echo $isHome ? '#contatti' : 'index.php#contatti'; ?>">Contatti</a></li>
            <li><a href="<?php echo $isHome ? '#lavora' : 'index.php#lavora'; ?>">Lavora con noi</a></li>
        </ul>
    </nav>
</header>

</body>
</html>

