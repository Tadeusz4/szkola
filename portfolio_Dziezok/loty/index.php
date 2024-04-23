<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>LOTY</h1>
<?php
require "config.php";
$sql="SELECT * FROM flights";
$wynik=mysqli_query($conn, $sql);
$lrek=mysqli_num_rows($wynik);
if ($lrek>0) {
    $rekord=mysqli_fetch_assoc($wynik);
    echo "<table border=1>";
    echo "<tr><th>ID</th><th>departure</th><th>arrival</th><th>price</th></tr>";
    while($rekord != null) {
        echo "<tr><td>" . $rekord['id'] .
             "</td><td>" . $rekord['departure'] . 
             "</td><td>" . $rekord['arrival'] .
             "</td><td>" . $rekord['price'] . 
             "</td></tr>";
        $rekord = mysqli_fetch_assoc($wynik);
    }

    echo "</table>";
}
//zad2
?>
<h2>Select city of departure:</h2>
    <form method="post">
        <select name="miasto2">
            <?php
            $sql2 = "SELECT departure FROM flights UNION SELECT arrival FROM flights";
            $wynik2 = mysqli_query($conn, $sql2);
            $lrek2 = mysqli_num_rows($wynik2);

            if ($wynik2 && $lrek2 > 0) {
                while ($row = mysqli_fetch_assoc($wynik2)) {
                    echo "<option value='" . $row["departure"] . "'>" . $row["departure"] . "</option>";
                }
            } else {
                echo "<option value=''>No cities</option>";
            }
            ?>
        </select>
        <input type="submit" name="submit2" value="Wybierz">
    </form>

    <?php
    if (isset($_POST['submit2'])) {
        $wMiasto = $_POST['miasto2'];

        $sql3 = "SELECT * FROM flights WHERE departure='$wMiasto'";
        $result2 = mysqli_query($conn, $sql3);

        if ($result2 && mysqli_num_rows($result2) > 0) {
            echo "<h2>Flights from $wMiasto:</h2>";
            echo "<ul>";
            while ($row2 = mysqli_fetch_assoc($result2)) {
                echo "<li>To: " . $row2["arrival"] . " Price: " . $row2["price"] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "No flights from $wMiasto";
        }
    }
    //zad3
    ?>
    <br>
    <h2>Select destination city:</h2>
    <form method="post">
        <select name="miasto3">
            <?php

            $sql3 = "SELECT departure FROM flights UNION SELECT arrival FROM flights";
            $wynik3 = mysqli_query($conn, $sql3);
            $lrek3 = mysqli_num_rows($wynik3);
            
            if ($wynik3 && $lrek3 > 0) {
                while ($row3 = mysqli_fetch_assoc($wynik3)) {
                    echo "<option value='" . $row3["departure"] . "'>" . $row3["departure"] . "</option>";
                }
            } else {
                echo "<option value=''>No cities</option>";
            }
            ?>
        </select>
        <input type="submit" name="submit3" value="Wybierz">
    </form>

    <?php

    if (isset($_POST['submit3'])) {
        $wMiasto3 = $_POST['miasto3'];

        $sql3 = "SELECT * FROM flights WHERE arrival='$wMiasto3'";
        $result3 = mysqli_query($conn, $sql3);

        if ($result3 && mysqli_num_rows($result3) > 0) {
            echo "<h2>Arivals to $wMiasto3:</h2>";
            echo "<ul>";
            while ($row3 = mysqli_fetch_assoc($result3)) {
                echo "<li>From: " . $row3["departure"] . " Price: " . $row3["price"] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "No flights to $wMiasto3";
        }
    }
//zad4
     echo "<br>";
     $sql4 = "SELECT * FROM flights ORDER BY price ASC LIMIT 1";
        $wynik4 = mysqli_query($conn, $sql4);
        $row4 = mysqli_fetch_assoc($wynik4);
            
        echo "<h2>The cheapest flight today is from " . $row4['departure'] . " to " . $row4['arrival'] . " the price is: " . $row4['price'] . "." . "</h2>";
        echo "<br>";
//zad5
?>
<br>
<h2>Search engine for the cheapest flights</h2>
<h2>Select city:</h2>
    <form method="post">
        <select name="miasto5">
            <?php
            $sql5 = "SELECT departure, arrival FROM flights";
            $wynik5 = mysqli_query($conn, $sql5);

            if ($wynik5 && mysqli_num_rows($wynik5) > 0) {
                while ($row5 = mysqli_fetch_assoc($wynik5)) {
                    echo "<option value='" . $row5["departure"] . "'>" . $row5["departure"] . "</option>";
                }
            } else {
                echo "<option value=''>Brak miast</option>";
            }
            ?>
        </select>
        <input type="submit" name="submit5" value="Wybierz">
    </form>
<?php

if (isset($_POST['submit5'])) {
    $wMiasto5 = $_POST['miasto5'];

    $sql6 = "SELECT * FROM flights WHERE departure='$wMiasto5' ORDER BY price ASC LIMIT 1";
    $result6 = mysqli_query($conn, $sql6);

    if ($result6 && mysqli_num_rows($result6) > 0) {
        $row6 = mysqli_fetch_assoc($result6);
        echo "<h2>Najtańszy lot z $wMiasto5:</h2>";
        echo "<p>To: " . $row6["arrival"] . " Price: " . $row6["price"] . "</p>";
    } else {
        echo "No flights from $wMiasto5";
    }
}
//zad6
?>
<br>
<h2>Indirect flight search engine</h2>
    <form method="post">
        <label for="departure">City of departure:</label>
        <select name="departure" id="departure">
            <?php

            $sqlD = "SELECT DISTINCT departure FROM flights";
            $wynikD = mysqli_query($conn, $sqlD);

            if ($wynikD && mysqli_num_rows($wynikD) > 0) {
                while ($rowD = mysqli_fetch_assoc($wynikD)) {
                    echo "<option value='" . $rowD["departure"] . "'>" . $rowD["departure"] . "</option>";
                }
            } else {
                echo "<option value=''>Brak miast</option>";
            }
            ?>
        </select>

        <label for="arrival">Miasto przylotu:</label>
        <select name="arrival" id="arrival">
            <?php
            $sqlA = "SELECT DISTINCT arrival FROM flights";
            $wynikA = mysqli_query($conn, $sqlA);

            if ($wynikA && mysqli_num_rows($wynikA) > 0) {
                while ($rowA = mysqli_fetch_assoc($wynikA)) {
                    echo "<option value='" . $rowA["arrival"] . "'>" . $rowA["arrival"] . "</option>";
                }
            } else {
                echo "<option value=''>Brak miast</option>";
            }
            ?>
        </select>

        <input type="submit" name="submit6" value="Szukaj">
    </form>

    <?php
    if (isset($_POST['submit6'])) {
        $departure = $_POST['departure'];
        $arrival = $_POST['arrival'];

        $sqlF = "SELECT f1.departure AS departure1, f1.arrival AS arrival1, f1.price AS price1, f2.arrival AS arrival2, f2.price AS price2
        FROM flights AS f1
        INNER JOIN flights AS f2 ON f1.arrival = f2.departure
        WHERE f1.departure = '$departure' AND f2.arrival = '$arrival'";
        $wynikF = mysqli_query($conn, $sqlF);

        if ($wynikF && mysqli_num_rows($wynikF) > 0) {
            echo "<h3>Connecting flights found from $departure to $arrival:</h3>";
            echo "<table border='1'>";
            echo "<tr><th>City od departure</th><th>Transfer city</th><th>The price of the connecting flight</th><th>Arrival city</th><th>Flight price to destination</th></tr>";
            while ($rowF = mysqli_fetch_assoc($wynikF)) {
                echo "<tr>";
                echo "<td>" . $rowF['departure1'] . "</td>";
                echo "<td>" . $rowF['arrival1'] . "</td>";
                echo "<td>" . $rowF['price1'] . "</td>";
                echo "<td>" . $rowF['arrival2'] . "</td>";
                echo "<td>" . $rowF['price2'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Brak lotów z przesiadką z $departure do $arrival";
        }
    }
    mysqli_close($conn);
    ?>
</body>
</html>