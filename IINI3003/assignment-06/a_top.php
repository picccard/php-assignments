<?php
/*
Title:      a_top.php
Date:       18.02.2019
Author:     Eskil Uhlving Larsen
*/
 ?>

<html>
<head>
    <title><?php echo $myTitle; ?></title>
</head>
<body>
<style>
    body {
        color: <?php if (isset($_COOKIE['textcolor'])) echo $_COOKIE['textcolor']; ?>;
        font-size: <?php if (isset($_COOKIE['textsize'])) echo $_COOKIE['textsize']; ?>px;
        font-family: <?php if (isset($_COOKIE['textfont'])) echo $_COOKIE['textfont']; ?>;
    }
    a:link, a:visited, a:hover {
        color: <?php if (isset($_COOKIE['textcolor'])) echo $_COOKIE['textcolor']; ?>;
    }
</style>
<?php
include 'myFunc.php';
createMenu();
 ?>
