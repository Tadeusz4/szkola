<?php
$ser = "localhost";
$user = "root";
$pas = "";
$base = "wedkarstwo";
$conn = mysqli_connect($ser, $user, $pas, $base);
if (isset($_POST['dodaj'])) {
    $lowisko = $_POST['lowisko'];
    $data = $_POST['data'];
    $sedzia = $_POST['sedzia'];
    $q = "INSERT INTO zawody_wedkarskie VALUES (NULL, 0, $lowisko, '$data', '$sedzia');";
    mysqli_query($conn, $q);
}
mysqli_close($conn);
?>