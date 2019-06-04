<?php
/*
Title:      login.php
Date:       13.03.2019
Author:     Eskil Uhlving Larsen
*/

session_start();
$pageTitle = "Login";   // text in tab-name, goes inside the title-tag in 'header.php'
include 'func.php';     // my custom functions
include 'header.php';   // html, head, bootstrap-cdn /head, body, header-menu-line
?>

    <!-- Begin page content | Inside the body tags -->
    <main role="main" class="flex-shrink-0">
        <div class="container mb-3 mt-2 pb-3 card">
            <h1><?php echo $pageTitle ?></h1>

            <?php
            // Alerts {warning: red | info: blue | success: green}
            $warning = (isset($_GET['alert']) ? $_GET['alert'] : '');       // (if this is true) ? do this : else do this
            $info = (isset($_GET['info']) ? $_GET['info'] : '');
            $success = (isset($_GET['success']) ? $_GET['success'] : '');

            if (isset($_POST['login']) &&                                   // login-btn clicked, and
                !empty($_POST['username'])  &&
                !empty($_POST['password'])) {                               // usr & pwd are not empty

                if ($userID = login_test($_POST['username'], $_POST['password'])) { // if user exist in DB
                    $_SESSION['valid'] = true;                                      // set session variables
                    $_SESSION['startTime'] = time();
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['userID'] = $userID;

                    $success = 'You have successfully signed in!';          // success-msg
                    header("Location: index.php?success=$success");         // redirect to 'index.php' with success-msg
                } else {
                    $warning .= 'Wrong username or password';                // error-msg
                }
            }

            $output = ''; // Show alerts here
            if (!empty($warning)) $output .= "<div class='alert alert-danger' role='alert'>$warning</div>";
            if (!empty($info)) $output .= "<div class='alert alert-primary' role='alert'>$info</div>";
            if (!empty($success)) $output .= "<div class='alert alert-success' role='alert'>$success</div>";
            echo trim($output);
             ?>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" class="form-control"
                        name="username" placeholder="Username = admin" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control"
                        name="password" placeholder="Password = admin" required>
                </div>

                <button type="submit" class="btn btn-primary"
                    name="login">Login</button>
            </form>
            <form><button formaction="logout.php" class="btn btn-primary mt-2">Clear Session</button></form>
        </div>
    </main>
<?php
include 'footer.php'; // footer-line, bootstrap-js /body, /html
?>
