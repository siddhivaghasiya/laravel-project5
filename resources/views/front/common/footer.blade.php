<!-- footer Start -->
<footer class="footer section gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mr-auto col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <div class="logo mb-4">
                        <img src="images/logo.png" alt="" class="img-fluid">
                    </div>
                    <p>Tempora dolorem voluptatum nam vero assumenda voluptate, facilis ad eos obcaecati tenetur
                        veritatis eveniet distinctio possimus.</p>

                    <ul class="list-inline footer-socials mt-4">
                        @if (isset($getsocial) && !$getsocial->isEmpty())

                            @foreach ($getsocial as $key => $v)
                                <li class="list-inline-item"><a href="{{$v->link}}"><i
                                            class="{{$v->icon}}"></i></a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3">Department</h4>
                    <div class="divider mb-4"></div>

                    <ul class="list-unstyled footer-menu lh-35">
                        <li><a href="#">Surgery </a></li>
                        <li><a href="#">Wome's Health</a></li>
                        <li><a href="#">Radiology</a></li>
                        <li><a href="#">Cardioc</a></li>
                        <li><a href="#">Medicine</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="widget mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3">Support</h4>
                    <div class="divider mb-4"></div>

                    <ul class="list-unstyled footer-menu lh-35">
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Company Support </a></li>
                        <li><a href="#">FAQuestions</a></li>
                        <li><a href="#">Company Licence</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="widget widget-contact mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3">Get in Touch</h4>
                    <div class="divider mb-4"></div>

                    <div class="footer-contact-block mb-4">
                        <div class="icon d-flex align-items-center">
                            <i class="icofont-email mr-3"></i>
                            <span class="h6 mb-0">Support Available for 24/7</span>
                        </div>
                        <h4 class="mt-2"><a href="tel:+23-345-67890">Support@email.com</a></h4>
                    </div>

                    <div class="footer-contact-block">
                        <div class="icon d-flex align-items-center">
                            <i class="icofont-support mr-3"></i>
                            <span class="h6 mb-0">Mon to Fri : 08:30 - 18:00</span>
                        </div>
                        <h4 class="mt-2"><a href="tel:+23-345-67890">+23-456-6588</a></h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-btm py-4 mt-5">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div class="copyright">
                        &copy; Copyright Reserved to <span class="text-color">Novena</span> by <a
                            href="https://themefisher.com/" target="_blank">Themefisher</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class=" text-lg-right mt-5 mt-lg-0">
                        <form action="{{route('newslater.save')}}" method="POST" class="subscribe">
                            @csrf
                            <input type="email" name="email" id="email " class="form-control" placeholder="Your Email address">
                            <input type="submit" class="btn btn-main-2 btn-round-full">
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <a class="backtop js-scroll-trigger" href="#top">
                        <i class="icofont-long-arrow-up"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>



<!--
    Essential Scripts
    =====================================-->


<!-- Main jQuery -->
<script src="{{ asset('theme/plugins/jquery/jquery.js') }}"></script>
<!-- Bootstrap 4.3.2 -->
<script src="{{ asset('theme/plugins/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('theme/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('theme/plugins/counterup/jquery.easing.js') }}"></script>
<!-- Slick Slider -->
<script src="{{ asset('theme/plugins/slick-carousel/slick/slick.min.js') }}"></script>
<!-- Counterup -->
<script src="{{ asset('theme/plugins/counterup/jquery.waypoints.min.js') }}"></script>

<script src="{{ asset('theme/plugins/shuffle/shuffle.min.js') }}"></script>
<script src="{{ asset('theme/plugins/counterup/jquery.counterup.min.js') }}"></script>
<!-- Google Map -->
<script src="{{ asset('theme/plugins/google-map/map.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap">
</script>

<script src="{{ asset('theme/js/script.js') }}"></script>
<script src="{{ asset('theme/js/contact.js') }}"></script>


<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
alpha/css/bootstrap.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css"
href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</body>

</html>
