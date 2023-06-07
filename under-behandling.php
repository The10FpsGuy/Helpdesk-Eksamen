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

        $sql = "INSERT INTO under_behandling (navn, tid, status, id)
        VALUES ('$navn', '$tid', 'Pågående', $case_id)";

        if ($conn->query($sql) === TRUE) {
            $sql = "UPDATE problemer SET status='Pågående' WHERE id='$case_id'";
            if ($conn->query($sql) === TRUE) {
                header("Location: index.php");
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        }}
    ?>   
        <h2>Oversikt over cases som har blitt startet</h2>  
    </body> 
</html>