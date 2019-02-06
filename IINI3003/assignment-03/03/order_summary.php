<?php
/*
Title:      order_summary.php
Date:       06.02.2019
Author:     Eskil Uhlving Larsen
*/
$pizza_extras = array(
    //extra => price
    "mushroom",
    "salami",
    "ham",
    "olives",
    "tuna",
    "pepperoni"
);

$size = $_GET['pizzaSize'];
$crust = $_GET['crustType'];
$delivery_time = $_GET['arivalTime'];

echo "<h3>Ingredients:</h3>";
foreach ($pizza_extras as $food) {
    $temp = $_GET['chk' . ucfirst($food)];
    if ($temp) {
        echo 'Adding ' . $food . "<br>";
        echo "<img src=\"$food.png\" alt=\"$food\" height=\"190\" width=\"190\">" . "<br>";
    }
}

echo "<h3>Other</h3>";
echo "Size will be " . $size . "<br>";
echo "Crust type will be " . $crust . "<br>";
echo "Delivery-time will be " . $delivery_time . "<br>";

?>
