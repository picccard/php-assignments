<?php
/*
Title:      0_template.php
Date:       13.03.2019
Author:     Eskil Uhlving Larsen
*/

session_start();
$pageTitle = "Calculations";   // text in tab-name, goes inside the title-tag in 'header.php'
include 'func.php';     // my custom functions
include 'header.php';   // html, head, bootstrap-cdn /head, body, header-menu-line

if (!isset($_SESSION["username"])) {                                // if not signed in / no session active
    header('Location: login.php?alert=Please sign in first');       //  redirect to login with alert
}
                                                                    // else: user is logged in / session is active
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
            $userID = $_SESSION['userID'];

            //other end

            $output = ''; // Display alerts here
            if (!empty($warning)) $output .= "<div class='alert alert-danger' role='alert'>$warning</div>";
            if (!empty($info)) $output .= "<div class='alert alert-primary' role='alert'>$info</div>";
            if (!empty($success)) $output .= "<div class='alert alert-success' role='alert'>$success</div>";
            echo trim($output);
            ?>

            <h1>Calculations</h1>
            <p>
                Reisene utgjør totalt: <?php echo getBillsTotalCost($userID); ?> kr
            </p>
            <p>
                En gjennomsnittsreise ligger på: <?php echo getBillsAvgCost($userID); ?> kr
            </p>
            <p>
                Antall kroner som er utbetalt: <?php echo getBillsTotalPaid($userID); ?> kr
            </p>
            <p>
                Antall kroner som er utestående (ikke betalt ut enda): <?php echo getBillsTotalNotPaid($userID); ?> kr
            </p>
            <p>
                For hver måned utgjør reiseregningene: <br>
                <?php
                $monthCost = getBillsTotalCostMonthly($userID);
                /* DEBUD
                echo "<pre>";
                print_r($bills);
                echo "</pre>";   */
                foreach ($monthCost as $month => $cost) {
                    // code...
                    echo "$month - $cost kr <br>";
                }
                ?>
            </p>
        </div>
    </main>
<?php
include 'footer.php'; // footer-line, bootstrap-js /body, /html
?>
