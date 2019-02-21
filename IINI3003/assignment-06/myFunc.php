<?php
/*
Title:      myFunc.php
Date:       18.02.2019
Author:     Eskil Uhlving Larsen
*/

function getContactInfo() {
    echo 'Kontaktinformasjon: 11223344, epost@oss.no';
}

function createMenu() {
    $pages = array(
        'index'=> 'Home',
        'createCookie'=> 'createCookie',
        'deleteCookie'=> 'deleteCookie',
        'page1'=> 'page1',
        'page2' => 'page2'
    );

    echo '<ul style="margin:0;padding:0;display:inline">';
    foreach ($pages as $page => $text) {
        // code...
        echo '<li style="display:inline; margin-right:10px">';
        echo '<a href="' . $page . '.php' . '">' . $text . '</a>';
        echo "</li>";
    }
    echo "</ul>";

    addLogin();
}

function addLogin() {
    echo '<form action="" method="get" style="display:inline;float:right">';
    echo '<input type="text" name="usr" placeholder="username";>';
    echo '<input type="password" name="pwd" placeholder="password">';
    echo '<button type="submit">Sign in</button>';
    echo '</form>';
}

?>
