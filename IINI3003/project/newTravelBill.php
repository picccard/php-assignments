<?php
/*
Title:      newTravelBill.php
Date:       14.03.2019
Author:     Eskil Uhlving Larsen
*/

session_start();
$pageTitle = "New Bill";    // text in tab-name, goes inside the title-tag in 'header.php'
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

            if (isset($_POST['save']) &&                                // Save-btn clicked, and
                !empty($_POST['date'])  &&                              // date, destination, description, cost is not empty
                !empty($_POST['destination']) &&                        // no checking if cost is numeric, max 2 decimals
                !empty($_POST['description']) &&                        // not checking length of text fiels (to match varchar in db)
                !empty($_POST['cost'])) {                               // not checking dateformat

                //date ; destination ; description ; cost ; isPaid
                $userID = $_SESSION['userID'];
                $date = $_POST['date'];
                $destination = $_POST['destination'];
                $description = $_POST['description'];
                $cost = $_POST['cost'];
                $cost = round($cost, 2);
                $isPaid = (bool) $_POST['isPaid']; // ($_POST['isPaid']) ? $_POST['isPaid'] : '0');
                //echo "$date ; $destination ; $description ; $cost ; $isPaid ; $userID";
                if (saveBill($date, $destination, $description, $cost, $isPaid, $userID)) {
                    $success = 'Bill saved!' ; // Create new user in db
                    $selfPage = $_SERVER['PHP_SELF'];
                    header("Refresh:0; url=$selfPage?success=$success");  // refresh with a success-msg
                } else {
                    // no row was changed in the table, aka no bill was saved
                    $warning = 'Something went wrong, try again.' ; // error-msg
                    $selfPage = $_SERVER['PHP_SELF'];
                    header("Refresh:0; url=$selfPage?alert=$warning");  // refresh with a alert
                }
            }

            $output = ''; // Display alerts here
            if (!empty($warning)) $output .= "<div class='alert alert-danger' role='alert'>$warning</div>";
            if (!empty($info)) $output .= "<div class='alert alert-primary' role='alert'>$info</div>";
            if (!empty($success)) $output .= "<div class='alert alert-success' role='alert'>$success</div>";
            echo trim($output);

            /*
                sjekk at teksten er i alle felter.
                trim tekst og dato
                convert dato til dato for db
                stmt med sql
                instert infoen, execute, redirect to display all bills med ?id=XX, list ut alle bills med FOCUS på den med matchende id
                eller redirect to display all bills med ?success=Added bill with ID: XX
            */
            ?>

            <h1 class="">New Travel Bill</h1>
            <!-- date ; destination ; description ; cost ; isPaid -->
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <!-- Date -->
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" id="date" class="form-control"
                        name="date" placeholder="Date" required autofocus>
                        <small id="dateHelpInline" class="text-muted">
                                The date must be formated: something something <!-- 'yyyy-mm-dd' -->
                        </small>
                </div>

                <!-- Destination -->
                <div class="form-group">
                    <label for="destination">Destination</label>
                    <input type="text" id="destination" class="form-control"
                        name="destination" placeholder="Destination" required>
                </div>

                <!-- DESC -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" placeholder="Description"
                        name="description" rows="2" required></textarea>
                </div>

                <!-- COST -->
                <div class="form-group">
                    <label for="cost">Cost</label>
                    <input type="number" id="cost" class="form-control" placeholder="Cost"
                        name="cost" step="any" min="0" required>
                        <small id="costHelpInline" class="text-muted">
                                Specify give the cost in 'nok'
                        </small>
                </div>


                <!-- PAIDSTATUS --><!-- Rounded toggle switch -->
                <div class="form-group">
                    <label for="isPaid">Paid</label>
                    <label class="switch">
                        <input type="checkbox" id="isPaid"
                            name="isPaid">
                        <span class="slider"></span>
                    </label>
                </div>



                <button type="submit" class="btn btn-primary"
                    name="save">Save</button>
            </form>

        </div>
    </main>

<?php

include 'footer.php'; // footer-line, bootstrap-js /body, /html

 ?>
