<?php
/*
Title:      signup.php
Date:       14.03.2019
Author:     Eskil Uhlving Larsen
*/

$pageTitle = "Sign Up";   // text in tab-name, goes inside the title-tag in 'header.php'
include 'header.php';   // html, head, bootstrap-cdn /head, body, header-menu-line
include 'func.php';     // my custom functions
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

            if (isset($_POST['signup']) &&                                  // signup-btn clicked, and
                !empty($_POST['username'])  &&
                !empty($_POST['password'])) {                               // usr & pwd are not empty

                if (emailTaken($_POST['username'])) {                       // if mail is taken
                    $warning .= "The username '" . $_POST['username'] . "' is already taken.";
                } else {
                    if (!passwordValid($_POST['password'])) {               //if password is too weak
                        $warning .= "Password must have x y z";
                    } else {                                                // Both email and password is OK
                        if (createNewUser($_POST['username'], $_POST['password']))
                            $success = 'You have successfully signed up!' ; // Create new user in db
                        header("Location: login.php?success=$success");     // redirect to 'login.php' with a success-msg
                    }
                }
            }

            $output = ''; // Display alerts here
            if (!empty($warning)) $output .= "<div class='alert alert-danger' role='alert'>$warning</div>";
            if (!empty($info)) $output .= "<div class='alert alert-primary' role='alert'>$info</div>";
            if (!empty($success)) $output .= "<div class='alert alert-success' role='alert'>$success</div>";
            echo trim($output);
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" class="form-control"
                        name="username" placeholder="Username" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control"
                        name="password" placeholder="Password" required>
                    <small id="passwordHelpInline" class="text-muted">
                            Some rules here. Must be 8-20 characters long.
                    </small>
                </div>

                <button type="submit" class="btn btn-primary"
                    name="signup">Sign Up</button>
            </form>
        </div>
    </main>
<?php
include 'footer.php'; // footer-line, bootstrap-js /body, /html
?>
