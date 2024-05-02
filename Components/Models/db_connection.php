<?php
function connection() {
  $host = 'localhost';
  $dbname = 'fiscal_fantasybdd';
  $dbusername = 'root';
  $password = '';
  $conn = mysqli_connect($host, $dbusername, $password, $dbname) or die('could not connect to database.');

  return $conn;
}
