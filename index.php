<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>GOL D. RAMEN | Ristorante</title>

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
<div id="home" class="section" style="position: relative; padding: 180px 20px; text-align: center; color: #ffffff; overflow: hidden;">

  <!-- Video di sfondo responsive -->
  <video autoplay muted loop playsinline
         style="position: absolute; top: 50%; left: 50%; width: auto; height: 100%; min-width: 100%; min-height: 100%; transform: translate(-50%, -50%); object-fit: cover; z-index: -2;">
    <source src="video/ramen.mp4" type="video/mp4">
    Il tuo browser non supporta il video.
  </video>

  <!-- Overlay scuro per migliorare la leggibilità del testo -->
  <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.4); z-index: -1;"></div>

    <h1 class="section-title" style="margin: 0; display: inline-block; font-size: 3.5em;">
       <span class="highlight">GOL D. RAMEN</span>
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
        <strong>Il vero tesoro? Lo trovi qui!</strong> Un equilibrio perfetto tra tradizione giapponese e innovazione continua: ogni dettaglio del nostro ramen è pensato per sorprenderti.
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

<?php include('footer.php'); ?>

<script src="js/script.js"></script>
<script src="js/menu.js"></script>

</body>
</html>
