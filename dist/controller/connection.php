<?php
$servername = "localhost";
$username = "root";
$password = "XdEgOLLS[b_Jx[xA";
$dbname = "FuturePresident";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
