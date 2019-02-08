<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Dates</title>
  </head>
  <body>
    <?php
    /*
    Title:      show_date.php
    Date:       04.02.2019
    Author:     Eskil Uhlving Larsen
    */

    // Prints the day
    echo "Today is " . date("l") . "<br>" . "\n\t";

    // Prints the day, date, month, year, time, AM or PM
    echo date("l jS \of F Y h:i:s A") . "<br>" . "\n\t";

    // Use a constant in the format parameter
    echo date(DATE_RFC822) . "<br>" . "\n\t";

    // prints something like: 1975-10-03T00:00:00+00:00
    echo date(DATE_ATOM) . "\n";

    ?>
  </body>
</html>
