<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>
@if(!Auth::user())
<footer class="footer-light-medium">
    <div class="container">
        <div class="footer-head">
            <div class="head-text">
                <h3>Ready to get started?</h3>
                <p>Create your free account now</p>
            </div>
            <div class="head-action">
                <div class="buttons">
                    <a class="button primary-btn raised action-button">Create Account</a>
                    <a class="button chat-button">Chat with us</a>
                </div>
            </div>
        </div>
        <div class="columns footer-body">
            <!-- Column -->
            <div class="column is-4">
                <div class="pt-10 pb-10">
                    <img class="" style="margin-left: -20px;height: 70px !important;" src="logo/logo.png" alt="">
                    <div class="footer-description">
                        OnlineStore is Built for Users who want to sell their products online. It's a modular approach to get more customers from anywhere.
                    </div>
                </div>
                <div>
                    <span class="moto">Designed and coded with <i class="fa fa-heart color-red"></i> by Himanshu Sharma </span>
                    <div class="social-links">
                        <a href="#">
                            <span class="icon"><i class="fa fa-facebook"></i></span>
                        </a>
                        <a href="#">
                            <span class="icon"><i class="fa fa-twitter"></i></span>
                        </a>
                        <a href="#">
                            <span class="icon"><i class="fa fa-linkedin"></i></span>
                        </a>
                        <a href="#">
                            <span class="icon"><i class="fa fa-dribbble"></i></span>
                        </a>
                        <a href="#">
                            <span class="icon"><i class="fa fa-github"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="column is-6 is-offset-2">
                <div class="columns">
                    <!-- Column -->
                    <div class="column">
                        <ul class="footer-column">
                            <li class="column-header">
                                OnlineStore
                            </li>
                            <li class="column-item"><a href="#">Home</a></li>
                            <li class="column-item"><a href="#">Explore</a></li>
                            <li class="column-item"><a href="#">Get started</a></li>
                            <li class="column-item"><a href="#">Help</a></li>
                        </ul>
                    </div>
                    <!-- Column -->
                    <div class="column">
                        <ul class="footer-column">
                            <li class="column-header">
                                Ressources
                            </li>
                            <li class="column-item"><a href="#">About</a></li>
                            <li class="column-item"><a href="#">Customer Support</a></li>
                            <li class="column-item"><a href="#">Frequent questions</a></li>
                            <li class="column-item"><a href="#">Schedule a demo</a></li>
                        </ul>
                    </div>
                    <!-- Column -->
                    <div class="column">
                        <ul class="footer-column">
                            <li class="column-header">
                                Terms
                            </li>
                            <li class="column-item"><a href="#">Terms of Service</a></li>
                            <li class="column-item"><a href="#">Privacy policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright has-text-centered">
            <p>&copy; 2021 | <a href="#">Himanshu Sharma</a> | All Rights Reserved.</p>
        </div>
    </div>
</footer>
@endif

    <script src="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/core.js"></script>
</body>

</html>