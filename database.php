<?php
    
    //CONNECT TO MYSQL DATABASE USING MYSQLI
    
$servername = "localhost";
$username = "root";
$password = "19569195s";
$basename = "YouCodeScrumBorad-V2";
// Create connection
$conn = new mysqli($servername, $username, $password,$basename);

// Check connection
if ($conn) {
    echo "Connected successfully";

}
 echo ("Connection failed");
?>