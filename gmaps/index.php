 <?php
require 'dbinfo.php';

        $sql = "SELECT * FROM battle";
      $result = mysqli_query($conn, $sql);

        

$battles = array();
           
          

            while ($row = mysqli_fetch_array($result)) {
     
              
               
                array_push($battles, array("id" => $row["battle_id"],"battle_name" => $row["battle_name"], "name" => str_replace(" ", "", $row["battle_name"]),"description" => $row["description"], "beligerents" => $row["Beligerents"],"outcome" => $row["outcome"],"lat" => $row["lat"],"lng" => $row["lng"] ));
                
            }
      
                
          $numberOfBattles = sizeof($battles);
       
        $conn->close();
        ?>