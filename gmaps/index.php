 <?php
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
      $result = mysqli_query($conn, $sql);

        

$battles = array();
           
          

            while ($row = mysqli_fetch_array($result)) {
     
              
               
                array_push($battles, array("id" => $row["battle_id"],"battle_name" => $row["battle_name"], "name" => str_replace(" ", "", $row["battle_name"]),"description" => $row["description"], "beligerents" => $row["Beligerents"],"outcome" => $row["outcome"],"lat" => $row["lat"],"lng" => $row["lng"] ));
                
            }
      
                
          $numberOfBattles = sizeof($battles);
       
        $conn->close();
        ?>