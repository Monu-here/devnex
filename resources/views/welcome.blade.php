@extends('front.layout.app')
@section('css')
    <style>
 


        .projects-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vH;
            background-color: #F5F5F5;
            font-family: Roboto;
        }

        .projects-h1 {
            font-size: 40pt;
            font-weight: 500;
            color: #363638;
        }

        .projects-container {
            margin-top: 50px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            width: 80%;
        }

        .projects-item {
            position: relative;
            float: left;
            overflow: hidden;
            margin: 10px 1%;
            min-width: 320px;
            max-width: 410px;
            width: 100%;
            text-align: center;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
            box-sizing: border-box;
        }

        .projects-item:hover {
            cursor: pointer;
        }

        .projects-item * {
            transition: all 0.35s ease-in-out;
        }

        .projects-img {
            max-width: 100%;
            vertical-align: top;
            height: 310px;
        }

        .projects-item:hover img {
            opacity: 0;
        }

        .projects-text {
            width: 80%;
            height: 90%;
            position: absolute;
            top: -100px;
            left: 10%;
            color: #01A2AC;
        }

        .projects-text h3 {
            color: black;
        }

        .projects-item:hover .projects-text {
            top: 20%;
        }

        .projects-item:hover .projects-button {
            bottom: 20%;
        }

        .projects-item .projects-button {
            position: absolute;
            bottom: -100px;
            left: 25%;
            width: 50%;
            border: 3px solid #01A2AC;
            padding: 15px;
            box-sizing: border-box;
            transition: all 0.3s ease-in-out;
        }

        .projects-button:hover {
            background-color: #01A2AC;
            color: #F5F5F5;
        }

        /* Modal */

        .modal {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #F5F5F5;
            margin: 5% auto;
            box-sizing: border-box;
            width: 700px;
            max-height: 714px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
        }

        .scale {
            animation: scale 0.5s;
            animation-fill-mode: forwards;
        }

        @keyframes scale {
            from {
                transform: scale(0);
            }

            to {
                transform: scale(1);
            }
        }

        #img {
            width: 100%;
            height: 450px;
        }

        #details {
            padding: 25px;
            text-align: left;
            position: relative;
            height: 264px;
            box-sizing: border-box;
            border-top: 1px solid #363638;
        }

        #details * {
            transition: all .3s;
        }

        #title {
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        #details .button {
            position: absolute;
            width: 30%;
            background-color: #01A2AC;
            color: #F5F5F5;
            text-align: center;
            left: 25px;
            bottom: 35px;
            padding: 15px;
        }

        #details i {
            position: absolute;
            bottom: 30px;
            right: 25px;
            font-size: 3rem;
            color: #01A2AC;
        }

        #details .button:hover,
        i:hover {
            cursor: pointer;
            opacity: 0.8;
        }

        /* Close Button */
        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            right: 10px;
        }

        .close:hover,
        .close:focus {
            color: #363638;
            text-decoration: none;
            cursor: pointer;
        }
     </style>
