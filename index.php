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
    <h3>For å søke på et case kan du søke <a href="finn-sak.php">her</a></h3>
    <h3>Hvis et case har startet behandling, blir den flyttet <a href="under-behandling.php">hit</a></h3>
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
         if (isset($_COOKIE['loggetinn'])) {
            $cookie_value = $_COOKIE['loggetinn'];
          } else {
            header("Location: error403.html");
          }
        include_once 'connect.php';
        $sql = "SELECT * FROM problemer";
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