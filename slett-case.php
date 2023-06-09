<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpdesk: Slett case</title>
    <link href="css/slett-case.css" rel="stylesheet">
</head>
<body>
<div class="form">
        <h2>Marker case som ferdig</h2>   

        <form action="#" method = "POST" >    
            <div class = "container">
                     <div class = "form_group"> 
                     <label>Navn på behandler</label>    
                    <input class="input" type = "text" name = "navn" value = "" required />   
                    <label>Case-ID</label>    
                    <input class="input" type = "text" name = "case_id" value = "" required />
                    <label>Løsning</label>    
                    <textarea class="input" placeholder="Skriv Løsningen på problemet ditt her" name="løsning" maxlength="1000" required>
</textarea> 
                </div>   
                <div class = "form_group">    
                    <label>Er case-id riktig?</label>    
                    <input class="input" type = "checkbox" required/>    
                </div>    

                <button type="submit" class="registerbtn">Marker</button>
            </div>    
        </form>
        </div> 
        <table>
    <tr>
            <th>Navn</th>
            <th>Status</th>
            <th>Dato og Tid</th>
            <th>Løsning</th>
            <th>ID</th>
        </tr>
        <?php
        include_once 'connect.php';
        // Skriver ut alle case-er som er logga
        $sql = "SELECT * FROM ferdig";
        if ($result = mysqli_query($conn, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
              $navn = $row['navn'];
              $status = $row['status'];
              $tid = $row['tid'];
              $løsning = $row['løsning'];
              $id = $row['id'];
            
            echo "<tr>";
                echo "<td>$navn</td>";
                echo "<td>$status</td>";
                echo "<td>$tid</td>";
                echo "<td>$løsning</td>";
                echo "<td>$id</td>";
            echo "</tr>";
            }}
            ?>
    </table>
</body>
</html>
<?php
// Sjekker cookies
         if (isset($_COOKIE['loggetinn'])) {
            $cookie_value = $_COOKIE['loggetinn'];
          } else {
            header("Location: error403.html");
          }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include_once 'connect.php';

        date_default_timezone_set("Europe/Amsterdam");
        $tid = date("d/m/Y H:i");
        $navn = $_POST['navn'];
        $id = $_POST['case_id'];
        $løsning = $_POST['løsning'];
        $sql = "UPDATE problemer SET status='Ferdig' WHERE id='$id'";
        $result = $conn->query($sql);
        
        if ($result) {
            // Hvis den ikke finner case_id-en i problemer tabellen så sier den at den ikke finner den, hvis den finner den så går den videre, og markerer som ferdig
            if ($conn->query($sql) === TRUE) {
                $sql = "DELETE FROM under_behandling WHERE id='$id'";
                if ($conn->query($sql) === TRUE) {
                    $sql = "INSERT INTO ferdig (navn, status, tid, løsning, id) VALUES ('$navn', 'Løst', '$tid', '$løsning', '$id')";
                    if ($conn->query($sql) === TRUE) {
                        header("Location: index.php");
                    }
                }
            } else {
                echo 'Fant ikke ID';
            }
                if ($conn->query($sql) === TRUE) {
                    header("Location: index.php");
        } else {
          echo "Error: " . $sql . "<br>" . $conn->$error;
        }}}
?>