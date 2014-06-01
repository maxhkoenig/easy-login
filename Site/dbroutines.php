<?php
function db_connect() {
$hostname='host';
$username='user';
$password='psswrd';
$dbname='name_of_db';
$result = new mysqli($hostname, $username, $password, $dbname);
return $result;
}
?>