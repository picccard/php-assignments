<?php
/*
Title:      ads.php
Date:       18.02.2019
Author:     Eskil Uhlving Larsen
*/

$var = substr((date('U') . ''), -1);
echo 'AD:<br>';
echo '<img src="nr_' . $var . '.jpg" style="max-width:10%;height:auto;display:block;margin-left:auto;margin-right:auto;">';
echo 'Content:<br>';

?>
