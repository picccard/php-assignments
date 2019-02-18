<?php
/*
Title:      index.php
Date:       18.02.2019
Author:     Eskil Uhlving Larsen
*/

    include "header.php";
?>

<h1>Welcome to home</h1>
<p>
    From this page you can visit our <a href="about.php">about-page</a>.
</p>
<p>
    Or maybe <a href="contact.php">get in touch</a> with us.
</p>
<p>
    Or make an order from our <a href="order.php">order-page</a>.
</p>

<?php
    getContactInfo();
    include "footer.php";
?>
