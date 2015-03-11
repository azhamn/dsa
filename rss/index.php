<?php

require('db.php');
header("Content-Type: text/xml; charset=UTF-8");



$sql = "SELECT battle_name FROM battle";
$query = mysql_query($sql) or die(mysql_error());

$battleList = array();

while ($row = mysql_fetch_array($query)) {

    array_push($battleList, $row['battle_name']);
}
echo "<?xml version='1.0' encoding='UTF-8'?> 

<rss version='2.0'> 
<channel >
  <title>DSA | RSS Feed </title> 
  
  <description>RSS feed for DSA assignment</description> 
  <language>en-us</language>";
for ($i = 0; $i < sizeof($battleList); $i++) {
    $sql = "Select * from battle WHERE battle_name = '" . $battleList[$i] . "'";
    $query = mysql_query($sql) or die(mysql_error());
    echo "<item>";
    while ($row = mysql_fetch_array($query)) {

        echo "<title>" . $row['battle_name'] . "</title>";

        echo "  <link> " . $row['hlink'] . "</link>";

        echo "<description><![CDATA[ "
        . "<date><b>Date:</b> " . $row['date'] . " <b>Location:</b> " . $row['locationName'] . "</date></br >
  <descript>" . $row['description'] . "</descript></br >
    </br >
  <battleinfo><b>No. People Involved:</b> " . $row['noPeopleInvolved'] . " <b>Deaths:</b> " . $row['deaths'] . " <b>Wounded:</b> " . $row['wounded'] . "</battleinfo></br >
    </br >
  <beligerents><b>Sides:</b> " . $row['Beligerents'] . "</beligerents></br >
    </br >
  <outcome><b>Outcome:</b> " . $row['outcome'] . "</outcome></br >
    </br >";
    }

    $sql = "SELECT name,side FROM battle, leader, battleLeaders WHERE battle_id = battle_battle_id AND name_id = leaders_name_id AND battle_name = '" . $battleList[$i] . "' ORDER BY side, name ";
    $query = mysql_query($sql) or die(mysql_error());
    echo "<leaders><b>Leaders: </b>";
    while ($row = mysql_fetch_array($query)) {

        echo $row['name'] . "</br >";
    }
    echo "</leaders></br >";
    echo "]]></description> </item>";
}
echo" 
    </channel>
</rss>";
?>

