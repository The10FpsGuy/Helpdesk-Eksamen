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
    <table>
    <tr>
            <th>Navn</th>
            <th>Telefonnummer</th>
            <th>Beskrivelse</th>
            <th>Telefonnummer</th>
            <th>Status</th>
            <th>Dato og Tid</th>
            <th>ID</th>
        </tr>
        <?php
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
                echo "<td>$tlf</td>";
                echo "<td>$status</td>";
                echo "<td>$tid</td>";
                echo "<td>$id</td>";
            echo "</tr>";
            }}
            ?>
    </table>
</body>
</html>