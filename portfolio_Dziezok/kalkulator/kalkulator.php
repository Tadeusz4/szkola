<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kalkulator</title>
  </head>
  <body>
    <h2>Kalkulator</h2>
    <form action="obsluga.php" method="post">
      <label for="number1">Liczba 1:</label>
      <input type="number" name="number1" id="number1" required />
      <br />
      <label for="number2">Liczba 2:</label>
      <input type="number" name="number2" id="number2" required />
      <br />
      <label for="operation">Wybierz operację:</label>
      <select name="operation" id="operation">
        <option value="dodaj">Dodawanie</option>
        <option value="ujmuj">Odejmowanie</option>
        <option value="mnoz">Mnożenie</option>
        <option value="dziel">Dzielenie</option>
      </select>
      <br />
      <button type="submit">Oblicz</button>
    </form>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <div>
      <h3>Historia działań:</h3>
      <?php
        $conn = mysqli_connect('localhost', 'root', '', 'historia');
        $sql = "SELECT * FROM dzialania ORDER BY id DESC LIMIT 10";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) >0) {
            while($row = mysqli_fetch_assoc($result)) { 
        echo $row['dzialanie'] . "<br />";
            } 
        } else { echo "Brak historii działań."; } $conn->close(); ?>
    </div>
  </body>
</html>
