<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$format = $_GET['f'];

if (!isset($_GET['c'])) {
    $category = "";
} else {

    $category = $_GET['c'];
}



$servername = "stocks";
$username = "fet13023117";
$password = "H46LMffy";
$database = "fet13023117";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM " . $category;
$result = $conn->query($sql);

$rootElement = $category . "s";
if ($format == "xml") {
    $xml = "";
    //root element start
    $xml .= "<$rootElement>";
    while ($result_array = mysqli_fetch_assoc($result)) {
        $xml .= "<$category>";

        //loop through each key,value pair in row
        foreach ($result_array as $key => $value) {
            if($key == "name_id" ||$key == "battle_id" )
            {
                continue;; 
            }
            else
            {
            $xml .= "<$key>";
            $xml .="$value";
            $xml .="</$key>";
            }
        }
        $xml .= "</$category>";
    }

    $xml .= "</$rootElement>";
    header("Content-Type:text/xml");
    echo $xml;
} elseif ($format == "json") {
    $encode = array();

    while ($row = mysqli_fetch_array($result)) {
        array_push($encode, $row);
    }

    echo json_encode($encode);
} else {
    header('Location: 404.php');
}
?>