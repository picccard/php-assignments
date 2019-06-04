<?php
/*
Title:      listBills.php
Date:       06.04.2019
Author:     Eskil Uhlving Larsen
*/

session_start();
$pageTitle = "List Bills";   // text in tab-name, goes inside the title-tag in 'header.php'
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

            //Filter by dest
            $filterDest = (isset($_POST['dest']) ? $_POST['dest'] : 'any');
            $userBills = getBillsByUser($userID, $filterDest);
            if (!$userBills) {
                $warning = "User has no travel bills. Add a new travel bill <a href='./newTravelBill.php'>here</a>.";
            }

            //other end

            $output = ''; // Display alerts here
            if (!empty($warning)) $output .= "<div class='alert alert-danger' role='alert'>$warning</div>";
            if (!empty($info)) $output .= "<div class='alert alert-primary' role='alert'>$info</div>";
            if (!empty($success)) $output .= "<div class='alert alert-success' role='alert'>$success</div>";
            echo trim($output);
            ?>

            <h1>Travel bills</h1>
            <p>Click a row to edit its content</p>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                Filter destination:
                <select name="dest">
                    <option value="any">Any</option>
                    <?php
                    $destinations = getDestinationsByUser($userID);
                    /*  Debug
                    echo "<pre>";
                    print_r($destinations);
                    echo "</pre>";   /**/
                    foreach ($destinations as $index => $row) {
                        $item = '<option value="' . $row['destination'] . '"';
                        if ($row['destination'] == $filterDest) $item .= " selected";
                        $item .= '>' . $row['destination'] . "</option>";
                        echo $item;
                    }
                    ?>
                </select>

                <button type="submit" class="btn btn-primary btn-sm"
                    name="filter">Apply filter</button>
            </form>


            <!-- -->
            <?php
            /*
            hvis url mangler ?dest=olso eller noe
            $userbills=array(), hvis ikke
            test alle userbilld og lag drop down for alle forskjellige dest, over må være all
            nytt form med dest phpself?dest=all
            */
            ?>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <!--<th scope="col">billID</th>-->
                        <th scope="col">startDate</th>
                        <th scope="col">destination</th>
                        <th scope="col">description</th>
                        <th scope="col">cost</th>
                        <th scope="col">isPaid</th>
                        <!--<th scope="col">userID</th>-->
                    </tr>
                </thead>
                <tbody>
                <?php
                /*  Debug
                echo "<pre>";
                print_r($userBills);
                echo "</pre>";   */
                foreach ($userBills as $key => $row) {
                    if (!($row["destination"] == $filterDest)) {
                        //echo "HER";continue;
                    }

                    $key++;
                    $rID = $row["billID"]; $rST = $row["startDate"];
                    $rDEST = $row["destination"]; $rDESC = $row["description"];
                    $rCOST = $row["cost"]; $rPAID = $row["isPaid"];
                    $rPAID = ($rPAID ? "check" : "ban"); // inline if
                    $billRow = <<<BILL
                        <tr onclick="window.location='./editBill.php?billID=$rID';">
                            <th scope='row'>$key</th>
                            <!--<td>$rID</td>-->
                            <td>$rST</td>
                            <td>$rDEST</td>
                            <td>$rDESC</td>
                            <td>$rCOST</td>
                            <td><span class="fa fa-$rPAID"></span></td>
                            <!--<td>$userID</td>-->
                        </tr>
BILL;
                    echo $billRow;
                }
                ?>
            </tbody>
            </table>
        </div>
    </main>
<?php
include 'footer.php'; // footer-line, bootstrap-js /body, /html
?>
