<?php
$conn = mysqli_connect('localhost', 'root', '', 'baza');
if(isset($_POST['rezerwuj'])) {
	$data = $_POST['data'];
	$ileOs = $_POST['ileOs'];
	$nrTel = $_POST['nrTel'];
	$sql = "INSERT INTO rezerwacje VALUES (NULL, NULL, '$data', $ileOs, '$nrTel');";
	mysqli_query($conn, $sql);
	echo "Dodano rezerwcje do bazy";
}
mysqli_close($conn);
?>