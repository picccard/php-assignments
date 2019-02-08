<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Quotes</title>
  </head>
  <body>
    <?php

    /*
    Title:      hermetegn.php
    Date:       04.02.2019
    Author:     Eskil Uhlving Larsen
    */

    /*
    Hvilke fordeler og ulemper ser du knyttet til bruk markører for en tekststreng?
    (anførselstegn ") vs (fnutter ')

    A single-quoted string does not have variables within it interpreted. A double-quoted string does.

    Also, a double-quoted string can contain apostrophes without backslashes,
    while a single-quoted string can contain unescaped quotation marks.

    The single-quoted strings are faster at runtime because they do not need to be parsed.
    Single quoted strings also use less memory.
    */

    $name = 'Bob Ross';

    echo 'Single quote';
    echo '<br>';
    echo 'Start with a simple string';
    echo '<br>';
    echo 'String\'s apostrophe';
    echo '<br>';
    echo 'String with a php variable' . $name;
    echo '<br>';
    echo 'The variable $name will not be interpreted';
    echo '<br>';

    echo "Double quote";
    echo '<br>';
    echo "Start with a simple string";
    echo '<br>';
    echo "String's apostrophe";
    echo '<br>';
    echo "String with a php variable {$name}";
    echo '<br>';
    echo "The variable-content will be interpreted and is $name";

    ?>

  </body>
</html>
