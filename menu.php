<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>GOL D. RAMEN | Menù</title>

  <!-- Font e icone -->
  <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" />

  <!-- CSS -->
  <link rel="stylesheet" href="css/header.css" />
  <link rel="stylesheet" href="css/ordina.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="css/mediaqueries.css" />
  <link rel="stylesheet" href="css/menu.css" />
  
  <style>
    body {
      margin: 0;
      font-family: 'Kumbh Sans', sans-serif;
      background-color: #1a1a1a;
      color: #fff;
    }

@media (min-width: 1024px) {
    .navigation ul {
        gap: 40px !important;
    }
}

    .menu-page h1 {
      margin: 20px 0 10px !important;
      padding: 20px 0 10px !important;
      font-size: 2.8em;
      text-align: center;
      background-color: #ffffff;
      color: #000;
      text-transform: uppercase;
    }

    .menu-category {
      margin: 10px 0 10px !important;
      font-size: 1.8em;
      border-bottom: 2px solid #fff;
      padding-bottom: 5px;
      color: #000 !important;
    }

    .container {
      width: 90%;
      max-width: 1000px;
      margin: 0 auto !important;
      padding-top: 0 !important;
      padding-bottom: 50px;
    }

    .grid {
      display: grid !important;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)) !important;
      gap: 30px !important;
      padding: 20px 0 !important;
    }

    .item {
      background: #ffffff !important;
      padding: 25px !important;
      border-radius: 10px !important;
      transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease !important;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) !important;
      border: 1px solid #000000 !important;
      text-align: left !important;
      cursor: default !important;
      display: flex !important;
      flex-direction: column !important;
      color: #000000 !important; /* testo nero */
    }

    .item:hover {
      transform: translateY(-6px) scale(1.05) !important;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25) !important;
      border-color: #000 !important;
      filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0.1));
      cursor: pointer;
    }

    .item h4 {
      color: #000000 !important;
      margin: 0 0 8px 0 !important;
      font-size: 1.4em !important;
      padding: 0 !important;
    }

    .item p {
      font-size: 0.95em;
      margin: 0 0 10px;
      color: #000 !important; 
    }

    .item > div strong {
      color: #000000 !important; /* Prezzo */
    }

    .order-button-container {
      text-align: center;
      margin: 40px 0;
    }
</style>
</head>

<body class="menu-page">

  <?php include 'header.php'; ?>

  <h1>Il nostro Menù</h1>

  <section class="container" style="margin-top: -10px;">
  <h3 class="menu-category">Ramen Classici</h3>
  <div class="grid">
    <div class="item">
      <h4>Shoyu Ramen</h4>
      <p>Brodo di pollo chiaro aromatizzato con salsa di soia, noodles artigianali, uova marinata, cipollotto e nori</p>
      <div><strong>€12.00</strong></div>
    </div>
    <div class="item">
      <h4>Miso Ramen</h4>
      <p>Brodo ricco di maiale con pasta di miso, noodles spessi, maiale chashu, mais, burro e germogli di soia</p>
      <div><strong>€13.50</strong></div>
    </div>
    <div class="item">
      <h4>Tonkotsu Ramen</h4>
      <p>Brodo cremoso di ossa di maiale bollite per 18 ore, noodles sottili, maiale brasato, funghi shiitake e aglio croccante</p>
      <div><strong>€14.00</strong></div>
    </div>
  </div> <!-- chiudo grid classici -->

  <h3 class="menu-category">Ramen Speciali</h3>
  <div class="grid">
    <div class="item">
      <h4>Ramen Inferno</h4>
      <p>Brodo piccante con sesamo, pancetta croccante, uova marinata, bok choy e olio speziato</p>
      <div><strong>€ 15.00</strong></div>
    </div>
    <div class="item">
      <h4>Ramen Vegetariano</h4>
      <p>Brodo di verdure e shiitake, tofu fritto dorato, funghi misti saltati, spinaci freschi e uova di quaglia</p>
      <div><strong>€ 13.00</strong></div>
    </div>
    <div class="item">
      <h4>Ramen Mare</h4>
      <p>Brodo di pesce e alghe, noodles sottili, gamberi, vongole, calamari e salsa di ostriche</p>
      <div><strong>€ 16.00</strong></div>
    </div>
  </div> <!-- chiudo grid speciali -->

  <h3 class="menu-category">Extra</h3>
  <div class="grid">
    <div class="item">
      <h4>Extra Noodles</h4>
      <p>Aggiunta di noodles freschi</p>
      <div><strong>€ 3.00</strong></div>
    </div>
    <div class="item">
      <h4>Uova Ajitsuke</h4>
      <p>Uova marinate nella soia</p>
      <div><strong>€ 2.50</strong></div>
    </div>
    <div class="item">
      <h4>Chashu Extra</h4>
      <p>Fette aggiuntive di maiale brasato</p>
      <div><strong>€ 4.00</strong></div>
    </div>
  </div> <!-- chiudo extra -->

<h3 class="menu-category">Bevande</h3>
<div class="grid">
  <div class="item">
    <h4>Sake Caldo</h4>
    <div><strong>€ 6.00</strong></div>
  </div>
  <div class="item">
    <h4>Sake Freddo</h4>
    <div><strong>€ 7.00</strong></div>
  </div>
  <div class="item">
    <h4>Tè Verde Sencha</h4>
    <div><strong>€ 3.50</strong></div>
  </div>
  <div class="item">
    <h4>Oolong Tea</h4>
    <div><strong>€ 3.50</strong></div>
  </div>
  <div class="item">
    <h4>Birra Asahi</h4>
    <div><strong>€ 5.00</strong></div>
  </div>
  <div class="item">
    <h4>Birra Sapporo</h4>
    <div><strong>€ 5.50</strong></div>
  </div>
  <div class="item">
    <h4>Birra Kirin</h4>
    <div><strong>€ 5.00</strong></div>
  </div>
  <div class="item">
    <h4>Coca-Cola</h4>
    <div><strong>€ 3.00</strong></div>
  </div>
  <div class="item">
    <h4>Fanta</h4>
    <div><strong>€ 3.00</strong></div>
  </div>
  <div class="item">
    <h4>Sprite</h4>
    <div><strong>€ 3.00</strong></div>
  </div>
  <div class="item">
    <h4>Acqua Naturale</h4>
    <div><strong>€ 1.50</strong></div>
  </div>
  <div class="item">
    <h4>Acqua Frizzante</h4>
    <div><strong>€ 1.50</strong></div>
  </div>
</div>

</section>

  <div class="order-button-container">
    <a href="https://glovoapp.com/it/it/grosseto/" target="_blank" class="order-button">
      <span style="position: relative; z-index: 2;">ORDINA CON GLOVO</span>
      <span class="hover-effect"></span>
    </a>
  </div>

  <?php include 'footer.php'; ?>

  <script src="js/script.js"></script>
  <script src="js/menu.js"></script>
</body>
</html>