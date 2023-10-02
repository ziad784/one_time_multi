<!-- Footer -->
<footer class="footer" style="

background: black;
    padding: 10px;
    margin-top: 15vh;
    
">
    <div class="container">
        <!-- Outer-Footer -->
        {{-- <div class="outer-footer-wrapper u-s-p-y-80">
            <h6>
                For special offers and other discount information
            </h6>
            <h1>
                Subscribe to our Newsletter
            </h1>
            <p>
                Subscribe to the mailing list to receive updates on promotions, new arrivals, discount and coupons.
            </p>



            
            <form class="newsletter-form">
                <label class="sr-only" for="subscriber_email">Enter your Email</label>
                <input type="text" placeholder="Your Email Address" id="subscriber_email" name="subscriber_email" required> 
                <button type="button" class="button" onclick="addSubscriber()">SUBMIT</button> 
            </form>



        </div> --}}
        {{-- We'll use the HTML id Global Attribute in jQuery in front/js/custom.js --}} 
        {{-- Check the addSubscriber() function in front/js/custom.js. We'll use it in conjunction with the    id="subscriber_email"    of the <input> field --}}
        <!-- Outer-Footer /- -->
        <!-- Mid-Footer -->
        <div class="container" style="margin-top: 40px">
            <div class="row">
                <div class="col-sm">
                    <div class="footer-list">
                        <h6 style="color:white">{{ __("translation.COMPANY")}}</h6>
                        <ul>
                            <li>
                                <a href="{{ url('about-us') }}">{{ __("translation.About Us")}}</a>
                            </li>
                            <li>
                                <a href="{{ url('contact') }}">{{ __("translation.Contact Us")}}</a>
                            </li>
                            <li>
                                <a href="{{ url('faq') }}">{{ __("translation.FAQ")}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
              
                <div class="col-sm">
                    <div class="footer-list">
                        <h6 style="color:white">{{ __("translation.ACCOUNT")}}</h6>
                        <ul>
                            <li>
                                <a href="{{ url('user/account') }}">{{ __("translation.My Account")}}</a>
                            </li>
                            <li>
                                <a href="{{ url('user/orders') }}">{{ __("translation.My Orders")}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="footer-list">
                        <h6 style="color:white">{{ __("translation.Contact")}}</h6>
                        <ul>
                            <li>
                                <i class="fas fa-location-arrow u-s-m-r-9"></i>
                                <span>   مؤسسه الابداع الماسي  </span>
                            </li>
                            <li>
                                <a href="tel:+0123456789">
                                <i class="fas fa-phone u-s-m-r-9"></i>
                                <span>+0123456789</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:info@example.com">
                                <i class="fas fa-envelope u-s-m-r-9"></i>
                                <span>
                                info@example.com</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mid-Footer /- -->
        <!-- Bottom-Footer -->

        <style>
            .social-media-list > li{
                color:white !important > a > i;
            }
        </style>
        <div class="bottom-footer-wrapper">
            <div class="social-media-wrapper">
                <ul class="social-media-list">
                    <li>
                        <a target="_blank" href="#">
                        <i  style="color:white" class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i  style="color:white" class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i style="color:white" class="fab fa-google-plus-g"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i style="color:white" class="fas fa-rss"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i style="color:white" class="fab fa-pinterest"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i style="color:white" class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i style="color:white" class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <p  style="color:white" class="copyright-text">Copyright &copy; 2023
                <a target="_blank" rel="nofollow" href="#">   مؤسسه الابداع الماسي </a> | All Right Reserved
            </p>
        </div>
    </div>
    <!-- Bottom-Footer /- -->
</footer>
<!-- Footer /- -->