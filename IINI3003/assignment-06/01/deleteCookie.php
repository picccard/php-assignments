<?php
/*
Title:      deleteCookie.php
Date:       18.02.2019
Author:     Eskil Uhlving Larsen
*/
// should i delete cookies?
if (isset($_POST['deleteCookies'])) {
    setcookie("textcolor", $textcolor, time() -1);
    setcookie("textfont", $textfont, time() - 1);
    setcookie("textsize", $textsize, time() -1 );
    setcookie("myName", $myName, time() - 1);
    unset($_COOKIE['textcolor']);
    unset($_COOKIE['textfont']);
    unset($_COOKIE['textsize']);
    unset($_COOKIE['myName']);
}

$myTitle = 'Delete Cookie';
include 'a_top.php';

// display cookies if they exist
if (!empty($_COOKIE)){
    echo "<pre>";
    print_r($_COOKIE);
    echo "</pre>";

    // create delete-cookies button
    echo '
    <form action="' . $_SERVER['PHP_SELF'] . '" method="post">
        <input type="submit" name="deleteCookies" value="Delete Cookies">
    </form>';
}

include 'a_bottom.php';
 ?>

<!-- delete cookies? -->
