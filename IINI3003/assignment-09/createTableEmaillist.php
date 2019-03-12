<h1>Create database table</h1>

<?php
/*
Title:      createTableEmaillist.php
Date:       06.03.2019
Author:     Eskil Uhlving Larsen
*/

include 'func.inc.php';

$db = connectDB();
$sql = <<<SQL
CREATE TABLE emaillist (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR( 20 ) NOT NULL ,
    pin VARCHAR( 8 ) ,
    fname VARCHAR ( 50 ) ,
    lname VARCHAR ( 50 ) ,
    interest VARCHAR ( 50 )
)
SQL;

if ($db->query($sql)) {
	echo '<p><b>Table created!</b></p>';
	echo "<b>Query ran:</b><pre>$sql</pre>";
} else {
	echo "<p>Table not created, something went wrong</p>";
}

 ?>
