<?php
$servername = "ita03.vas-server.cz";

$username = "kdestosehnal_cz";
$password = "tOVi0eApgizmcyUO";

$db_name = "kdestosehnal_cz";

$database_log = new mysqli($servername,$username,$password,$db_name);

if ($database_log -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
?>