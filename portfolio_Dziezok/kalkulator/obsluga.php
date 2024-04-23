<?php
$conn = new mysqli('localhost', 'root', '', 'historia');
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number1 = $_POST["number1"];
    $number2 = $_POST["number2"];
    $operation = $_POST["operation"];
    if ($operation === "dodaj") {
        $result = $number1 + $number2;
        $operation_symbol = "+";
        
    } elseif ($operation === "ujmuj") {
        $result = $number1 - $number2;
        $operation_symbol = "-";
        
    } elseif ($operation === "mnoz") {
        $result = $number1 * $number2;
        $operation_symbol = "*";
        
    } elseif ($operation === "dziel") {
        if ($number2 != 0) {
            $result = $number1 / $number2;
            $operation_symbol = "/";
            
        } else {
            $message = "Nie można dzielić przez zero!";
            exit;
        }
    } else {
        $message = "Nieznana operacja!";
        exit;
    }
    $calculation = "$number1 $operation_symbol $number2 = $result";
    $sql = "INSERT INTO dzialania VALUES ('', '$calculation')";
    if (mysqli_query($conn, $sql) === TRUE) {
        echo "Wynik: " . $calculation;
    } else {
        echo "Błąd: " . $sql . "<br>" . $conn->error;
    }
}
include "kalkulator.php";
?>