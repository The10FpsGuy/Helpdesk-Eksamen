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
    <button class="button loading-circle" onclick="window.location.href = 'under-behandling.php';">&#9898;</button><p class="inline">"Under arbeid" Oversikt</p>
    <button class="button check-mark" onclick="window.location.href = 'slett-case';">&#10003;</button><p class="inline">"Ferdig" Oversikt</p>
    <button class="button fa-solid fa-char-bar"onclick="window.location.href = 'stats.php';">&#128202;</button><p class="inline">Statistikk</p>
    
  </header>

    <table>
      <h3>Alle uløste saker</h3>
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
        // Skriver ut alle case-er som er Uløst
        $sql = "SELECT * FROM problemer WHERE status='Uløst' ORDER BY status ASC";
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