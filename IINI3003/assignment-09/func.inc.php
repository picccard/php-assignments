<?php
/*
Title:      func.inc.php
Date:       06.03.2019
Author:     Eskil Uhlving Larsen
*/

function connectDB($dbName = "eskilul"){
	$host = "mysql.stud.iie.ntnu.no";
	$usr = "eskilul";
	$pwd = "7Qh4d1wb";

	$db = new mysqli($host, $usr, $pwd, $dbName);

    if ($db->connect_errno > 0) {
        die('Unable to connect to database [' . $db->connect_error . ']');
    }

	return $db; // No error
} // connectDB


function createMenu() {
    $pages = array(
		// page [.php] => Text_In_Menu
        'index'=> 'Home',
        'mailLogin'=> 'mailLogin',
		'createMail' => 'createMail',
        'printTable' => 'printTable'
    );

    echo '<ul style="margin:0;padding:0;display:inline">';
    foreach ($pages as $page => $text) {
        // code...
        echo '<li style="display:inline; margin-right:10px">';
        echo '<a href="' . $page . '.php' . '">' . $text . '</a>';
        echo '</li>';
    }
    echo '</ul><br>';
}


function sendNewPinMail($mailAddr, $newPin) {
	$to      = $mailAddr;
    $subject = 'New PIN';
    $message = 'Hello, your new PIN is: ' . $newPin;

	$name = 'noreply';
	$from = 'noreply@stud.ntnu.no';

	$headers = array(
		'MIME-Version: 1.0',
		'Content-type: text/plain; charset=UTF-8',
        "From: {$name} <{$from}>",
        "Reply-To: <{$from}>",
		"Subject: {$subject}",
        'X-Mailer: PHP/' . phpversion()
    );

	$headers = implode("\r\n", $headers);

    $ok = mail($to, $subject, $message, $headers);

	if (!$ok) {
		print_r(error_get_last());
	    die("<br>Mail not sent!");
	}
}



 ?>
