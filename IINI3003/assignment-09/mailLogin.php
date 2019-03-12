<?php
/*
Title:      mailLogin.php
Date:       06.03.2019
Author:     Eskil Uhlving Larsen
*/

include 'func.inc.php';
createMenu();
?>

<h2>Login</h2>
<form action="emailSelfAdm.php" method="get">
E-mail<br>
<input name="email" type="text" size="25" /><br />
Pin<br>
<input name="pin" type="password" size="8" /><br />
<input type="submit" name="login" value="Login" /><br />
<input type="submit" name="forgot" value="Forgot pin" />
</form>
