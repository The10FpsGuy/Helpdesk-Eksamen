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
                    <label>Case-ID</label>    
                    <input type = "text" name = "case_id" value = "" required />    
                </div>   
                <div class = "form_group">    
                    <label>Er case-id riktig?</label>    
                    <input type = "checkbox" required/>    
                </div>    

                <button type="submit" class="registerbtn">Marker</button>
            </div>    
        </form>
        </div> 
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

        $id = $_POST['case_id'];
        $sql = "UPDATE problemer SET status='Ferdig' WHERE id='$id'";
        $result = $conn->query($sql);
        if ($result) {
            // Hvis den ikke finner case_id-en i problemer tabellen så sier den at den ikke finner den, hvis den finner den så går den videre, og markerer som ferdig
            if ($conn->query($sql) === TRUE) {
                $sql = "DELETE FROM under_behandling WHERE id='$id'";
            } else {
                echo 'Fant ikke ID';
            }
                if ($conn->query($sql) === TRUE) {
                    header("Location: index.php");
        } else {
          echo "Error: " . $sql . "<br>" . $conn->$error;
        }}}
?>