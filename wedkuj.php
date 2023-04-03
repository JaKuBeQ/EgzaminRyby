<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl_1.css">
    <title>Wędkowanie</title>
</head>
<body>

    <div id="baner">
        <h1>Portal dla wędkarzy</h1>
    </div>

<div id="lewy">

        <div id="lewy1">
            <h3>Ryby zamieszkujące rzeki</h3><br>
                <ol>
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "wedkowanie");
                    if (!$conn) {
                    echo "Nie udało się połączyć z bazą danych: " . mysqli_connect_error();
                    exit();
                    }
                    $sql1 = "SELECT r.nazwa AS nazwa, l.akwen AS akwen, l.wojewodztwo AS wojewodztwo FROM ryby r INNER JOIN lowisko l ON r.id=l.ryby_id WHERE l.rodzaj = 3;";

                    $result = $conn->query($sql1);
                    while ($row = $result->fetch_assoc()) {
                    echo "<li>" . $row['nazwa'] . " pływa w rzece " . $row['akwen'] . ", " . $row['wojewodztwo'] . "</li>";
                }   
                ?>
                </ol>
        </div>

    <div id="lewy2">
        <h3>Ryby drapieżne naszych wód</h3>
            <table>
                <tr>
                <th>L.p.</th>
                <th>Gatunek</th>
                <th>Występowanie</th>
                </tr>
            <?php
            $sql2 = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia=1;";

            $result = $conn->query($sql2);
            while ($row = $result->fetch_assoc()) {
               echo "<tr><td>" . $row['id'] . "</td><td>" . $row['nazwa'] . "</td><td>" . $row['wystepowanie'] . "</td></tr>";
            }
            mysqli_close($conn);
            ?>
            </table>
    </div>
</div>

   <div id="prawy">
        <img src="ryba1.jpg" alt="Sum"><br>
        <a href="kwerendy.txt" download>Pobierz kwerendy</a>
   </div>

   <div id="stopka">
        <p>Stronę wykonał: 00000000000</p>
   </div>

</body>

</html>