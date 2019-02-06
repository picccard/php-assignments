<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title></title>

        <!--
        Title:      multiply.php
        Date:       04.02.2019
        Author:     Eskil Uhlving Larsen
        -->

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <!-- Content here -->
            <h1>The small multiplication table</h1>

            <table class="table">
                <thead>
                    <tr>
                        <?php
                        for ($i=0; $i < 10; $i++) {
                            if ($i == 0) {
                                echo "<th scope=\"col\"> </th>" . "\n";
                            } else {
                                echo "<th scope=\"col\">$i</th>" . "\n";
                            }
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i=1; $i < 10; $i++) {
                        echo "<tr>" . "\n" . "<th scope=\"row\">$i</th>" . "\n";
                        for ($j=1; $j < 10; $j++) {
                            echo "<td>" . ($i * $j) . "</td>" . "\n";
                        }
                        echo "</tr>";
                    }
                    ?>


                </tbody>
            </table>
        </div><!-- Content end -->

         <!-- Optional JavaScript -->
         <!-- jQuery first, then Popper.js, then Bootstrap JS -->
         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>
