    <footer class="footer" data-background-color="black">
        <div class=" container ">
            <nav>
            <ul>
                <li>
                <a href="https://www.creative-tim.com">
                    Creative Tim
                </a>
                </li>
                <li>
                <a href="http://presentation.creative-tim.com">
                    About Us
                </a>
                </li>
                <li>
                <a href="http://blog.creative-tim.com">
                    Blog
                </a>
                </li>
            </ul>
            </nav>
            <div class="copyright" id="copyright">
            &copy;
            <script>
                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by
            <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
            </div>
        </div>
        </footer>
    </div>
    <script src="../../../assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="../../../assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../../../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="../../../assets/js/plugins/bootstrap-switch.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="../../../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
    <script src="../../../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
    <script src="../../../assets/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        nowuiKit.initSliders();
        });

        function scrollToDownload() {

        if ($('.section-download').length != 0) {
            $("html, body").animate({
            scrollTop: $('.section-download').offset().top
            }, 1000);
        }
        }
    </script>
</body>
</html>