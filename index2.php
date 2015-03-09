<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php
        $q = intval($_GET['q']);
        require 'dbinfo.php';
        $sql = "SELECT * FROM battle WHERE battle_id = '" . $q . "'";
        $sql1 = "SELECT name,side FROM battle, leader, battleLeaders WHERE battle_id = battle_battle_id AND name_id = leaders_name_id AND battle_id = '" . $q . "' ORDER BY side, name ";
        $result = mysqli_query($conn, $sql);
        $result1 = mysqli_query($conn, $sql1);
        while ($row = mysqli_fetch_array($result)) {
            echo "<h1>" . $row['battle_name'] . "</h1>";
            echo "<h3> Date: " . $row['date'] . "</h3>";
            echo "<h3> Location: " . $row['locationName'] . "</h3>";
        }
        $temp;

        while ($row = mysqli_fetch_array($result1)) {

            if ($row['side'] == $temp) {
                for ($i = 0; $i < (strlen($row['side']) * 2.55); $i++) {
                    echo "&nbsp;";
                }
                echo "<span style='font-weight:bold;'>" . $row['name'] . "<br /> </span>";
            } elseif (strlen($temp) == 0) {
                echo "<span style='font-weight:bold;'>" . $row['side'] . " - " . $row['name'] . " <br /> </span>";
            } elseif (strlen($temp) != 0) {
                echo "<br /> <span style='font-weight:bold;'>" . $row['side'] . " - " . $row['name'] . " <br /> </span>";
            }
            $temp = $row['side'];
        }
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            echo"<h4 style='font-size:20px;'>" . $row['description'] . "</h4>";
        }
        mysqli_close($conn);
        ?>
    </body>
</html>