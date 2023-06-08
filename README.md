# Dokumentering på installasjon av Ubuntu server

1. Brukte VMWare Workstation Pro og Ubuntu-liveserver-22.01 ISO
2. Installerte helt basic, utenom extra installasjon av OpenSSH server. Jeg gjorde dette sånn at jeg kan koble opp imot SSH på pc-en min, og brukte SCP for å sende over filer enkelt
3. Brukernavn: tbmoen
   Servernavn: helpdesk
   ip-addr: 192.168.23.131
4. Installerte apache2 (sudo apt-get update && sudo apt-get install apache2)
5. Installerte MySQL (sudo apt-get install mysql-server)
6. Sette opp MySQL med den innebygde funksjonen (sudo mysql_secure_installation)
7. Installerte PHP (sudo apt install php libapache2-mod-php php-mysql)
8. For å teste PHP lage jeg en "info.php" fil, som inneholder bare 
"""
<?php
phpinfo();
?>
"""
9. Bruke git for å laste ned filene (git clone https://github.com/The10FpsGuy/Helpdesk-Eksamen.git)
10. Endre "connect.php" for å legge inn riktig passord til databasen som jeg lagde i steg 6
11. Logge inn i MySQL (sudo mysql -u root -p)
12. Lage Databasen (CREATE DATABASE helpdesk;)
13. Eksportere SQL script på PHPMyAdmin siden, og overføre det til Ubuntu Maskinen med SCP
14. Importere SQL scriptet til MySQL (sudo mysql -u root -p < "sql-script-fil.sql")
15. 
