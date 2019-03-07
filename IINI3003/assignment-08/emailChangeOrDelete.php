<?php
/*
Title:      emailChangeOrDelete.php
Date:       06.03.2019
Author:     Eskil Uhlving Larsen
*/

include 'func.inc.php';
createMenu();
$db = connectDB();

// Delete sub
if (isset ($_POST['delete']) ) {
    $oldEmail = $_POST['old_email'];
    $oldPin = $_POST['old_pin'];

    $sql = <<<SQL
        DELETE FROM emaillist
        WHERE email = '$oldEmail' AND pin = '$oldPin'
SQL;

	$db->query($sql);
	echo "<h2>Unsubscribed</h2>";
	//echo "<pre>$sql</pre>";
}

// Change sub
elseif (isset ($_POST['change'])) {
    $oldEmail = $_POST['old_email'];
    $oldPin = $_POST['old_pin'];
    $pin = $_POST['pin'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $interest = $_POST['interest'];

    $sql = <<<SQL
        UPDATE emaillist
        SET pin = '$pin',
        email = '$email',
        fname = '$fname',
        lname = '$lname',
        interest = '$interest'
        WHERE email = '$oldEmail' AND pin = '$oldPin'
SQL;

	$db->query($sql);
	echo "<h2>Profile updated</h2>";
}


 ?>
