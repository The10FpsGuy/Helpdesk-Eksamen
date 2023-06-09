<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpdesk: Søk etter sak</title>
    <link href="css/finn-sak.css" rel="stylesheet">
</head>
<body>
    <style>


    </style>
    <div class="wrap">
        <form action="#" method="POST">
        <div class="search">
           <input name="søkeord" type="text" class="searchTerm" placeholder="Søk på noe her...">
           <button type="submit" class="searchButton">
             <i class="fa fa-search"></i>
          </button>
        </div>
    </form>
    <table>
    <tr>
            <th>Navn</th>
            <th>Telefonnummer</th>
            <th>Beskrivelse</th>
            <th>Status</th>
            <th>Dato og Tid startet</th>
            <th>ID</th>
        </tr>
        <?php
        // Sjekker om cookies er satt, og hvis ikke så sender deg til en error side
        if (isset($_COOKIE['loggetinn'])) {
            $cookie_value = $_COOKIE['loggetinn'];
        } else {
            header("Location: error403.html");
        }
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                include_once 'connect.php';
                // Henter nøkkelordet og setter det inn i en sql query
             $søkeord = $_POST['søkeord'];
              $sql = "SELECT * FROM problemer WHERE navn LIKE '%$søkeord%' OR  tlf LIKE '%$søkeord%' OR id LIKE '%$søkeord%' OR status LIKE '%$søkeord%'";
              $result = mysqli_query($conn, $sql);
            // Outputter alt som har søkeordet i seg
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
                }}}
        ?>
    </table>
     </div>
</body>
</html>