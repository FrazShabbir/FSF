<footer class="bg-dark py-7">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5 col-xl-4 me-auto mb-5 mb-lg-0">
                <a class="footer-logo h2 text-primary mb-0 font-w-7" href="index.html">
                    W<span class="text-white font-w-4">FSF.</span>
                </a>
                <p class="my-3 text-light">FSF - Funeral Service Fund.</p>
                <ul class="list-inline">
                    <li class="list-inline-item"><a class="border rounded px-2 py-1 text-light" href="#"><i
                                class="la la-facebook"></i></a>
                    </li>
                    <li class="list-inline-item"><a class="border rounded px-2 py-1 text-light" href="#"><i
                                class="la la-dribbble"></i></a>
                    </li>
                    <li class="list-inline-item"><a class="border rounded px-2 py-1 text-light" href="#"><i
                                class="la la-instagram"></i></a>
                    </li>
                    <li class="list-inline-item"><a class="border rounded px-2 py-1 text-light" href="#"><i
                                class="la la-twitter"></i></a>
                    </li>
                    <li class="list-inline-item"><a class="border rounded px-2 py-1 text-light" href="#"><i
                                class="la la-linkedin"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-lg-6 col-xl-7">
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <h5 class="mb-4 text-white">Pages</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-3"><a class="list-group-item-action text-light"
                                    href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="mb-3"><a class="list-group-item-action text-light"
                                    href="{{ route('about') }}">About</a>
                            </li>
                            <li class="mb-3"><a class="list-group-item-action text-light"
                                    href="{{ route('home') }}#testimonials">Testimonials</a>
                            </li>

                            <li><a class="list-group-item-action text-light" href="{{ route('contact') }}">Contact
                                    Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-4 mt-6 mt-sm-0">
                        <h5 class="mb-4 text-white">Auth</h5>
                        <ul class="list-unstyled mb-0">
                          <li class="mb-3"><a class="list-group-item-action text-light" href="{{route('login')}}">Login</a></li>
                          <li class="mb-3"><a class="list-group-item-action text-light" href="{{route('register')}}">Register</a></li>
                          
                        </ul>
                    </div>
                    <div class="col-12 col-sm-4 mt-6 mt-sm-0">
                        <h5 class="mb-4 text-white">Our Address</h5>
                        <div class="mb-3">
                            <p class="mb-0 text-light">{{fromSettings('address')}}</p>
                        </div>
                        <div class="mb-3">
                            <a class="btn-link text-light" href="mailto:{{fromSettings('email')}}"> {{fromSettings('email')}}</a>
                        </div>
                        <div>
                            <a class="btn-link text-light" href="tel:{{fromSettings('phone')}}">{{fromSettings('phone')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col">
                <hr class="m-0">
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6 text-light">
                Copyright ©<span id="year"></span> All rights reserved by FSF | developed by <u><a
                        class="text-primary" href="https://essentialsofts.com/">EssentialSofts</a></u></div>
            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                <ul class="list-inline mb-0">
                    <li class="me-3 list-inline-item"> <a class="list-group-item-action text-light" href="{{route('privacy')}}">
                            Privacy Policies
                        </a>
                    </li>
                  
                 
                </ul>
            </div>
        </div>
    </div>
</footer>
