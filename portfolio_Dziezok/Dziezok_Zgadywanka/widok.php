<!DOCTYPE html>
<html lang="PL-pl">
<head>
    <meta charset="UTF-8">
    <title>Zgadywanka</title>
</head>
<body>
    <h1>Zgadywanka</h1>
    <?php if (isset($message)){
        echo $message;}?><br>
    <?php if (isset($proby)){
        echo $proby;}?>
    <form action="kontroler.php" method="post">
        Podaj swoje imie: <br>
        <input type="text" name="nazwa" value="<?php
        if(isset($_POST['nazwa'])) {
            echo $_POST['nazwa'];
        }
        ?>"><br>
        Zgaduj liczbę od 1 do 100: <br>
        <input type="number" min="1" max="100" name="typ">
        <button type="submit">Zgaduj!</button>
    </form>
    TOP 3
    <?php 
    
    ?>
    
</body>
</html>