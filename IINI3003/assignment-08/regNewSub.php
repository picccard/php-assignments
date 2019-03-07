<h1>Registrer new subscriber</h1>

<?php
/*
Title:      regNewSub.php
Date:       06.03.2019
Author:     Eskil Uhlving Larsen
*/

include 'func.inc.php';

$mail = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$interest = $_POST['interest'];

$pin = rand(10000000, 99999999);

$db = connectDB();

$sql = <<<SQL
    INSERT INTO emaillist
    (email, pin, fname, lname, interest)
    VALUES
    ('$mail', '$pin', '$fname', '$lname', '$interest');
SQL;

if ($db->query($sql)) {
	echo "<p><b>Row inserted!</b></p>";
	echo "<b>Query ran:</b><pre>$sql</pre>";
} else {
	echo "<p>An error occurred</p>";
}


 ?>
