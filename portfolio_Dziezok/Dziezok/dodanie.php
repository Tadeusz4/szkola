<?php 
$conn = mysqli_connect('localhost', 'root', '', 'ee09');
if(!empty($_POST['nr']) && !empty($_POST['ratownik1']) && !empty($_POST['ratownik2']) && !empty($_POST['ratownik3'])) {
    $nr=$_POST['nr'];
    $rat1=$_POST['ratownik1'];
    $rat2=$_POST['ratownik2'];
    $rat3=$_POST['ratownik3'];
    $sql = "INSERT INTO ratownicy VALUES(NULL, $nr, '$rat1', '$rat2', '$rat3')";
    mysqli_query($conn, $sql);
}
mysqli_close($conn)
?>