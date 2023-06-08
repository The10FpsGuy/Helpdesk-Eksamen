<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpdesk: Liste over saker</title>
    <link href="css/index.css" rel="stylesheet">
</head>
<body>
<header>
<header>
    <button class="button search-icon" onclick="window.location.href = 'finn-sak.php';">&#128269;</button><p class="inline">Søk på sak</p>
    <button class="button loading-circle" onclick="window.location.href = 'under-behandling.php';">&#9898;</button><p class="inline">Marker som "Under arbeid"</p>
    <button class="button check-mark" onclick="window.location.href = 'slett-case';">&#10003;</button><p class="inline">Marker som "Ferdig"</p>
    
  </header>
    <!-- <h3>For å søke på et case kan du søke <a href="finn-sak.php">her</a></h3>
    <h3>Her kan du starte en case, og se oversikt om de som har blitt startet <a href="under-behandling.php">hit</a></h3>
    <h3>Hvis du vil slette en case, kan du gjøre det <a href="slett-case.php">her</a> -->
    <table>
    <tr>
            <th>Navn</th>
            <th>Telefonnummer</th>
            <th>Beskrivelse</th>
            <th>Status</th>
            <th>Dato og Tid</th>
            <th>ID</th>
        </tr>
        <?php
         // Sjekker cookies
         if (isset($_COOKIE['loggetinn'])) {
            $cookie_value = $_COOKIE['loggetinn'];
          } else {
            header("Location: error403.html");
          }
        include_once 'connect.php';
        // Skriver ut alle case-er som er logga
        $sql = "SELECT * FROM problemer ORDER BY status ASC";
        if ($result = mysqli_query($conn, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
              $navn = $row['navn'];
              $tlf = $row['tlf'];
              $beskrivelse = $row['beskrivelse'];
              $status = $row['status'];
              $id = $row['id'];
              $tid = $row['tid'];
            
            echo "<tr>";
                echo "<td>$navn</td>";
                echo "<td>$tlf</td>";
                echo "<td>$beskrivelse</td>";
                echo "<td>$status</td>";
                echo "<td>$tid</td>";
                echo "<td>$id</td>";
            echo "</tr>";
            }}
            ?>
    </table>
</body>
</html>