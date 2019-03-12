<?php
/*
Title:      formNewSub.php
Date:       06.03.2019
Author:     Eskil Uhlving Larsen
*/ ?>
<h3>Register to the newsletter</h3>
	<form action="regNewSub.php" method="post">
	  <table border="0" cellpadding="0" cellspacing="20">
		<tr>
		  <td valign="top"><input name="email" type="text" size="35"></td>
		  <td align="left" valign="top">(*) Email </td>
		</tr>
		<tr>
		  <td valign="top"><input name="fname" type="text" size="35"></td>
		  <td align="left" valign="top">Firstname</td>
		</tr>
		<tr>
		  <td valign="top"><input name="lname" type="text" size="35"></td>
		  <td align="left" valign="top">Lastnamen</td>
		</tr>
		<tr>
		  <td valign="top">
			<select name="interest">
			<option value="php">PHP</option>
			<option value="soccer">Soccer</option>
			<option value="sewclub">Sewclub</option>
			</select>
		</td>
		  <td  valign="top">Choose a interest from the list. </td>
		</tr>
		<tr>
		  <td valign="top"><input name="signUp" type="submit" value="Sign me up for the newsletter!"></td>
		  <td align="left" valign="top">Sign your email up for a newsletter. Unsubscribe from the newsletter anytime.</td>
		</tr>
	  </table>
	</form>
