<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrer sak</title>
    <link href="css/registrer.css" rel="stylesheet">
</head>
<body>
<form action="#" method="POST">
  <div class="container">
    <h1>Registrere et problem</h1>
    <hr>

    <label for="navn"><b>Navn</b></label>
    <input type="text" placeholder="Skriv hele navnet ditt her" name="navn" id="email" required>

    <label for="tlf"><b>Telefonnummer</b></label>
    <input type="text" placeholder="Telefonnummer (8 siffre)" name="tlf" id="psw" pattern="[0-9]{8}" required>

    <h3>Beskrivelse av problemet</h3>
    <textarea placeholder="Skriv beskrivelse av problemet ditt her..." name="beskrivelse" rows="10" cols="100" required>

    </textarea>
    <hr>

    <button type="submit" class="registerbtn">Registrer problem</button>
  </div>
</form> 
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helpdesk";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$navn = $_POST['navn'];
$tlf = $_POST['tlf'];
$beskrivelse = $_POST['beskrivelse'];

$sql = "INSERT INTO problemer (navn, tlf, beskrivelse, status)
VALUES ('$navn', '$tlf', '$beskrivelse', 'Uløst')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.html");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?> 