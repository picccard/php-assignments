<?php
/*
Title:      footer.php
Date:       13.03.2019
Author:     Eskil Uhlving Larsen
*/
 ?>
    <!-- old default footer
    <footer class="footer mt-auto py-3">
        <div class="container">
            <span class="text-muted">Place sticky footer content here.</span>
        </div>
    </footer>
    -->
    <footer id="myFooter" class="footer mt-auto py-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h2 class="logo"><a href="#"><?php echo $siteName; ?>-logo<!--<img src="" alt="">--></a></h2>
                </div>
                <div class="col-sm-2">
                    <h5>Kom igang</h5>
                    <ul>
                        <li><a href="#">Hjem</a></li>
                        <li><a href="#">Registrer deg</a></li>
                        <li><a href="#">Logg inn</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>Om oss</h5>
                    <ul>
                        <li><a href="#">Selskaps Informasjon</a></li>
                        <li><a href="#">Kontakt oss</a></li>
                        <li><a href="#">Anmeldelser</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>Hjelp</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Forum</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <div class="social-networks">
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                    </div>
                    <button type="button" class="btn btn-default">Kontakt oss</button>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>&#169; 2018 <?php echo $siteName; ?> </p>
        </div>
    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
