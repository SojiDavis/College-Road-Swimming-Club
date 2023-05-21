<!-- Footer-->
<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center" style="color: floralwhite">
            <div class="col-lg-4 text-lg-start">Copyright &copy; College Road Swimming Club 2023</div>
            <div class="col-lg-4 my-3 my-lg-0" style="color: floralwhite>
                        <p>Contact Us</p>
                        <a class=" btn btn-dark btn-social mx-2
            " href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i
                        class="fab fa-facebook-f"></i></a>
            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Youtube"><i class="fab fa-youtube-square"></i></a>
        </div>
        <div class="col-lg-4 text-lg-end" style="color: floralwhite">
            <p> College Road Swimming Club <br> College Road <br> Stoke-On-Trent <br> Ph: 07768187960</p>
            <!--                        <a class="link-dark text-decoration-none" href="#">Terms of Use</a>-->
        </div>
    </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="<?php echo url_for("js/scripts.js")?>"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/LogIn-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>

<?php
  db_disconnect($db);
?>
