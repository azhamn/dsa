<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$servername="stocks";
$username="fet13023117";
$password="H46LMffy";
$database="fet13023117";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM battle";
$result = $conn->query($sql);
        


$encode = array();

 while ($row = mysqli_fetch_array($result)) {
     array_push($encode, $row);
            
        }
  
echo json_encode($encode);

 
  
?>