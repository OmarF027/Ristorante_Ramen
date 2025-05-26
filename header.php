<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$isHome = ($currentPage === 'index.php');
?>
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
            <li><a href="<?php echo $isHome ? '#lavora' : 'index.php#lavora'; ?>" id="lavora-link">Lavora con noi</a></li>
        </ul>
    </nav>
</header>


