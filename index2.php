<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
$q = intval($_GET['q']);

require 'dbinfo.php';


$sql="SELECT * FROM battle WHERE battle_id = '".$q."'";
$result = mysqli_query($conn,$sql);



while($row = mysqli_fetch_array($result)) {
  
    echo "<h1>".  $row['battle_name'] . "</h1>" ;
    
    echo "<h3> Date: ". $row['date']. "</h3>" ;
     echo "<h3> Location: ". $row['locationName'] . "</h3>";
     
    echo"<h4 style='font-size:20px;'>". $row['description']. "</h4>";
   
    
}

mysqli_close($conn);
?>
</body>
</html>