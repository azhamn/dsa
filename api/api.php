<?php

require 'dbinfo.php';

$format = $_GET['f'];

if (!isset($_GET['c'])) {
    $category = "";
} else {

    $category = $_GET['c'];
}

if (!isset($_GET['n'])) {
    $name = "";
    $sql = "SELECT * FROM " . $category;
} else {
    $name = $_GET['n'];
    
        if ($category == "battle")
        {
              $sql = "SELECT * FROM " . $category . " WHERE battle_name = '" . $name . "'";
            
        }
        elseif ($category == "leader")
        {
             $sql = "SELECT * FROM " . $category . " WHERE name = '" . $name . "'";
        }
    
  
    
}






$result = $conn->query($sql);

$rootElement = $category . "s";
if ($format == "xml") {
  //  echo $sql;
    $xml = "";
    //root element start
    $xml .= "<$rootElement>";
    while ($result_array = mysqli_fetch_assoc($result)) {
        $xml .= "<$category>";

        //loop through each key,value pair in row
        foreach ($result_array as $key => $value) {
            if ($key == "name_id" || $key == "battle_id") {
                continue;
                ;
            } else {
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