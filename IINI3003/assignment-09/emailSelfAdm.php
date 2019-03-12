<?php
/*
Title:      emailSelfAdm.php
Date:       06.03.2019
Author:     Eskil Uhlving Larsen
*/

include "func.inc.php";
createMenu();
$db = connectDB(); //trenger ikke oppgi databasenavn


if (isset($_GET['forgot'])) { // Forgot password
	$mail = $_GET['email'];

    $sql = <<<SQL
        SELECT id
		FROM emaillist
		WHERE email = ?
SQL;

	$statement = $db->prepare($sql);
	$statement->bind_param("s", $mail);
	$statement->execute();
	$statement->store_result();

	if($statement->num_rows === 0) {
		die("<h2>Unknown mail.</h2>");
	}
	$statement->close();

	// Mail exists, gen new pin, send it to users email

	$newPin = rand(10000000, 99999999);
	$sql = <<<SQL
		UPDATE emaillist
		SET pin = ?
		WHERE email = ?
SQL;

	$statement = $db->prepare($sql);
	$statement->bind_param("ss", $newPin, $mail);
	$statement->execute();
	$statement->close();

	sendNewPinMail($mail, $new_pin);
	die("<h2>New PIN is sent to your email.<h2>");
} // Forgot pin end

// Login
$email = $_GET['email'];
$pin = $_GET['pin'];

$sql = <<<SQL
	SELECT id, email, pin, fname, lname, interest
	FROM emaillist
	WHERE email = ? AND pin = ?
SQL;

$statement = $db->prepare($sql);
$statement->bind_param("ss", $email, $pin);
$statement->execute();
$statement->store_result();
$statement->bind_result($usrId, $usrEmail, $usrPin, $usrFname, $usrLname, $usrInterest);
if ($statement->num_rows === 0) {
	die("<h1>Username or password is wrong</h1>");
}
$statement->fetch();
//echo "$usrId, $usrEmail, $usrPin, $usrFname, $usrLname, $usrInterest";
//$statement->close();

?>

<h2>Change or delete subscription</h2>

<form action="emailChangeOrDelete.php" method="post">
<table border="0" cellpadding="0" cellspacing="20">
<tr><td valign="top">
	<input name="email"
		type="text"
		size="25"
		value="<?php echo $usrEmail; ?>"></td>
<td align="left" valign="top">
	(*) Email
	<input type="hidden"
		name="old_email"
		value="<?php echo $usrEmail; ?>">
</td></tr>

<tr><td valign="top">
	<input name="pin"
		type="text"
		size="10"
		maxlength="8"
		value="<?php echo $usrPin; ?>"></td>
<td align="left" valign="top">
	(*) Pin
	<input type="hidden"
		name="old_pin"
		value="<?php echo $usrPin; ?>">
</td></tr>

<tr><td valign="top">
	<input name="fname"
		type="text"
		size="25"
		value="<?php echo $usrFname; ?>"></td>
<td align="left" valign="top">
	First name
</td></tr>

<tr><td valign="top">
	<input name="lname"
		type="text"
		size="25"
		value="<?php echo $usrLname; ?>"></td>
<td align="left" valign="top">
	Last name
</td></tr>

<tr><td valign="top">
	<select name="interest">
		<?php
		$interests = array("php" => "PHP",
							  "soccer" => "Soccer",
							  "sewclub" => "Sewclub");
		foreach ($interests as $key => $value) {
			echo "<option value='$key'";
			if ($key == $usrInterest) {
				echo " selected";
			}
			echo ">$value</option>\n\n";
		}
		?>
	</select><br></td>
<td valign="top">
	Pick a interest from the list<br>
</td></tr>

<tr><td valign="top">
	<input name="change"
		type="submit"
		value="Update changes"><p>
	<input name="delete"
		type="submit"
		value="Delete subscription"></td>
</tr>

</table></form>
