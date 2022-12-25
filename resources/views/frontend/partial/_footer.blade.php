<footer class="{{$extra_class??''}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="footer-intro">
                    <a href="index-2.html" class="footer-logo">
                        <img class="mb-3" src="{{asset(fromSettings('logo')??'frontend/assets/images/logo.png')}}" alt="logo">
                    </a>
                    <p class="mb-3 text-white">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis non, fugit totam vel laboriosam vitae.
                    </p>
                    <div class="d-flex footer-social-icons">
                        <a href="#"><i class="fab fa-facebook-f mr-2"></i></a>
                        <a href="#"><i class="fab fa-twitter mr-2"></i></a>
                        <a href="#"><i class="fab fa-instagram mr-2"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="footer-product-help">
                    <h4 class="mb-3">
                        Useful Links
                    </h4>
                    <div class="text-white footer-product-help-link">
                        <ul>
                            <li>
                                <a href="#home">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="contact.html">
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="footer-product-help">
                    <h4 class="mb-3">
                        Product Help
                    </h4>
                    <div class="text-white footer-product-help-link">
                        <ul>
                            <li>
                                <a href="#">
                                    FAQ
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Support
                                </a>
                            </li>
                            <li>
                                <a href="contact.html">
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="footer-store-download-btn">
                    <h4 class="mb-3">
                        Download
                    </h4>
                    <div class="footer-store-download-btn-div">
                        <a href="#">
                            <img class="footer-store-btn mb-2" src="{{asset('frontend/assets/images/Storebutton/google-play.png')}}" alt="">
                        </a>
                        <a href="#">
                            <img class="footer-store-btn mb-2" src="{{asset('frontend/assets/images/Storebutton/app-store.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="d-block d-lg-flex d-md-flex lower-footer justify-content-between">
                    <p class="text-white align-middle lower-footer-text">
                        © 2022 {{fromSettings('site_title')}} All rights reserved.
                    </p>
                    <p class="text-white align-middle lower-footer-text">
                        Made with <i class="far fa-heart"></i> By <a href="{{fromSettings('developers_url')}}" class="text-white">{{fromSettings('developers')}}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>