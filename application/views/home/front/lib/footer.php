<section class="w3l-footer-29-main">
    <div class="footer-29">
        <div class="container">
            <div class="d-grid grid-col-4 footer-top-29">
                <div class="footer-list-29 footer-1">
                    <h6 class="footer-title-29">Contact Us</h6>
                    <ul>
                        <li><p><span class="fa fa-map-marker"></span> House # 40, Road # 07, Sector # 13, Uttara</p>
                        </li>
                        <li><a href="tel:+01865-598364"><span class="fa fa-phone"></span> 01865-598364</a></li>
                        <li><a class="mail" href="mailto:corporate-mail@support.com"><span
                                        class="fa fa-envelope-open-o"></span> info@mastermindabacusbd.com</a></li>
                    </ul>
                    <div class="main-social-footer-29">
                        <a target="_blank" class="facebook" href="https://www.facebook.com/mastermindabacusbd/"><span
                                    class="fa fa-facebook"></span></a>
                        <a target="_blank" class="twitter" href="https://twitter.com/mastermind_bd?lang=en"><span
                                    class="fa fa-twitter"></span></a>
                        <a class="instagram" href="#instagram"><span class="fa fa-instagram"></span></a>
                        <a target="_blank" class="linkedin"
                           href="https://bd.linkedin.com/company/mastermindabacusbd"><span
                                    class="fa fa-linkedin"></span></a>
                    </div>
                </div>
                <div class="footer-list-29 footer-2">
                    <ul>
                        <h6 class="footer-title-29">Featured Links</h6>
                        <li><a href="admin-login">Admin Login</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="faq.html">Faq</a></li>
                        <li><a href="https://mastermindabacusbd.com/gurdian-login">Guardian Login</a></li>
                    </ul>
                </div>
                <div class="footer-list-29 footer-3">

                    <h6 class="footer-title-29">Newsletter </h6>
                    <form action="#" class="subscribe" method="post">
                        <input name="email" placeholder="Email" required="" type="email">
                        <button><span class="fa fa-envelope-o"></span></button>
                    </form>
                    <p>Subscribe and get our weekly newsletter</p>
                    <p>We'll never share your email address</p>

                </div>
                <div class="footer-list-29 footer-4">
                    <ul>
                        <h6 class="footer-title-29">Quick Links</h6>
                        <li><a href="admission.html">Admission</a></li>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="#"> Blog</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="d-grid grid-col-2 bottom-copies">
                <p class="copy-footer-29">© 2020 All rights reserved | Mastermindabacusbd.com</p>
                <ul class="list-btm-29">
                    <li><a href="#link">Privacy policy</a></li>
                    <li><a href="#link">Terms of service</a></li>

                </ul>
            </div>
        </div>
    </div>

    <!-- move top -->
    <button id="movetop" onclick="topFunction()" title="Go to top">

        <span class="fa fa-angle-up"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- /move top -->
</section>
<script src="<?php echo base_url(); ?>assets/front/js/jquery-3.3.1.min.js"></script>
<!-- //footer-28 block -->
</section>
<script>
    $(function () {
        $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
        })
    });
</script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?php echo base_url(); ?>assets/front/js/jquery-3.3.1.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
</script>
<script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
<script>
    var scroll = new SmoothScroll('a[href*="#"]', {
        speed: 200
    });
</script>
`

<!-- <script src="assets/js/smoothscroll.js"></script> -->
<script src="<?php echo base_url(); ?>assets/front/js/owl.carousel.js"></script>
<script src="<?php echo base_url(); ?>assets/front/js/lozad.min.js"></script>
<!-- script for -->
<script>
    $(document).ready(function () {
        $('.owl-one').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            responsiveClass: true,
            autoplay: false,
            autoplayTimeout: 5000,
            autoplaySpeed: 1000,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                480: {
                    items: 1,
                    nav: false
                },
                667: {
                    items: 1,
                    nav: true
                },
                1000: {
                    items: 1,
                    nav: true
                }
            }
        })

        $('.gallery-carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            responsiveClass: true,
            autoplay: false,
            autoplayTimeout: 5000,
            autoplaySpeed: 1000,
            autoplayHoverPause: false,
            responsive: {
                0: {
                    items: 3,
                    nav: false
                },
                480: {
                    items: 3,
                    nav: false
                },
                667: {
                    items: 3,
                    nav: true
                },
                1000: {
                    items: 33,
                    nav: true
                }
            }
        })
        //    lozad

        const observer = lozad(); // lazy loads elements with default selector as '.lozad'
        observer.observe();

    })
</script>
<!-- //script -->

</body>

</html>
