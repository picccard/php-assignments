<?php
/*
Title:      form.php
Date:       06.02.2019
Author:     Eskil Uhlving Larsen
*/
?>

<form action="hobby.php" method="get">
Name?
<input type="text" name="name" value=""><br>
Hobby? <br>
<select name="hobby">
    <option value="sports">Sports</option>
    <option value="painting">Painting</option>
    <option value="pc">PC</option>
    <option value="reading">Reading</option>
</select>

<input type="submit" value="Next">
</form>
