<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpdesk: Sett en sak til under behandling</title>
    <link rel="stylesheet" href="css/under-behandling.css">
</head>
<body>    
        <link href = "registration.css" type = "text/css" rel = "stylesheet" />    
        <div class="form">
        <h2>Start behandling av case</h2>   

        <form action="#" method = "POST" >    
            <div class = "container">    
                <div class = "form_group">    
                    <label>Navn på behandler</label>    
                    <input type = "text" name = "navn" value = "" required/>    
                </div>    
                <div class = "form_group">    
                    <label>Case-ID</label>    
                    <input type = "text" name = "case_id" value = "" required />    
                </div> 
                <button type="submit" class="registerbtn">Start behandling</button>
            </div>    
        </form>
        </div> 
        <?php
         if (isset($_COOKIE['loggetinn'])) {
            $cookie_value = $_COOKIE['loggetinn'];
          } else {
            header("Location: error403.html");
          }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include_once 'connect.php';

        $navn = $_POST['navn'];
        $case_id = $_POST['case_id'];
        date_default_timezone_set("Europe/Amsterdam");
        $tid = date("d/m/Y h:i");
        $sql = "SELECT * FROM problemer WHERE id='$case_id'";

        $result = $conn->query($sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $sql = "INSERT INTO under_behandling (navn, tid, status, id) VALUES ('$navn', '$tid', 'Under arbeid', $case_id)";
            } else {
                echo 'Fant ikke ID';
            }
                if ($conn->query($sql) === TRUE) {
                    $sql = "UPDATE problemer SET status='Under arbeid' WHERE id='$case_id'";
                        if ($conn->query($sql) === TRUE) {
                            header("Location: index.php");
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }}}}
    ?>   
        <h2>Oversikt over cases som har blitt startet</h2>  
        <table>
    <tr>
            <th>Navn</th>
            <th>Status</th>
            <th>Dato og Tid</th>
            <th>ID</th>
        </tr>
        <?php
        include_once 'connect.php';
        $sql = "SELECT * FROM under_behandling";
        if ($result = mysqli_query($conn, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
              $navn = $row['navn'];
              $status = $row['status'];
              $tid = $row['tid'];
              $id = $row['id'];
            
            echo "<tr>";
                echo "<td>$navn</td>";
                echo "<td>$status</td>";
                echo "<td>$tid</td>";
                echo "<td>$id</td>";
            echo "</tr>";
            }}
            ?>
        </table>
    </body> 
</html>