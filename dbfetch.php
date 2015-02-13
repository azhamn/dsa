 <?php

require'dbinfo.php';

$sql = "SELECT * FROM battle";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 

$lngArray = array();
$index = 0;

while($row = mysqli_fetch_array($result)){
	$Array[$index] = $row;
	$index ++;
}
} else {
    echo "0 results";
}
$conn->close();

?>



