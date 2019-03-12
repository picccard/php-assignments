<h1>Create database</h1>

<?php
/*
Title:      createDB.php
Date:       06.03.2019
Author:     Eskil Uhlving Larsen
*/

include 'func.inc.php';
$db = connectDB();

if ($db->query("CREATE DATABASE eskilul")) {
    echo '<p><b>Database created successfully.</b></p>';
} else {
    echo '<p><b>Database creation failed.</b></p>';
}

 ?>
