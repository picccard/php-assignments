<?php
/*
Title:      header.php
Date:       13.03.2019
Author:     Eskil Uhlving Larsen
*/
 ?>
<!DOCTYPE html>
<html class="h-100" lang="en"><head> <!-- class h-100 for 100% page height, footer always at bottom -->
    <head>
        <title><?php echo ($pageTitle ? $pageTitle : 'No Pagetitle'); ?></title>
        <!-- *Required* meta tags -->
        <meta charset="utf-8">
        <!-- Maybe not needed? <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Icons for facebook, twitter, google+ -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <!-- Flags for top right corner -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.1/css/flag-icon.min.css" />

        <!-- Local CSS -->
        <link href="sticky-footer.css" rel="stylesheet">
        </head>

        <body class="d-flex flex-column h-100">
        <header>
            <!-- Fixed navbar -->
            <nav class="navbar navbar-expand-md navbar-dark bg-dark"> <!-- class removed: fixed-top -->
                <a class="navbar-brand" href="./"><?php echo $siteName; ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mr-auto">
                        <a class="nav-item nav-link active" href="./">Home</a>
                        <?php // TODO: for hver side i array lag a tag, hvis siden er denne siden, legg til active klassen, bruk pageTitle? ?>
                        <a class="nav-item nav-link" href="./newTravelBill.php">New Bill</a>
                        <a class="nav-item nav-link" href="./listBills.php">Bills</a>
                        <!--<a class="nav-item nav-link" href="./session-test.php">session-test</a>-->
                        <a class="nav-item nav-link" href="./calc.php">Calculations</a>
                    </div>
                    <!-- Navbar Right Side -->
                    <div class="navbar-nav">
                        <!-- if current_user.is_authenticated -->
                        <a class="nav-item nav-link" href="#">Profile</a>
                        <a class="nav-item nav-link" href="./logout.php">Sign Out</a>
                        <!-- else -->
                        <a class="nav-item nav-link" href="./login.php">Sign In</a>
                        <a class="nav-item nav-link" href="./signup.php">Sign Up</a>
                        <!-- endif -->
                        <div class="dropdown">
                            <a class="nav-item nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="flag-icon flag-icon-no"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item active" href="#"><span class="flag-icon flag-icon-no mr-1"></span>Norsk / Norwegian</a>
                                <a class="dropdown-item" href="#"><span class="flag-icon flag-icon-gb mr-1"></span>Engelsk / English</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>



    </head>
    <body>
