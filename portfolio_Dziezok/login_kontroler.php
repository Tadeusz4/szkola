<?php
require "config1.php";

$login = isset($_POST['login']) ? $_POST['login'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";

$error = "";

if ($password == "" || $login == "") {
    $error = "wypełnij oba pola";
} else {
    $sql = "SELECT password FROM users WHERE login = '$login'";
    $wynik = mysqli_query($conn, $sql);

    if (!$wynik) {
        $error = "błąd zapytania: " . mysqli_error($conn);
    } else {
        $result = mysqli_num_rows($wynik);
        $row = mysqli_fetch_assoc($wynik);

        if ($result == 0) {
            $error = "niepoprawna nazwa użytkownika";
        } elseif ($row['password'] == $password) {
            $error = "zalogowano pomyślnie";
            header("Location: glowna.php");
            exit();
        } else {
            $error = "podano złe hasło";
        }
    }
}

mysqli_close($conn);
include "login_form.php";
?>
