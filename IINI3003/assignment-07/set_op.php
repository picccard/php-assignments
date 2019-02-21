<?php

/*
Title:      set_op.php
Date:       18.02.2019
Author:     Eskil Uhlving Larsen
*/

echo '<h1>Set Operations</h1>';

$filename1 = 'a.txt';
$filename2 = 'b.txt';

$file1 = file($filename1);
$file2 = file($filename2);

echo '-----------------------';
echo '3A - Raw';
echo '-----------------------' . '<br>';
echo $filename1;
printArray($file1);
echo $filename2;
printArray($file2);

function printArray($somearray) {
    echo '<pre>';
    print_r($somearray);
    echo '</pre>';
}


echo '-----------------------';
echo '3B - Intersection';
echo '-----------------------';
echo '<br>' . 'result = values in both arrays';
$result = array_intersect($file1, $file2);
printArray($result);


echo '-----------------------';
echo '3C - Simple Difference';
echo '-----------------------';
echo '<br>' . 'result = values in array1 and not in array2';
$result = array_diff($file1, $file2);
printArray($result);


echo '-----------------------';
echo '3D - Union';
echo '-----------------------';
echo '<br>' . 'result = values in array1 + values in array2';
$result = array_unique(array_merge($file1, $file2));
// unique removes any duplicates
printArray($result);


echo '-----------------------';
echo '3E - Symmetric Difference';
echo '-----------------------';
// result1 = values in array1 and not in array2
$result1 = array_diff($file1, $file2);
// result2 = values in array2 and not in array1
$result2 = array_diff($file2, $file1);
$result_total = array_merge($result1, $result2);
echo '<br>' . 'result = values in array1 and not in array2 + values in array2 and not in array1';
printArray($result_total);





?>
