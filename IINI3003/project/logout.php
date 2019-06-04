<?php
/*
Title:      logout.php
Date:       13.03.2019
Author:     Eskil Uhlving Larsen
*/

session_start();

session_destroy();

echo 'You have cleaned session';
header('Refresh: 2; URL = login.php');
?>
