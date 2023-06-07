<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logg Inn</title>
    <link rel="stylesheet" href="css/logginn.css">
</head>
<body>
    <div class="login-page">
        <div class="form">
          <form class="login-form" action="#" method="POST">
            <input name="username" type="text" placeholder="Brukernavn" required/>
            <input name="password" type="password" placeholder="Passord" required/>
            <button>Logg inn</button>
          </form>
        </div>
      </div>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

include_once 'connect.php';
// Henter brukernavn og passord som har blitt brukt, passordet ligger kryptert i databasen så den bare sammenligner de krypterte passordene
$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($password);

$sql = "SELECT * FROM brukere WHERE brukernavn = '$username' AND passord = '$password'";


$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);  

//Hvis man får logget inn, så setter det en cookie som gjelder for 1mnd.
if($count >= 1){  
    setcookie('loggetinn', 'True', time() + (86400 * 30), "/");
    header("Location: index.php");
}  
else{  
    header("Location: error403.html");  
}}
?>