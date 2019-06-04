<?php
/*
Title:      editBill.php
Date:       06.04.2019
Author:     Eskil Uhlving Larsen
*/

session_start();
$pageTitle = "Edit bill";   // text in tab-name, goes inside the title-tag in 'header.php'
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

            $currentBill = getBillByID($_GET['billID']);
            if (!$currentBill) {
                $warning = "No bill with billID = " . $_GET['billID'] . ".";
            } else {
                if ($currentBill['userID'] != $_SESSION['userID']) {
                    $warning = "Bill with billID " . $_GET['billID'] . " is not registred on your account and can't be edited.";
                    $currentBill = 0; // prevent the bill info from showing up in the form
                }
            }

            /*Debug
            echo "<pre>";
            print_r($currentBill);
            echo "</pre>";             */

            /*
            hent bill id ifra db og sjekk at bill eksistere
            sjekk at bill tilhører userid, ellers deny

            vis form med ifo ifra bill mulighet for sort?
            ha knapp for delete og update neders
            delete er lett delete from where billid er billid
            update må verifisere? update alle der billid er billid
            */

            if (isset($_POST['update']) &&                              // Update-btn clicked, and
                !empty($_POST['date'])  &&                              // date, destination, description, cost is not empty
                !empty($_POST['destination']) &&                        // not checking dateformat
                !empty($_POST['description']) &&                        // not checking length of text fiels (to match varchar in db)
                !empty($_POST['cost'])) {                               // no checking if cost is numeric, max 2 decimals

                //date ; destination ; description ; cost ; isPaid
                $date = $_POST['date'];
                $destination = $_POST['destination'];
                $description = $_POST['description'];
                $cost = $_POST['cost'];
                $cost = round($cost, 2);
                $isPaid = (bool) $_POST['isPaid'];
                $billID = $currentBill['billID'];

                if (updateBill($billID, $date, $destination, $description, $cost, $isPaid)) {
                    $success = 'Bill updated!' ;
                    $selfPage = $_SERVER['PHP_SELF'];
                    header("Refresh:0; url=$selfPage?billID=$billID&success=$success");  // refresh with a success-msg
                } else {
                    // no row was changed in the table, aka no bill was updated
                    $warning = 'Something went wrong, try again.' ; // error-msg
                    $selfPage = $_SERVER['PHP_SELF'];
                    header("Refresh:0; url=$selfPage?alert=$warning");  // refresh with a alert
                }
            }

            //other end

            $output = ''; // Display alerts here
            if (!empty($warning)) $output .= "<div class='alert alert-danger' role='alert'>$warning</div>";
            if (!empty($info)) $output .= "<div class='alert alert-primary' role='alert'>$info</div>";
            if (!empty($success)) $output .= "<div class='alert alert-success' role='alert'>$success</div>";
            echo trim($output);
            ?>

            <h1>Edit bill</h1>
            <!-- date ; destination ; description ; cost ; isPaid -->
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?billID=" . $currentBill['billID']; ?>" method="post">
                <!-- Date -->
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" id="date" class="form-control"
                        name="date" placeholder="Date" required autofocus
                        value="<?php echo $currentBill['startDate']; ?>">
                        <small id="dateHelpInline" class="text-muted">
                                The date must be formated: something something <!-- 'yyyy-mm-dd' -->
                        </small>
                </div>

                <!-- Destination -->
                <div class="form-group">
                    <label for="destination">Destination</label>
                    <input type="text" id="destination" class="form-control"
                        name="destination" placeholder="Destination" required
                        value="<?php echo $currentBill['destination']; ?>">
                </div>

                <!-- DESC -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" placeholder="Description"
                        name="description" rows="2" required><?php echo $currentBill['description']; ?>
                    </textarea>
                </div>

                <!-- COST -->
                <div class="form-group">
                    <label for="cost">Cost</label>
                    <input type="number" id="cost" class="form-control" placeholder="Cost"
                        name="cost" step="any" min="0" required
                        value="<?php echo $currentBill['cost']; ?>">
                        <small id="costHelpInline" class="text-muted">
                                Specify give the cost in 'nok'
                        </small>
                </div>


                <!-- PAIDSTATUS --><!-- Rounded toggle switch -->
                <div class="form-group">
                    <label for="isPaid">Paid</label>
                    <label class="switch">
                        <input type="checkbox" id="isPaid"
                            name="isPaid" <?php if ($currentBill['isPaid']) echo "checked"; ?>>
                        <span class="slider"></span>
                    </label>
                </div>



                <button type="submit" class="btn btn-primary"
                    name="update">Update</button>
            </form>
        </div>
    </main>
<?php
include 'footer.php'; // footer-line, bootstrap-js /body, /html
?>