@endsection
@section('content')
    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" style="background-image: url('{{ asset('assets/image/banner-bg.png') }}')" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-sm-12">
                        <h1>We provide the best <strong>strategy</strong><br>to grow up your <strong>business</strong>
                        </h1>
                        <p>Softy Pinko is a professional Bootstrap 4.0 theme designed by Template Mo
                            for your company at absolutely free of charge</p>
                        <a href="#features" class="main-button-slider">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** Features Small Start ***** -->
    <section class="section home-feature">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- ***** Features Small Item Start ***** -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12"
                            data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                            <div class="features-small-item">
                                <div class="icon">
                                    <i><img src="{{ asset('assets/image/featured-item-01.png') }}" alt=""></i>
                                </div>
                                <h5 class="features-title">Modern Strategy</h5>
                                <p>Customize anything in this template to fit your website needs</p>
                            </div>
                        </div>
                        <!-- ***** Features Small Item End ***** -->

                        <!-- ***** Features Small Item Start ***** -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12"
                            data-scroll-reveal="enter bottom move 50px over 0.6s after 0.4s">
                            <div class="features-small-item">
                                <div class="icon">
                                    <i><img src="{{ asset('assets/image/featured-item-01.png') }}" alt=""></i>
                                </div>
                                <h5 class="features-title">Best Relationship</h5>
                                <p>Contact us immediately if you have a question in mind</p>
                            </div>
                        </div>
                        <!-- ***** Features Small Item End ***** -->

                        <!-- ***** Features Small Item Start ***** -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12"
                            data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
                            <div class="features-small-item">
                                <div class="icon">
                                    <i><img src="{{ asset('assets/image/featured-item-01.png') }}" alt=""></i>
                                </div>
                                <h5 class="features-title">Ultimate Marketing</h5>
                                <p>You just need to tell your friends about our free templates</p>
                            </div>
                        </div>
                        <!-- ***** Features Small Item End ***** -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Small End ***** -->

    <!-- ***** Features Big Item Start ***** -->
    <section class="section padding-top-70 padding-bottom-0" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center"
                    data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="{{ asset('assets/image/left-image.png') }}" class="rounded img-fluid d-block mx-auto"
                        alt="App">
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-top-fix">
                    <div class="left-heading">
                        <h2 class="section-title">Let’s discuss about you project</h2>
                    </div>
                    <div class="left-text">
                        <p>Nullam sit amet purus libero. Etiam ullamcorper nisl ut augue blandit, at finibus leo
                            efficitur. Nam gravida purus non sapien auctor, ut aliquam magna ullamcorper.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <!-- ***** Features Big Item Start ***** -->
    <section class="section padding-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-bottom-fix">
                    <div class="left-heading">
                        <h2 class="section-title">We can help you to grow your business</h2>
                    </div>
                    <div class="left-text">
                        <p>Aenean pretium, ipsum et porttitor auctor, metus ipsum iaculis nisi, a bibendum lectus libero
                            vitae urna. Sed id leo eu dolor luctus congue sed eget ipsum. Nunc nec luctus libero. Etiam
                            quis dolor elit.</p>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center mobile-bottom-fix-big"
                    data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="{{ asset('assets/image/right-image.png') }}" class="rounded img-fluid d-block mx-auto"
                        alt="App">
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <!-- ***** Home Parallax Start ***** -->
    <section class="mini" id="work-process"
        style="background-image: url('{{ asset('assets/image/work-process-bg.png') }}')">
        <div class="mini-content">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="info">
                            <h1>Work Process</h1>
                            <p>Aenean nec tempor metus. Maecenas ligula dolor, commodo in imperdiet interdum, vehicula
                                ut ex. Donec ante diam.</p>
                        </div>
                    </div>
                </div>

                <!-- ***** Mini Box Start ***** -->
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img src="{{ asset('assets/image/work-process-item-01.png') }}" alt=""></i>
                            <strong>Get Ideas</strong>
                            <span>Godard pabst prism fam cliche.</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img src="{{ asset('assets/image/work-process-item-01.png') }}" alt=""></i>
                            <strong>Sketch Up</strong>
                            <span>Godard pabst prism fam cliche.</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img src="{{ asset('assets/image/work-process-item-01.png') }}" alt=""></i>
                            <strong>Discuss</strong>
                            <span>Godard pabst prism fam cliche.</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img src="{{ asset('assets/image/work-process-item-01.png') }}" alt=""></i>
                            <strong>Revise</strong>
                            <span>Godard pabst prism fam cliche.</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img src="{{ asset('assets/image/work-process-item-01.png') }}" alt=""></i>
                            <strong>Approve</strong>
                            <span>Godard pabst prism fam cliche.</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img src="{{ asset('assets/image/work-process-item-01.png') }}" alt=""></i>
                            <strong>Launch</strong>
                            <span>Godard pabst prism fam cliche.</span>
                        </a>
                    </div>
                </div>
                <!-- ***** Mini Box End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Home Parallax End ***** -->

    <!-- ***** Testimonials Start ***** -->
    <section class="section" id="testimonials">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">What do they say?</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Donec tempus, sem non rutrum imperdiet, lectus orci fringilla nulla, at accumsan elit eros a
                            turpis. Ut sagittis lectus libero.</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <!-- ***** Testimonials Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-item">
                        <div class="team-content">
                            <i><img src="assets/image/testimonial-icon.png" alt=""></i>
                            <p>Proin a neque nisi. Nam ipsum nisi, venenatis ut nulla quis, egestas scelerisque orci.
                                Maecenas a finibus odio.</p>
                            <div class="user-image">
                                <img src="http://placehold.it/60x60" alt="">
                            </div>
                            <div class="team-info">
                                <h3 class="user-name">Catherine Soft</h3>
                                <span>Managing Director</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Testimonials Item End ***** -->

                <!-- ***** Testimonials Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-item">
                        <div class="team-content">
                            <i><img src="assets/image/testimonial-icon.png" alt=""></i>
                            <p>Integer molestie aliquam gravida. Nullam nec arcu finibus, imperdiet nulla vitae,
                                placerat nibh. Cras maximus venenatis molestie.</p>
                            <div class="user-image">
                                <img src="http://placehold.it/60x60" alt="">
                            </div>
                            <div class="team-info">
                                <h3 class="user-name">Kelvin Wood</h3>
                                <span>Digital Marketer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Testimonials Item End ***** -->

                <!-- ***** Testimonials Item Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="team-item">
                        <div class="team-content">
                            <i><img src="assets/image/testimonial-icon.png" alt=""></i>
                            <p>Quisque diam odio, maximus ac consectetur eu, auctor non lorem. Cras quis est non ante
                                ultrices molestie. Ut vehicula et diam at aliquam.</p>
                            <div class="user-image">
                                <img src="http://placehold.it/60x60" alt="">
                            </div>
                            <div class="team-info">
                                <h3 class="user-name">David Martin</h3>
                                <span>Website Manager</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Testimonials Item End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Testimonials End ***** -->

    <!-- ***** Pricing Plans Start ***** -->
    <section class="projects-section">
        <h1 class="projects-h1">Projects</h1>
        <div class="projects-container">
            <div class="projects-item" id="1">
                <img src="https://images.unsplash.com/photo-1508124780861-b1687f9a13e5?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=f841d43a63c085e930aa5b6b33e89a9f&auto=format&fit=crop&w=1385&q=80"
                    alt="" class="projects-img">
                <div class="projects-text">
                    <h3>PROJECT 1</h4>
                        <p>Short Description</p>
                </div>
                <div class="projects-button">Learn More</div>
            </div>
            <div class="projects-item" id="1">
                <img src="https://images.unsplash.com/photo-1508124780861-b1687f9a13e5?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=f841d43a63c085e930aa5b6b33e89a9f&auto=format&fit=crop&w=1385&q=80"
                    alt="" class="projects-img">
                <div class="projects-text">
                    <h3>PROJECT 1</h4>
                        <p>Short Description</p>
                </div>
                <div class="projects-button">Learn More</div>
            </div>
            <div class="projects-item" id="1">
                <img src="https://images.unsplash.com/photo-1508124780861-b1687f9a13e5?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=f841d43a63c085e930aa5b6b33e89a9f&auto=format&fit=crop&w=1385&q=80"
                    alt="" class="projects-img">
                <div class="projects-text">
                    <h3>PROJECT 1</h4>
                        <p>Short Description</p>
                </div>
                <div class="projects-button">Learn More</div>
            </div>
            <div class="projects-item" id="1">
                <img src="https://images.unsplash.com/photo-1508124780861-b1687f9a13e5?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=f841d43a63c085e930aa5b6b33e89a9f&auto=format&fit=crop&w=1385&q=80"
                    alt="" class="projects-img">
                <div class="projects-text">
                    <h3>PROJECT 1</h4>
                        <p>Short Description</p>
                </div>
                <div class="projects-button">Learn More</div>
            </div>
            <div class="projects-item" id="1">
                <img src="https://images.unsplash.com/photo-1508124780861-b1687f9a13e5?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=f841d43a63c085e930aa5b6b33e89a9f&auto=format&fit=crop&w=1385&q=80"
                    alt="" class="projects-img">
                <div class="projects-text">
                    <h3>PROJECT 1</h4>
                        <p>Short Description</p>
                </div>
                <div class="projects-button">Learn More</div>
            </div>
            <div class="projects-item" id="1">
                <img src="https://images.unsplash.com/photo-1508124780861-b1687f9a13e5?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=f841d43a63c085e930aa5b6b33e89a9f&auto=format&fit=crop&w=1385&q=80"
                    alt="" class="projects-img">
                <div class="projects-text">
                    <h3>PROJECT 1</h4>
                        <p>Short Description</p>
                </div>
                <div class="projects-button">Learn More</div>
            </div>


        </div>
        <div id="projects-preview" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <img id="img" src="">
                <div id="details">
                    <h3 id="title"></h3>
                    <p id="info">Some text</p>
                    <div class="button" id="live">View</div>
                    <i class="fab fa-github-square" id="github"></i>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Pricing Plans End ***** -->

    <!-- ***** Counter Parallax Start ***** -->
    <section class="counter" style="background-image: url('{{ asset('assets/image/fun-facts-bg.png') }}')">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="count-item decoration-bottom "
                            style="background-image: url('{{ asset('assets/image/circle-dec.png') }}')  background-position: center center; background-repeat: no-repeat;  ">
                            <strong>126</strong>
                            <span>Projects</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="count-item decoration-top"
                            style="background-image: url('{{ asset('assets/image/circle-dec.png') }}')  background-position: center center; background-repeat: no-repeat;">
                            <strong>63</strong>
                            <span>Happy Clients</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="count-item decoration-bottom"
                            style="background-image: url('{{ asset('assets/image/circle-dec.png') }}'); background-position: center center; background-repeat: no-repeat;">
                            <strong>18</strong>
                            <span>Awards Wins</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="count-item">
                            <strong>27</strong>
                            <span>Countries</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Counter Parallax End ***** -->

    <!-- ***** Blog Start ***** -->
    <section class="section" id="blog">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Blog Entries</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Integer molestie aliquam gravida. Nullam nec arcu finibus, imperdiet nulla vitae, placerat
                            nibh. Cras maximus venenatis molestie.</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-thumb">
                        <div class="img">
                            <img src="assets/image/blog-item-01.png" alt="">
                        </div>
                        <div class="blog-content">
                            <h3>
                                <a href="#">Vivamus ac vehicula dui</a>
                            </h3>
                            <div class="text">
                                Cras aliquet ligula dui, vitae fermentum velit tincidunt id. Praesent eu finibus nunc.
                                Nulla in sagittis eros. Aliquam egestas augue.
                            </div>
                            <a href="#" class="main-button">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-thumb">
                        <div class="img">
                            <img src="assets/image/blog-item-02.png" alt="">
                        </div>
                        <div class="blog-content">
                            <h3>
                                <a href="#">Phasellus convallis augue</a>
                            </h3>
                            <div class="text">
                                Aliquam commodo ornare nisl, et scelerisque nisl dignissim ac. Vestibulum finibus urna
                                ut velit venenatis, vel ultrices sapien mattis.
                            </div>
                            <a href="#" class="main-button">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-thumb">
                        <div class="img">
                            <img src="assets/image/blog-item-03.png" alt="">
                        </div>
                        <div class="blog-content">
                            <h3>
                                <a href="#">Nam gravida purus non</a>
                            </h3>
                            <div class="text">
                                Maecenas eu erat vitae dui convallis consequat vel gravida nulla. Vestibulum finibus
                                euismod odio, ut tempus enim varius eu.
                            </div>
                            <a href="#" class="main-button">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Blog End ***** -->

    <!-- ***** Contact Us Start ***** -->
    <section class="section colored" id="contact-us">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Talk To Us</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Maecenas pellentesque ante faucibus lectus vulputate sollicitudin. Cras feugiat hendrerit
                            semper.</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <!-- ***** Contact Text Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <h5 class="margin-bottom-30">Keep in touch</h5>
                    <div class="contact-text">
                        <p>110-220 Quisque diam odio, maximus ac consectetur eu, 10260
                            <br>auctor non lorem
                        </p>
                        <p>You are NOT allowed to re-distribute Softy Pinko template on any template collection
                            websites. Thank you.</p>
                    </div>
                </div>
                <!-- ***** Contact Text End ***** -->

                <!-- ***** Contact Form Start ***** -->
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="contact-form">
                        <form id="contact" action="" method="get">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="name" type="text" class="form-control" id="name"
                                            placeholder="Full Name" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="email" type="email" class="form-control" id="email"
                                            placeholder="E-Mail Address" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message"
                                            required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="main-button">Send
                                            Message</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ***** Contact Form End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Contact Us End ***** -->
