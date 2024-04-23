<?php
$conn = new mysqli('localhost', 'root', '', 'szkola');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST["student_id"];
    $grade = $_POST["grade"];

    if ($grade < 1 || $grade > 6) {
        $message = "Ocena musi być liczbą całkowitą od 1 do 6.";
    } else {
       
        $sql = "UPDATE uczniowie SET ocena = $grade WHERE student_id = $student_id";

        if ($conn->query($sql) === TRUE) {
            $message = "Ocena została zaktualizowana pomyślnie.";
        } else {
            $message = "Błąd: " . $sql . "<br>" . $conn->error;
        }
    }
}

$sql = "SELECT student_id, imie, ocena FROM uczniowie";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System oceniania</title>
</head>
<body>
    <h2>System oceniania</h2>
    <?php if(isset($message)) echo "<p>$message</p>"; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="student_id">Wybierz ucznia:</label>
        <select name="student_id" id="student_id">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row["student_id"] . "'>" . $row["imie"] . " " . "</option>";
                }
            } else {
                echo "<option value=''>Brak uczniów</option>";
            }
            ?>
        </select>
        <br>
        <label for="grade">Ocena:</label>
        <input type="number" name="grade" id="grade" min="1" max="6" required>
        <br>
        <button type="submit">Zapisz ocenę</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
