<!DOCTYPE html>
<html lang="PL-pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styl1.css">
    <title>Zaloguj się</title>
</head>
<?php
if(isset($error)) {
    echo $error;
}
?>
<body>
    <form action="login_kontroler.php" method="POST">
        <p id="text">Podaj login</p>
        <input type="text" name="login"><br>
        <p id="text">Podaj hasło</p>
        <input type="text" name="password"><br>
        <input type="submit" value="Zaloguj">
    </form>
</body>
</html>