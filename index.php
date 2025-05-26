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
    <link rel="stylesheet" href="css/lavora.css" />
    <link rel="stylesheet" href="css/mediaqueries.css" />
</head>
<body>

<?php include('header.php'); ?>

<!-- Sezione Home -->
<div id="home" class="section" style="position: relative; padding: 180px 20px; text-align: center; background: url('img/pizza8.jpg') no-repeat center center; background-size: cover; color: #ffffff;">
    <!-- Overlay scuro per migliorare la leggibilità del testo -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.4);"></div>

    <h1 class="section-title" style="margin: 0; display: inline-block; font-size: 3.5em;">
       <span class="highlight">21OVEN</span>
    </h1>
    
    <p style="max-width: 800px;
           margin: 20px auto;
           font-size: 2.2em;
           line-height: 1.6;
           color: #ffffff;
           padding: 15px 0;
           opacity: 0;
           animation: fadeInUp 0.8s ease-out forwards;
           animation-delay: 0.4s;
           text-align: left;
           display: block;">
        <strong>Acqua, lievito, farina e sale</strong>: gli ingredienti in cui crediamo. Il nostro impasto, con <strong>farina 00</strong>, è <strong>idratato al 70%</strong> e <strong>lievitato 48 ore</strong> per leggerezza e alta digeribilità.
    </p>
</div>

<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<?php include('cards.php'); ?>

<div style="border-bottom: 3px solid #dcdcdc;"></div>

<?php include('ordina.php'); ?>

<div style="border-bottom: 3px solid #dcdcdc;"></div>

<?php include('contatti.php'); ?>

<div style="border-bottom: 3px solid #dcdcdc;"></div>

<?php include('lavora.php'); ?>

<style>
    .whatsapp-icon {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #25D366;
        color: white;
        padding: 15px 18px;
        border-radius: 50%;
        box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        z-index: 1000;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 28px;
        line-height: 1;
    }
    .whatsapp-icon:hover {
        transform: scale(1.1) rotate(15deg);
        background-color: #128C7E;
        box-shadow: 0 6px 12px rgba(0,0,0,0.4);
    }
    
    @media (max-width: 768px) {
        .whatsapp-icon {
            bottom: 15px;
            right: 15px;
            padding: 12px 15px;
            font-size: 24px;
        }
    }
</style>

<a href="https://wa.me/39123456789" class="whatsapp-icon" target="_blank" rel="noopener noreferrer">
    <i class="fab fa-whatsapp"></i>
</a>

<?php include('footer.php'); ?>

<script src="js/script.js"></script>
<script src="js/menu.js"></script>

</body>
</html>
