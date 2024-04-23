<?php
session_start();
if (!isset($_SESSION['number'])) {
    $_SESSION['number'] = rand(1, 100);
    $_SESSION['proby'] = 0;
}
$proby = "";
if(isset($_POST['typ'])&&isset($_POST['nazwa'])){
    $typ = $_POST['typ'];
    
    if($typ == NULL) {
        $message = "pole nie może być puste";
    }elseif($typ > $_SESSION['number']) {
        $message = "Wylosowana liczba jest mniejsza";
        $_SESSION['proby']++; 
    }elseif($typ < $_SESSION['number']) {
        $message = "Wylosowana liczba jest większa";
        $_SESSION['proby']++;
    }else{
        $nazwa = $_POST['nazwa'];
        $message = "Gratulacje zgadłeś! Numer to " . $_SESSION['number'] . "!";
        $proby = "Potrzebowałeś do tego " . $_SESSION['proby'] . " prób.";
        $conn = mysqli_connect('localhost', 'root', '', 'wyniki');
        $sql = "insert into dane values('', '$nazwa', '" . $_SESSION["proby"] . "')";
        $wynik = mysqli_query($conn, $sql);
        session_destroy();  
    }
}

include 'widok.php';
?>