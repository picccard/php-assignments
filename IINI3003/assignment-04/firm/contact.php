<?php
/*
Title:      contact.php
Date:       18.02.2019
Author:     Eskil Uhlving Larsen
*/

    include "header.php";
?>

<h1>Welcome to the contact-page</h1>

<p>
    Take me back to <a href="index.php">start</a>.
</p>

<p style="text-align:right;">
    <?php getContactInfo(); ?>
</p>

<?php
    include "footer.php";
?>
