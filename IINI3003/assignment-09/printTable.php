<?php
/*
Title:      printTable.php
Date:       06.03.2019
Author:     Eskil Uhlving Larsen
*/

include 'func.inc.php';
createMenu();

echo "<h1>List all subscribers</h1>";

$db = connectDB();

$sql = <<<SQL
    SELECT * FROM emaillist;
SQL;

$result = $db->query($sql);

echo '<hr />';

while ($row = $result->fetch_assoc()) {
    echo "Name: " . $row['fname'] . " " . $row['lname'];
    echo "<br>Email: " . $row['email'];
    echo "<hr />";
}

 ?>
