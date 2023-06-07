<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpdesk: Liste over saker</title>
</head>
<body>
    <table>
        <?php
        include_once 'connect.php';
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
            echo "</tr>";
            }}
            ?>
    </table>
</body>
</html>