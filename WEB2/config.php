<?php
session_start();
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = "mdppoo"; /* Password */
$dbname = "projet"; /* Database name */

$con = mysqli_connect($host, $user, $password, $dbname);
// Check connection
if (!$con) {
  die("La connexion a échoué : " . mysqli_connect_error());
}

?>