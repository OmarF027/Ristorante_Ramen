<section id="ordina" class="order-section">
    <div class="order-content">
        <div class="order-text">
            <h1>Ordina Online!</h1>
            <div class="delivery-text">
                <p><strong>21OVEN</strong> – La pizza che volevi, <strong>dove volevi</strong>. Ordina in un attimo, goditela sul divano. <strong>Te la portiamo noi!</strong>
</p>
            </div>
            <div class="order-button-container">
                <a href="https://glovoapp.com/it/it/follonica/" target="_blank" class="order-button">
                    <span style="position: relative; z-index: 2;">ORDINA CON GLOVO</span>
                    <span class="hover-effect"></span>
                </a>
            </div>
        </div>
        <div class="order-image">
            <img src="img/delivery.jpg" alt="Consegna a domicilio">
        </div>
    </div>
</section>

<style>
  /* Stili base per desktop */
  .order-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 40px;
  }

  .order-text, .order-image {
    flex: 1;
  }

  .order-image img {
    width: 100%;
    height: auto;
    border-radius: 8px;
  }

  /* Media query per schermi piccoli */
  @media (max-width: 768px) {
    .order-content {
      flex-direction: column;
      gap: 20px;
    }

    .order-text, .order-image {
      width: 100%;
      flex: unset;
    }

    .order-section {
      padding: 20px 15px;
    }

    .order-text h1 {
      font-size: 1.8rem;
    }

    .delivery-text p {
      font-size: 1rem;
      margin-bottom: 15px;
    }

    .order-image img {
      width: 100%;
      height: auto;
      border-radius: 8px;
    }

    .order-button {
      padding: 12px 25px;
      font-size: 1rem;
    }
  }
</style>


