<?php
/*
Title:      greeting.php
Date:       18.02.2019
Author:     Eskil Uhlving Larsen
*/

$outputColor = "black";
$outputText = "";
$day = date('N');
$hr = date('G');
$greetings = array( // High to low order
    'Good Evening' => 19,
    'Good Afternoon' => 11,
    'Good Morning' => 4
);

if ($day == 7) {
    $outputColor = "green";
}

foreach ($greetings as $greeting => $timeStamp) {
    if ($hr >= $timeStamp) {
        $outputText = $greeting;
        break;
    }
}

echo '<p style="color:' . $outputColor . '">' . "$outputText</p>";

?>
