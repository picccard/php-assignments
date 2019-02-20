<?php
/*
Title:      createCookie.php
Date:       18.02.2019
Author:     Eskil Uhlving Larsen
*/

if (isset($_POST['submit'])) {
    $textcolor = $_POST['textcolor'];
    $textfont = $_POST['textfont'];
    $textsize = $_POST['textsize'];
    $myName = $_POST['myName'];

    setcookie("textcolor", $textcolor, time() + 3600); /* expire in 1 hour */
    $_COOKIE['textcolor'] = $textcolor;
    setcookie("textfont", $textfont, time() + 3600);
    $_COOKIE['textfont'] = $textfont;
    setcookie("textsize", $textsize, time() + 3600);
    $_COOKIE['textsize'] = $textsize;
    setcookie("myName", $myName, time() + 3600);

    //echo '<meta http-equiv="refresh" content="0">';
    echo '<p>Created cookies</p>';
} else {
    echo '<p>No new cookie created.</p>';
}

$myTitle = 'Create Cookie';
include 'a_top.php';

echo '<div>';


echo '</div>';

echo '<a href="deleteCookie.php">View and delete cookies</a>';

include 'a_bottom.php';
 ?>
