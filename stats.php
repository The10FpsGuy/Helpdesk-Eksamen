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
        // Skriver ut alle case-er som er logga
        $sql = "SELECT Count(status) as total FROM problemer";
        $result = mysqli_query($conn, $sql);
        $data=mysqli_fetch_assoc($result);
        $data=$data['total'];
        echo "<td>$data</td>";
            ?>
        </tr>
        <tr>
            <td>Antall hendelser som ikke er startet</td>
            <?php
        include_once 'connect.php';
        // Skriver ut alle case-er som er logga
        $sql = "SELECT Count(status) as total FROM problemer WHERE status='Uløst'";
        $result = mysqli_query($conn, $sql);
        $data=mysqli_fetch_assoc($result);
        $data=$data['total'];
        echo "<td>$data</td>";
            ?>
        </tr>
        <tr>
            <td>Antall hendelser som er under arbeid</td>
            <?php
        include_once 'connect.php';
        // Skriver ut alle case-er som er logga
        $sql = "SELECT Count(status) as total FROM problemer WHERE status='Under arbeid'";
        $result = mysqli_query($conn, $sql);
        $data=mysqli_fetch_assoc($result);
        $data=$data['total'];
        echo "<td>$data</td>";
            ?>
        </tr>
        <tr>
            <td>Antall hendelser som er løst</td>
            <?php
        include_once 'connect.php';
        // Skriver ut alle case-er som er logga
        $sql = "SELECT Count(status) as total FROM problemer WHERE status='Ferdig'";
        $result = mysqli_query($conn, $sql);
        $data=mysqli_fetch_assoc($result);
        $data=$data['total'];
        echo "<td>$data</td>";
            ?>
        </tr>
        <tr>
            <td>Gjennsomsnitt responstid</td>
            <?php
        include_once 'connect.php';
        $sql = "SELECT *
        FROM problemer
        INNER JOIN under_behandling
        ON problemer.id = under_behandling.id";
          $result = mysqli_query($conn, $sql) or die("error".mysqli_error($conn));
          if (mysqli_num_rows($result) > 0) {
            while ($Row = mysqli_fetch_assoc($result)) {
                $reg_tid = $Row['tid'];
                $id = $Row['id'];
                $start_tid = $Row['tid_start'];

                $start = strtotime($reg_tid);
                $start = str_replace('/', '-', $start);
                $slutt = strtotime($start_tid);
                $slutt = str_replace('/', '-', $slutt);
                        echo round(abs($start - $slutt) / 60). " minute";
            }}




        // $sql = "SELECT * FROM problemer WHERE status='Under Arbeid'";
        // if ($result = mysqli_query($conn, $sql)) {
        //     while ($row = mysqli_fetch_assoc($result)) {
        //       $start_tid = $row['tid'];
        //       $id = $row['id'];
        //         $sql = "SELECT * FROM under_behandling WHERE id='$id'";
        //         if ($result2 = mysqli_query($conn, $sql)) {
        //             while ($row = mysqli_fetch_assoc($result2)) {
        //                 $slutt_tid = $row['tid'];
        //                 $start = strtotime($start_tid);
        //                 $start = str_replace('/', '-', $start);
        //                 $slutt = strtotime($slutt_tid);
        //                 $slutt = str_replace('/', '-', $slutt);
        //                 echo round(abs($start - $slutt) / 60). " minute";
        //     }}}}
            ?>
        </tr>
        <tr>
            <td>Gjennomsnitt totaltid</td>
        </tr>
    </table>
</body>
</html>