@endsection
@section('js')
    <script>
        var modalInfo = {
  1: {
    title: "Project 1",
    info: "...",
    link: "#",
    github: "#"
  },
  2: {
    title: "Project 2",
    info: "...",
    link: "#",
    github: "#"
  },
  3: {
    title: "Project 3",
    info: "...",
    link: "#",
    github: "#"
  },
  4: {
    title: "Project 4",
    info: "....",
    link: "#",
    github: "#"
  },
  5: {
    title: "Project 5",
    info: "...",
    link: "#",
    github: "#"
  },
  6: {
    title: "Project 6",
    info: "...",
    link: "#",
    github: "#"
  }
};

// Get the modal
var modal = document.getElementById('projects-preview');

// button that opens the modal
var btn = document.getElementsByClassName("projects-button");

// <span> that closes the modal
var span = document.getElementsByClassName("close")[0];

// open modal 
for(let i = 0; i < btn.length; i++){
  btn[i].addEventListener("click", function() {
    var project = btn[i].parentElement;
    openModal(project);
  })
};

function openModal(project){
  var id = project.id;
  var img = project.getElementsByTagName("img")[0].src;
  fillOut(id, img);
  modal.style.display = "block";
  document.getElementsByClassName("modal-content")[0].classList.add("scale");
}

function fillOut(id, img){
  document.getElementById("title").innerHTML = modalInfo[id].title;
  document.getElementById("info").innerHTML = modalInfo[id].info;
  document.getElementById("img").src = img;
  document.getElementById("live").onclick = function(){
    window.open(modalInfo[id].link,'_blank');
  }
  document.getElementById("github").onclick = function(){
    window.open(modalInfo[id].github,'_blank');
  }
}

// close the modal
span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
    </script>
@endsection
