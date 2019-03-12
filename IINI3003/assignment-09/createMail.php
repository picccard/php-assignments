<?php
/*
Title:      createMail.php
Date:       06.03.2019
Author:     Eskil Uhlving Larsen
*/

include 'func.inc.php';
createMenu();


$db = connectDB();
$sql = "SELECT * FROM emaillist";

$resultat = $db->query($sql);
if ( $resultat->num_rows == 0) {
	die("<h1>Error, something went wrong</h1>");
}

while($row = $resultat->fetch_assoc()){

    $to      = $row['email'];
    $subject = 'nyhetsbrev';
    $message = "Hei, " . $row['fname'] . " " . $row['lname'] . ", her er nyhetsbrevet som du abonnerer på.";
    //$melding = Hei, NAVN_PÅ_PERSONEN_HENTET_FRA_DATABASEN, her er nyhetsbrevet som du abonnerer på.

	$name = "Eskil Uhlving Larsen";
	$from = "eskilul@stud.ntnu.no";
	//$from_old = "webmaster@example.com";

	$headers = array(
		'MIME-Version: 1.0',
		'Content-type: text/plain; charset=UTF-8',
        "From: {$name} <{$from}>",
        "Reply-To: <{$from}>",
		"Subject: {$subject}",
        'X-Mailer: PHP/' . phpversion()
    );

	$headers = implode("\r\n", $headers);

    echo "<hr />";
	echo "To: " . $to;
	echo "<br>Subject: " . $subject;
    echo "<br>Message: " . $message;
    echo "<br>Headers: " . $headers;

    $ok = mail($to, $subject, $message, $headers);

    if ($ok) {
        echo "File Sent Successfully.";
    } else {
	print_r(error_get_last());
        die("Sorry but the email could not be sent. Please go back and try again!");
    }
}

 ?>
