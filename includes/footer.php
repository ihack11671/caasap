<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>CAASAP</h3>
                    <p>
                        Kabarak University <br>
                        Nakuru <br><br>
                        <strong>Phone:</strong> +254 719485394<br>
                        <strong>Email:</strong> mbahati@kabarak.ac.ke<br>
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>CONTACT US</h4>
                    <p></p>
                    <div class="social-links mt-3">
                    <a href="https://wa.me/0723594732" target="_blank" rel="noopener noreferrer"><i class="bi bi-whatsapp"></i> Contact via WhatsApp</a>                      
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; Copyright <strong><span>CAASAP</span></strong>. All Rights Reserved
        </div>
       
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script>
    window.onload = function() {
        if (window.location.hash === "#signupCompany") {
            var myModal = new bootstrap.Modal(document.getElementById('signupModal'), {});
            myModal.show();
        }
    };

    window.onload = function() {
        if (window.location.hash === "#loginCompany") {
            var myModal = new bootstrap.Modal(document.getElementById('loginModal'), {});
            myModal.show();
        }
    };
</script>
</body>

</html>