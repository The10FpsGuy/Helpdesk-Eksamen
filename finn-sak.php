<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Søke Funksjon</title>
</head>
<body>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);

    body{
    background: #f2f2f2;
    font-family: 'Open Sans', sans-serif;
    }

    .search {
    width: 100%;
    position: relative;
    display: flex;
    }

    .searchTerm {
    width: 100%;
    border: 3px solid black;
    border-right: none;
    padding: 5px;
    height: 40px;
    border-radius: 5px 0 0 5px;
    outline: none;
    color: #9DBFAF;
    }

    .searchTerm:focus{
    color: #00B4CC;
    }

    .searchButton {
    width: 56px;
    height: 56px;
    border: 1px solid #00B4CC;
    background: #00B4CC;
    text-align: center;
    color: #fff;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    font-size: 20px;
    }

    .wrap{
    width: 40%;
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    }

    table {
        width: 100%;
        text-align: center;
    }
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
            <th>Dato og Tid</th>
            <th>ID</th>
        </tr>
        <?php
        if (isset($_COOKIE['loggetinn'])) {
            $cookie_value = $_COOKIE['loggetinn'];
        } else {
            header("Location: error403.html");
        }
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                include_once 'connect.php';

             $søkeord = $_POST['søkeord'];
              $sql = "SELECT * FROM problemer WHERE navn = '$søkeord' OR  tlf = '$søkeord' OR id = '$søkeord' ORDER BY id ASC";
              $result = mysqli_query($conn, $sql);
            
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