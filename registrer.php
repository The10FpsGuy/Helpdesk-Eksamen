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

    <label for="email"><b>Navn</b></label>
    <input type="text" placeholder="Skriv hele navnet ditt her" name="email" id="email" required>

    <label for="psw"><b>Telefonnummer</b></label>
    <input type="text" placeholder="Telefonnummer (8 siffre)" name="psw" id="psw" pattern="[0-9]{8}" required>

    <h3>Beskrivelse av problemet</h3>
    <textarea placeholder="Skriv beskrivelse av problemet ditt her..." name="beskrivelse" rows="10" cols="100">

    </textarea>
    <hr>

    <button type="submit" class="registerbtn">Registrer problem</button>
  </div>
</form> 
</body>
</html>