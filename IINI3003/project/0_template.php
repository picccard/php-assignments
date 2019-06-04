<?php
/*
Title:      0_template.php
Date:       13.03.2019
Author:     Eskil Uhlving Larsen
*/

session_start();
$pageTitle = "SomeTitle";   // text in tab-name, goes inside the title-tag in 'header.php'
include 'func.php';     // my custom functions
include 'header.php';   // html, head, bootstrap-cdn /head, body, header-menu-line
?>

    <!-- Begin page content | Inside the body tags -->
    <main role="main" class="flex-shrink-0">
        <div class="container mb-3 mt-2 pb-3 card">
            <?php
            // Alerts {warning: red | info: blue | success: green}
            $warning = (isset($_GET['alert']) ? $_GET['alert'] : '');   // (if this is true) ? do this : else do this
            $info = (isset($_GET['info']) ? $_GET['info'] : '');
            $success = (isset($_GET['success']) ? $_GET['success'] : '');

            //other

            //other end

            $output = ''; // Display alerts here
            if (!empty($warning)) $output .= "<div class='alert alert-danger' role='alert'>$warning</div>";
            if (!empty($info)) $output .= "<div class='alert alert-primary' role='alert'>$info</div>";
            if (!empty($success)) $output .= "<div class='alert alert-success' role='alert'>$success</div>";
            echo trim($output);
            ?>

            <h1>Some Headline</h1>
        </div>
    </main>
<?php
include 'footer.php'; // footer-line, bootstrap-js /body, /html
?>
