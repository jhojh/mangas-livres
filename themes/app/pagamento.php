<?php
$this->layout("_theme");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= url("themes/app/assets/css/payment.css"); ?>">
  <script type='text/javascript' src="<?= url("themes/app/assets/js/scriptp.js"); ?>" async></script>
  <title>Pagamento</title>
</head>

<body>

  <main>
    <h1>Areá de Pagamento</h1>
    <section>
      <h2 id="totalapagar">Detalhes do Pedido:</h2>

    </section>

    <section>
      <h2>Informações de Pagamento</h2>
      <form>
        <label for="cardNumber">Número do Cartão:</label>
        <input type="text" id="cardNumber" required placeholder="preencha todos campos">

        <label for="expirationDate">Data de Validade:</label>
        <input type="text" id="expirationDate" required placeholder="preencha todos campos">

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" required placeholder="preencha todos campos">

        <button type="submit" id="submit" onclick="window.location.href='<?= url("/"); ?>'">Pagar</button>
      </form>
    </section>
  </main>


</body>

</html>