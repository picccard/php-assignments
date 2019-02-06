<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pizza Order</title>

    <!--
        Title:      pizza-order.php
        Date:       06.02.2019
        Author:     Eskil Uhlving Larsen
        -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


    <style type="text/css">
        .underlinje {
            border-bottom: 1px dotted #000;
            text-decoration: none;
        }
    </style>

</head>

<body>
    <div class="container">
        <!-- Content here -->
        <h1>Pizza Order</h1>

        <form action="order_summary.php" method="get">
            <h4>Pizza Options</h4>
            <div class="form-group form-row">
                <label for="inputSize" class="col-sm-2 col-form-label">Size</label>
                <div class="col-sm-10">
                    <select class="form-control" name="pizzaSize">
                        <?php
                        $size_options = array("medium" => 5, "large" => 8);
                        foreach ($size_options as $size => $price) {
                            $Size = ucfirst($size);
                            echo "<option value=\"$size\">$Size, $$price</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputCrust" class="col-sm-2 col-form-label">Crust</label>
                <div class="col-sm-10">
                    <select class="form-control" name="crustType">
                        <?php
                        $crust_options = array("thin", "thick");
                        foreach ($crust_options as $crust) {
                            $Crust = ucfirst($crust);
                            echo "<option value=\"$crust\">$Crust crust</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>


            <h4>Extra Toppings</h4>
            <?php
            $pizza_extras = array(
                //extra => price
                "mushroom" => 1,
                "salami" => 1,
                "ham" => 1,
                "olives" => 1,
                "tuna" => 1,
                "pepperoni" => 1
            );

            foreach ($pizza_extras as $food => $price) {
                $Food = ucfirst($food);
                echo
                "<div class=\"form-group\">
                    <div class=\"form-check\">
                        <input class=\"form-check-input\" type=\"checkbox\" name=\"chk$Food\">
                        <label class=\"form-check-label\" for=\"chk$Food\">
                            Extra $Food, $$price
                        </label>
                    </div>
                </div>";
            }
            ?>

            <h4>Delivery</h4>

            <div class="form-group form-row">
                <label for="arivalTime" class="col-sm-2 col-form-label">Delivery Time</label>
                <div class="col-sm-10">
                    <select class="form-control" name="arivalTime">
                        <?php
                        for ($i=1; $i<24; $i++) {
                            echo "\t<option value='";
                            if ($i<10) {
                                $nuller = "0";
                            } else {
                                $nuller = "";
                            }
                            $tid = $nuller . $i . ":00";
                            echo "$tid'>$tid</option>\n";
                        }//for
                        ?>
                    </select>
                </div>
            </div>
            <input type="submit" value="Order NOW">
        </form>
    </div><!-- Content end -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>
