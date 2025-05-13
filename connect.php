<?php
$server = 'localhost';
$username = 'root';
$password = '';
$db_name = 'db_rueangsak';
$conn = mysqli_connect($server, $username, $password, $db_name);

mysqli_query($conn, "SET NAMES UTF8")
    ?>