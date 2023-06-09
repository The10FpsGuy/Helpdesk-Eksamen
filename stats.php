<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpdesk: Stats</title>
    <link href="css/stats.css" rel="stylesheet">
</head>
<body>

    <table>
<tr>
            <th>Data</th>
            <th>Verdi</th>
        </tr>
        <tr>
            <td>Antall hendelser</td>
            <?php
        include_once 'connect.php';
        // Skriver ut antall caser
        $sql = "SELECT Count(status) as total FROM problemer";
        $result = mysqli_query($conn, $sql);
        $data=mysqli_fetch_assoc($result);
        $data=$data['total'];
        echo "<td>$data </td>";
            ?>
        </tr>
        <tr>
            <td>Antall hendelser som ikke er startet</td>
            <?php
        include_once 'connect.php';
        // Skriver ut antall som er Uløst
        $sql = "SELECT Count(status) as total FROM problemer WHERE status='Uløst'";
        $result = mysqli_query($conn, $sql);
        $data=mysqli_fetch_assoc($result);
        $data=$data['total'];
        echo "<td>$data </td>";
            ?>
        </tr>
        <tr>
            <td>Antall hendelser som er under arbeid</td>
            <?php
        include_once 'connect.php';
        // Skriver ut antall som er Under arbeid
        $sql = "SELECT Count(status) as total FROM problemer WHERE status='Under arbeid'";
        $result = mysqli_query($conn, $sql);
        $data=mysqli_fetch_assoc($result);
        $data=$data['total'];
        echo "<td>$data </td>";
            ?>
        </tr>
        <tr>
            <td>Antall hendelser som er løst</td>
            <?php
        include_once 'connect.php';
        // Skriver ut antall som er Ferdig
        $sql = "SELECT Count(status) as total FROM problemer WHERE status='Ferdig'";
        $result = mysqli_query($conn, $sql);
        $data=mysqli_fetch_assoc($result);
        $data=$data['total'];
        echo "<td>$data </td>";
            ?>
        </tr>
        <tr>
            <td>Gjennsomsnitt responstid</td>
            <?php
        include_once 'connect.php';
        //Sender en spørring som kobler sammen 2 tabller, sånn at jeg får begge tidspunkter
        $sql = "SELECT *
        FROM problemer
        INNER JOIN under_behandling
        ON problemer.id = under_behandling.id;";
          $result = mysqli_query($conn, $sql) or die("error".mysqli_error($conn));
          $total_tid = 0;
          if (mysqli_num_rows($result) > 0) {
            while ($Row = mysqli_fetch_assoc($result)) {
                $reg_tid = $Row['tid'];
                $id = $Row['id'];
                $start_tid = $Row['tid_start'];
                //Her måtte jeg formattere hvordan tidspunktet ble lagret, erstatte "/" med "-" f.eks
                $start = strtotime($reg_tid);
                $start = str_replace('/', '-', $start);
                $slutt = strtotime($start_tid);
                $slutt = str_replace('/', '-', $slutt);
                $case_tid  = round(abs($start - $slutt) / 60);
                //Her så fant den ut hvor mange som er i tabellen under_behandling, for å bruke senere
                $sql = "SELECT Count(status) as count FROM under_behandling";
                $result2 = mysqli_query($conn, $sql);
                $count = mysqli_fetch_assoc($result2)['count'];
                //Her regner den ut gjennomsnittet
                $total_tid = floor(($total_tid + $case_tid) / $count);
            }
                echo " <td>$total_tid Minutter</td>";
            }
            ?>
        </tr>
        <tr>
            <td>Gjennomsnitt totaltid</td>
            <?php
        include_once 'connect.php';
                //Sender en spørring som kobler sammen 2 tabller, sånn at jeg får begge tidspunkter
        $sql = "SELECT *
        FROM problemer
        INNER JOIN ferdig
        ON problemer.id = ferdig.id;";
          $result = mysqli_query($conn, $sql) or die("error".mysqli_error($conn));
          $total_tid = 0;
          if (mysqli_num_rows($result) > 0) {
            while ($Row = mysqli_fetch_assoc($result)) {
                $reg_tid = $Row['tid'];
                $id = $Row['id'];
                $ferdig_tid = $Row['tid_ferdig'];
//Her måtte jeg formattere hvordan tidspunktet ble lagret, erstatte "/" med "-" f.eks
                $start = strtotime($reg_tid);
                $start = str_replace('/', '-', $start);
                $slutt = strtotime($ferdig_tid);
                $slutt = str_replace('/', '-', $slutt);
                $case_tid  = round(abs($start - $slutt) / 60);

                            //Her så fant den ut hvor mange som er i tabellen under_behandling, for å bruke senere

                $sql = "SELECT Count(status) as count FROM ferdig";
                $result2 = mysqli_query($conn, $sql);
                $count = mysqli_fetch_assoc($result2)['count'];
                                //Her regner den ut gjennomsnittet

                $total_tid = floor(($total_tid + $case_tid) / $count);
            }
            echo " <td>$total_tid Minutter</td>";

        }
            ?>
        </tr>
    </table>
</body>
</html>