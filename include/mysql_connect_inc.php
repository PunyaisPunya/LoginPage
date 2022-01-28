<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'code_legions_database');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die("Couldn't Connect to database:".mysqli_connect_error());

 ?>