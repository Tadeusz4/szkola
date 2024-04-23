<!DOCTYPE html>
<html lang="PL-pl">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styl.css">
    <title>Moje portfolio</title>
  </head>
  <body>
    <header>
      <?php
  if(isset($error)) {
      echo $error;
  }
  ?>
      <h1>witaj na stronie "Moje portfolio"</h1>
    </header>
    <div id="egzaminy">
      <p>Zobacz wykonane przeze mnie egzaminy</p>
      <button onclick="window.location.href = 'egzaminy.html';">Zobacz</button>
    </div>
    <div id="projekty">
      <p>Zobacz wykonane przeze mnie projekty</p>
      <button onclick="window.location.href = 'projekty.html';">Zobacz</button>
    </div>
    <footer>
      <p>Jan Dzieżok</p>
    </footer>
  </body>
</html>
