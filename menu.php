<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>21OVEN | Menù</title>

  <!-- Font e icone -->
  <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" />

  <!-- CSS -->
  <link rel="stylesheet" href="css/header.css" />
  <link rel="stylesheet" href="css/menu.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="css/ordina.css" />

  <style>
    body {
      margin: 0;
      font-family: 'Kumbh Sans', sans-serif;
      background-color: #1a1a1a;
      color: #fff;
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

    /* WhatsApp Icon */
    .whatsapp-icon {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #25D366;
      color: white;
      padding: 15px 18px;
      border-radius: 50%;
      font-size: 28px;
      z-index: 1000;
      transition: 0.3s ease;
    }

    .whatsapp-icon:hover {
      transform: scale(1.1) rotate(10deg);
      background-color: #128C7E;
    }
  </style>
</head>

<body class="menu-page">

  <?php include 'header.php'; ?>

  <h1>Il nostro Menù</h1>

  <section class="container" style="margin-top: -10px;">
    <h3 class="menu-category">Antipasti / Fritti</h3>
    <div class="grid">
      <div class="item">
        <h4>Mozzarelline Fritte</h4>
        <p>Mini mozzarelle panate e fritte servite con salsa rosa</p>
        <div><strong>€6.00</strong></div>
      </div>
      <div class="item">
        <h4>Arancino</h4>
        <p>Tipico fritto siciliano con riso, ragù, piselli e formaggio filante</p>
        <div><strong>€4.50</strong></div>
      </div>
      <div class="item">
        <h4>Olive Ascolane</h4>
        <p>Olive verdi ripiene di carne, impanate e fritte</p>
        <div><strong>€6.50</strong></div>
      </div>
      <div class="item">
        <h4>Patatine Fritte</h4>
        <p>Classiche patatine croccanti servite calde</p>
        <div><strong>€3.50</strong></div>
      </div>
      <div class="item">
        <h4>Bruschette</h4>
        <p>Pane tostato con pomodorini freschi, basilico e olio EVO</p>
        <div><strong>€5.00</strong></div>
      </div>
      <div class="item">
        <h4>Donzelle</h4>
        <p>Piccoli bocconcini di pasta fritta, leggeri e croccanti</p>
        <div><strong>€4.50</strong></div>
      </div>
    </div> <!-- Chiudo Grid antipasti -->

    <h3 class="menu-category">Pizze Rosse</h3>
    <div class="grid">
      <div class="item">
        <h4>Margherita</h4>
        <p>La classica pizza con pomodoro, mozzarella e basilico fresco.</p>
        <div><strong>€ 7.50</strong></div>
      </div>
      <div class="item">
        <h4>Marinara</h4>
        <p>Pizza con pomodoro, aglio, origano e olio d'oliva.</p>
        <div><strong>€ 6.50</strong></div>
      </div>
      <div class="item">
        <h4>Diavola</h4>
        <p>Base con pomodoro fresco, mozzarella fior di latte e salamino piccante.</p>
        <div><strong>€ 8.50</strong></div>
      </div>
      <div class="item">
        <h4>Napoli</h4>
        <p>Pomodoro, mozzarella, acciughe e capperi.</p>
        <div><strong>€ 10.00</strong></div>
      </div>
      <div class="item">
        <h4>Wurstel e Patatine</h4>
        <p>Pomodoro, mozzarella, wurstel e patatine fritte.</p>
        <div><strong>€ 8.50</strong></div>
      </div>
      <div class="item">
        <h4>Prosciutto e Funghi</h4>
        <p>Pomodoro, mozzarella, prosciutto cotto e funghi champignon freschi.</p>
        <div><strong>€ 9.50</strong></div>
      </div>
      <div class="item">
        <h4>Tonno e Cipolla</h4>
        <p>Pomodoro, mozzarella, tonno e cipolla dolce.</p>
        <div><strong>€ 9.00</strong></div>
      </div>
      <div class="item">
        <h4>Quattro Stagioni</h4>
        <p>Pomodoro, mozzarella, prosciutto cotto, funghi, carciofi e olive nere.</p>
        <div><strong>€ 10.50</strong></div>
      </div>
      <div class="item">
        <h4>Boscaiola</h4>
        <p>Pomodoro, mozzarella, salsiccia, e funghi.</p>
        <div><strong>€ 9.00</strong></div>
      </div>
    </div>

    <h3 class="menu-category">Pizze Bianche</h3>
    <div class="grid">
      <div class="item">
        <h4>Caprese</h4>
        <p>Mozzarella di bufala, pomodoro fresco e basilico.</p>
        <div><strong>€ 8.00</strong></div>
      </div>
      <div class="item">
        <h4>Primavera</h4>
        <p>Mozzarella, pomodorini freschi, rucola e scaglie di parmigiano.</p>
        <div><strong>€ 7.50</strong></div>
      </div>
      <div class="item">
        <h4>Burrata e Crudo</h4>
        <p>Burrata fresca, prosciutto crudo di Parma e rucola.</p>
        <div><strong>€ 9.00</strong></div>
      </div>
      <div class="item">
        <h4>Quattro Formaggi</h4>
        <p>Mozzarella, gorgonzola, parmigiano e provola affumicata.</p>
        <div><strong>€ 8.50</strong></div>
      </div>
      <div class="item">
        <h4>Valdostana</h4>
        <p>Mozzarella, prosciutto cotto, funghi e fontina valdostana.</p>
        <div><strong>€ 8.50</strong></div>
      </div>
      <div class="item">
        <h4>Salsiccia e Friarielli</h4>
        <p>Salsiccia italiana, friarielli e mozzarella.</p>
        <div><strong>€ 8.50</strong></div>
      </div>
    </div>
  </section>

  <div class="order-button-container">
    <a href="https://glovoapp.com/it/it/follonica/" target="_blank" class="order-button">
      <span style="position: relative; z-index: 2;">ORDINA CON GLOVO</span>
      <span class="hover-effect"></span>
    </a>
  </div>

  <a href="https://wa.me/39123456789" class="whatsapp-icon" target="_blank" rel="noopener noreferrer">
    <i class="fab fa-whatsapp"></i>
  </a>

  <?php include 'footer.php'; ?>

  <script src="js/script.js"></script>
  <script src="js/menu.js"></script>
</body>
</html>
