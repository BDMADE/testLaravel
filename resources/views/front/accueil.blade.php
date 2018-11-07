@extends('layouts.template')




@section('header')
    @include('front.header')
@endsection


@section('menu')
    @include('layouts.menu')
@endsection

@section('content')
<!-- ====== Features Section ====== -->
<!--section id="ourservice" style="background-color: #d1d8e03d; padding-bottom:100px;">
    <div class="features section-padding no-padding-bottom">
        <div class="container">

            <div class="header">
                <i class="fa fa-headphones" style="color: #ebbb2e; text-align: center; font-size: 8em;"></i>
                <h1>Get Help from Experts</h1>
                <p> Struggling with your assignments, essay or Dissertation ?</p>
                <p> Give your self a peace of mind with our professional writers for any subject, deadline and any complexity. We provide 100% confidential and plagiarism free papers with guaranteed grade. </p>
                <p>
                    <i class="fa fa-paypal" style="color: #1B9CFC;"></i> Payment after Complete work <br>
                    <i class="fa fa-cc-paypal" style="color: #1B9CFC;"></i>
                    <i class="fa fa-credit-card" style="color: #eb4d4b;"></i>
                    Paypal and All Credit Card Accepted!
                </p>

            </div>
        </div>

    </div>
</section-->

<section id="presentation">
    <div class="features section-padding no-padding-bottom">
        <div class="container">

            <div class="row">
                <div class="header">
                    <h1>Enhance Your Academic Grades and Skills with Our Experts</h1>

                    <p> Our fields of experts, and our team of writers, proofreader and quality assurers
                        strive to give you nothing but the best, our work quality is all you need! The features includes:
                    </p>

                </div>
                <div class="col-sm-4 hidden-xs">
                    <div class="featured-item-img">
                        <i class="fa fa-graduation-cap" style="color: #0a3d62; text-align: center; font-size: 12em;"></i><br>
                        <i class="fa fa-user" style="color: #6a89cc; text-align: center; font-size: 20em; margin-top: -0.1em; margin-left: -0.10em;"></i>

                        <!--img src="{{asset('images/prise_de_notes_bloc_note.png')}}" alt=""-->
                    </div>
                </div>
                <div class="col-sm-8 col-xs-12 feature-list">
                    <div class="row">

                        <div class="col-sm-6 col-md-6">
                            <div class="featured-item">
                                <div class="icon">
                                    <div class="icon-style"><i class="fa fa-clock-o" ></i></div>
                                </div> <!-- end icon -->
                                <div class="meta-text">
                                    <h3>On Time Delivery </h3>
                                    <p>All paper are delivered in due time.</p>
                                </div> <!-- end .meta-text -->
                            </div> <!-- end .featured-item -->
                        </div> <!-- end .feature-list> .row > .col-md-6 (1st item) -->

                        <div class="col-sm-6 col-md-6">
                            <div class="featured-item">
                                <div class="icon">
                                    <div class="icon-style"><i class="fa fa-refresh"></i></div>
                                </div> <!-- end icon -->
                                <div class="meta-text">
                                    <h3>Unlimited Revision</h3>
                                    <p>Get unlimited revision as long as you need.</p>
                                </div> <!-- end .meta-text -->
                            </div> <!-- end .featured-item -->
                        </div> <!-- end .feature-list> .row > .col-md-6 (2nd item) -->

                        <div class="col-sm-6 col-md-6">
                            <div class="featured-item">
                                <div class="icon">
                                    <div class="icon-style"><i class="fa fa-headphones"></i></div>
                                </div> <!-- end icon -->
                                <div class="meta-text">
                                    <h3>24/7 Support</h3>
                                    <p>Our friendly experts are always available to serve you!</p>
                                </div> <!-- end .meta-text -->
                            </div> <!-- end .featured-item -->
                        </div> <!-- end .feature-list> .row > .col-md-6 (3rd item) -->

                        <div class="col-sm-6 col-md-6">
                            <div class="featured-item">
                                <div class="icon">
                                    <div class="icon-style"><i class="fa fa-copyright" aria-hidden="true"></i></div>
                                </div> <!-- end icon -->
                                <div class="meta-text">
                                    <h3>100% Plagiarism Free</h3>
                                    <p>All the work are original research and properly referenced .</p>
                                </div> <!-- end .meta-text -->
                            </div> <!-- end .featured-item -->
                        </div> <!-- end .feature-list> .row > .col-md-6 (4th item) -->

                        <div class="col-sm-6 col-md-6">
                            <div class="featured-item">
                                <div class="icon">
                                    <div class="icon-style"><i class="fa fa-paypal"></i></div>
                                </div> <!-- end icon -->
                                <div class="meta-text">
                                    <h3>Payment after 100% satisfaction</h3>
                                    <p>Split your payment, and pay the final amount upon satisfied work quality.</p>
                                </div> <!-- end .meta-text -->
                            </div> <!-- end .featured-item -->
                        </div> <!-- end .feature-list> .row > .col-md-6 (5th item) -->

                        <div class="col-sm-6 col-md-6">
                            <div class="featured-item">
                                <div class="icon">
                                    <div class="icon-style"><i class="fa fa-lock"></i></div>
                                </div> <!-- end icon -->
                                <div class="meta-text">
                                    <h3>100% privacy and Confidential</h3>
                                    <p>We do not collect or share any of your information with anyone!.</p>
                                </div> <!-- end .meta-text -->
                            </div> <!-- end .featured-item -->
                        </div> <!-- end .feature-list> .row > .col-md-6 (6th item) -->

                    </div> <!-- end .feature-list> .row -->
                </div> <!-- end .feature-list -->
            </div> <!-- end .container> .row -->

        </div> <!-- end .container -->

        <div class="container">
            <div class="row">
                <div class="col-xs-12 center">
                    <a href="{{url('order')}}" class="btn btn-lg btn-link btn-order"> Order now </a>
                </div>
            </div>
        </div>

    </div> <!-- end .features -->
</section>
<!-- ====== End Features Section ====== -->

<style>

    .bloc-elm-5{
        width: 19%;
        margin-right: 1%;
        float: left;
    }
    @media screen and (max-width: 700px) {
        .bloc-elm-5{
            width: 98%;
            margin-right: 1%;
            float: left;
        }
    }

</style>

<!-- ====== Download Section ====== -->
<section id="download">
    <div class="bg-color">
        <div class="download section-padding">
            <div class="container">

                <div class="header">
                    <h1> <strong>How does it work ?</strong></h1>
                    <div class="underline"><i class="fa fa-cog"></i></div>
                </div> <!-- end .container > .header -->

                <div class="row download-area">

                    <div class="bloc-elm-5 how-it-works no-padding">
                        <div class="header-how-it-works">
                            <span>1. Submit Order Details </span>
                        </div>
                        <i class="fa fa-chevron-right"></i>
                        <div class="explane-how-it-works">
                            <p>
                                Placing an order with us is very easy with features to provide all your instructions and requirements and get a customized low cost.
                            </p>
                        </div> <!-- end .download-area> .col-lg-3 (1) -->
                    </div> <!-- end .download-area> .col-lg-3 (1) -->

                    <div class="bloc-elm-5 how-it-works no-padding">
                        <div class="header-how-it-works">
                            <span>2. Instructions Reviews and Discussions </span>
                        </div>
                        <i class="fa fa-chevron-right"></i>
                        <div class="explane-how-it-works">
                            <p>
                                All the instructions are reviewed and discussed between writers and experts, and prepare the writers to get started in no time.
                            </p>
                        </div> <!-- end .download-area> .col-lg-3 (1) -->
                    </div> <!-- end .download-area> .col-lg-3 (2) -->

                    <div class="bloc-elm-5 how-it-works no-padding">
                        <div class="header-how-it-works">
                            <span>3. Paper Sent to You and Quality Team</span>
                        </div>
                        <i class="fa fa-chevron-right"></i>
                        <div class="explane-how-it-works">
                            <p>
                                Once paper is done, we sent to you and also our quality control team, with your and quality control feedback, we thrive to bring better output.
                            </p>
                        </div> <!-- end .download-area> .col-lg-3 (1) -->
                    </div> <!-- end .download-area> .col-lg-3 (3) -->

                    <div class="bloc-elm-5 how-it-works no-padding">
                        <div class="header-how-it-works">
                            <span>4. Revision and Proofread</span>
                        </div>
                        <i class="fa fa-chevron-right"></i>
                        <div class="explane-how-it-works">
                            <p>
                                The feedback from you and quality controller are taken into consideration and revision are done promptly and you can access after login to our site.
                            </p>
                        </div> <!-- end .download-area> .col-lg-3 (1) -->
                    </div> <!-- end .download-area> .col-lg-3 (4) -->

                    <div class="bloc-elm-5 how-it-works no-padding">
                        <div class="header-how-it-works-last">
                            <span>5. Satisfied!!! Complete your Payment</span>
                        </div>
                        <div class="explane-how-it-works">
                            <p>
                                Once you get your complete paper, you can review the paper, and once you are satisfied, you can pay the final amount at the after login dashboard.
                            </p>
                        </div> <!-- end .download-area> .col-lg-3 (1) -->
                    </div> <!-- end .download-area> .col-lg-3 (4) -->

                </div> <!-- end .container > .row/.download-area -->

            </div> <!-- end .container -->

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 center">
                        <a href="{{url('order')}}" class="btn btn-lg btn-link btn-order"> Order now </a>
                    </div>
                </div>
            </div>
        </div> <!-- end .download -->
    </div> <!-- end .bg-color -->
</section>
<!-- ====== End Download Section ====== -->



<!-- ====== Screenshots Section ====== -->
<section id="ourstats">
    <div class="price section-padding dark-bg">
        <div class="container-fluid">

            <div class="header">
                <h1 style="font-size: 2em;">Our service includes anything from writing, guiding and proofreading </h1>
                <p>If you are stressed with anything throughout your study, our service covers you. Whether its your understanding or your missing lectures bothers you or you simply want a better grades, whatever it it, and whatever the situation you are in, we are to help, just simply fill out the form or chat with our support staff. </p>
                <div class="underline"><i class="fa fa-edit"></i></div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="">
                    <div class="col-xs-12 ">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 stat no-padding">
                            <h2 class="titre-bloc-service">
                                Essay services</h2>
                            <div class="underline1"><i class="fa fa-cog"></i></div>
                            <div class="col-sm-12 col-xs-12 list-paragraph no-padding">
                                <p class="" >Essay writting service</p>
                                <p class="" >Assignment writing service </p>
                                <p class="" >Coursework wrinting service</p>
                                <p class="" >Essay outline / Plan service</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 stat no-padding">
                            <h2 class="titre-bloc-service">
                                Dissertation Services</h2>
                            <div class="underline1"><i class="fa fa-cog"></i></div>
                            <div class="col-sm-12 col-xs-12 list-paragraph no-padding">
                                <p class="" >Dissertation writting service</p>
                                <p class="" >Dissertation proposal service </p>
                                <p class="" >Topic with title service</p>
                                <p class="" >literature review service</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 stat no-padding">
                            <h2 class="titre-bloc-service">
                                Report writing</h2>
                            <div class="underline1"><i class="fa fa-cog"></i></div>
                            <div class="col-sm-12 col-xs-12 list-paragraph no-padding">
                                <p class="" >Report Writing service</p>
                                <p class="" >Reflective practice service </p>
                                <p class="" >Research report service</p>
                                <p class="" >Report correcting service</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 stat no-padding">
                            <h2 class="titre-bloc-service">
                                Other</h2>
                            <div class="underline1"><i class="fa fa-cog"></i></div>
                            <div class="col-sm-12 col-xs-12 list-paragraph no-padding">
                                <p class="" >Proofreading service</p>
                                <p class="" >Exam revision service </p>
                                <p class="" >Presentation service</p>
                                <p class="" >Making and guiding service</p>
                                <p class="" >Tutoring service</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end owl carousel -->

        </div> <!-- .container -->

        <div class="container">
            <div class="row">
                <div class="col-xs-12 center">
                    <a href="{{url('order')}}" class="btn btn-lg btn-link btn-order"> Order now </a>
                </div>
            </div>
        </div>
    </div> <!-- end .screenshots -->
</section>
<!-- ====== End Screenshots Section ====== -->


<style>
    .card-text{
        background-color: white;
        padding: 15px;
        text-align: center;
    }
</style>

<!-- ====== Screenshots Section ====== -->
<section id="sample">
    <div class="price section-padding dark-bg">
        <div class="container-fluid">

            <div class="header">
                <h1 style="font-size: 2em;">Samples </h1>
                <p>Confused over what you looking for ??? Check out the samples</p>
                <div class="underline"><i class="fa fa-cog"></i></div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="">
                    <div class="col-xs-12 ">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="card">
                                <img class="card-img-top" src="data:image/jpeg;base64,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" alt="Card image cap">
                                <div class="card-block">
                                    <p class="card-text"> Sample Title</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="card">
                                <img class="card-img-top" src="data:image/jpeg;base64,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" alt="Card image cap">
                                <div class="card-block">
                                    <p class="card-text"> Sample Title</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="card">
                                <img class="card-img-top" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxISEhUSEhIVFRUVFRAVFxcVFRUVFRUVFRUWFxUVFxUYHSggGBolHRUVITEhJSkrLi4uFx8zODMsNygtLisBCgoKDg0OFxAQFysdHx0vLS0rKzArLS0tLS0tLS0tLy0tLy0tLS0tLS0tKy0tLS0tLS0tLS0tLS0tLS0tLS0rLf/AABEIALcBEwMBIgACEQEDEQH/xAAbAAACAwEBAQAAAAAAAAAAAAADBAACBQEGB//EAD0QAAIBAgMECAUBBwIHAAAAAAABAgMRBBIhMUFRYQUGcYGRocHwEyKx0eEyFCNSkqLC8QdiJDM0QnJzgv/EABoBAAMBAQEBAAAAAAAAAAAAAAABAgMEBQb/xAAnEQEBAQEAAQMDAwUBAAAAAAAAAQIRAxIhMQRRcTJBkSJhgZLhE//aAAwDAQACEQMRAD8A+hYWRoUjIwlQ06MzFUOQDwFYMYgyoBkXQOIRFE6cZDjGHGVZYqwDjKMuyjEFGVkWbKtgAZi8xmQCSEReQKaDtApAmlZxF6kB2UAEojTYSqUgMqY9OIGUQTYQnSAypj04gpQGiwg6YGpTNCcQFSJSLGbOAJxNCcAM4DTwm4A5RHHTBSpgROUQUojkogZxAEakReoh2pEUqoqEUaIFsQoPq2Cma+HkecwFY3KFQ5K78X2atNjEGIUqg1CQ4s3Fl0wEJBEyiXuS5W5LjCM5cjZy4g4yrOtlWwDjKSLNlGwAcgU0FkDkBBSQKUQzKSQEXkgTQxNAQKgTQvIakgFRAil6gGSGJIBJDTQaiAyQzJAZIaaXnEDUikrvRLbcZnJJNvRLVvckfOesnTzrzcYN/CjsWzM/4mt/JMYzj1Vq9I9a4xk40oZ7XWZu0b8rbVzLdGdYY1JKFSKg3e0k/k5J32HlKcG9Wy8aT3C66P8Axzzj6BOACpAp0PjFUhZ/qikne13zshqcSpXHrNzeVnVIClWJo1oiVaI4gm4nAjRCg9n0fVPQYOoeUwVRG7hKxz6jo8enoaUxunIycPVH6UyXTK0ISDxYlTmMRmOGNc5crc5mKJe5y5VslwCNnLnMxVsA6yjJcjEFJApBJMGwJVlGi7BtgA5ApINIDIE0KYGQeQJjSWmCnEZmgUkBUvIFJB5REOmMbGhSlUlbRaL+KT2R97kxp48l186acf8AhoaZknN8nshy4vuPF0KV2kExdeVWcpyd3Jtt82M4KnaMpdy8m/7fMd9o6cZ5HUlfgP4alG17SYrh6V2bCnGMdjI1Wsh/q7ZxnJRsrqK7ld/VGnJAuiKdqUdLN6tcLh5ovPw8/wA17ulKyEa0TQqiVZFMaQkjpZohRNTA1TbwlU8rgqljewtQjUPGnpsNUNKhVMDC1dDTw9QxsdmdNinUGITMylUG6cwadOqR3MAjIsmMC3JcG5HVIYXbKsq2cuAWRxs5c5cA5IEy7ByYE5Io2dbKsArJA5F2wc2CVJApoJJg2MqHIHIKwcmBAtHzX/UDpL4lT4UZaU3l7Zv9Xhou5n0to+M9YqKWKqJNO1Sd7cb3feVDxPcnTemvf6jyVoxXK77Za+opGndqPGy72/tc05QvN9otOiQ3gKKNFtLTLmd1Zbu/giuCpaaIawsW6kU9FfT/AHNa27NDC3ta/pz1sKNlYHIPMDM6Y8m3t6VqilVDtWInVQ0UnKJC7RwZE8LUNrC1jzmHma2FmVqM816XCVTUoVTzuErGlQqmFjqxpv0qg7RqGLh6o9Sqk8bzTVhMNFiNOoHjUBZi5Lg8xMwGI2czAnI5mAh7kKQkdkwDjYKZabBtjDkmcuRsrJgSsgTYRsDICqA5nZMo5DS5JlGduVbAgMXVyQlO36Yyl22V7HyWE1WqSnOEVKSV0/lk5LRuMno2tVZ7Vbk19U6a/wCnq/8ArqeUW0fFamImpvdfR63T7RyNMNfomjepKW3Lmey36VpdPY9WOYGN3cp0FTtQnN79PF/Zo0OjsM7XRlvXvXVmfB+jBpXXmX6Ji51pTeqhFJcLy4crJnKtJqOvht8txodDt/CSe5y723fv22vyI8XvS+otmB5oDNDE0BkjqeXSsxSqh2aFKg0UlJELyRBkwMOzTwszGw8jSoTNdxz5rZw9U06FQwqMzSw9TQxsb5rcoVR6jVMOlWHaVczsb503KVcZjXMSFcYhWuLjWabCrE+IZ0KoWNQXF+o6qhZSFFMLCQH03BlpSAxkRTA1nIE5EYJsZVe5JMqmTMBKykDkdkwbYErIHcvKQJsaXJMq2cbONoCYHXjEKOGcb2cmtL7VHV+eU+VwjmbdtT2n+pLk5w4KHm5SvbwXkeb6JoX0e8qe062xPZ6mhhMuBpPfOV/Btf2ocwNGyQ90nQthcNHilL+a8v7ymHw+hw613v5d+YpXxEUtdvBbx/Br93F2tdXtwv6iGIoW2Wu7Jdr0Rq2srLdoa+Cfu5frNckgUkClENJgZnU84tUFqg3MUqjRSkuwh2SIBPJUmP0JGbSY5RkdWo5M1qUZj1GoZdOQ3SmYWN5WrSqjlKoZNKoN0qhFjSVqUqg5SmZVOoN0qhNjSVqUpDMWZlOqO0qhLWUzmD02KxkFjIS4bUiKQFSOqQldEuUkyuY45jJe5Vso5nJTALSAzZaUgbYyVkwci8pApAlxlGdZUCeC6+vNVt/DGK9f7kZXQa+ZLmvqanXKD/aJLbmjCWm7TLr/AC+aM/oGl+8ilxDV/prr8U+H0np2h+7w0eFOC8IQTM6NOy0Ru9ZnlnTjbRRf1t6GfUp2joeda7s/BKjRzTUn/wBrvbu89w60cpRsue8kpHd4ZzLzPqtd8n4CmgU0FmCkzZyUvUFaiGagvVY00o0QsyAl4uAzSYpAPTZ2VxRoU5DdKYhSYzTZhY3lPwkNU5mfCQxCZFi40acxmFQzYTD05krla1KoPU5mPRmO0Zk2NM1qwmFhMQp1A9ORLWU6pFlMWjMtmErorkVcwLkczAOiZyOoAuTMMui5ySkCbOOYDrrkVbOORW4E62VucbB3GTzvWalerByj8jjbPfZJN6NbtN648hHqzhr4lbGrt6O6ej8T1OJw8ZpKSvZprtQLobouMMWpJNZ7NrZe7SuuK1/Jh5rZ3+7u+ms1Pw9H1ioZq1+Ct/UzMcGna+iNTpmovjSXC3HfqZWIm1eOy9r+i98jlzm73x078k8fj9QM5g5SKyZRnpSceLdW3tWcgM2WbKSY0hTF6geYCY00vJnC0iATxEQkCig+D8GXSOxx8pqkxqnISpsYhIz1GmTsGHhIUhIKpGdaQ5CYaMxOEgqmTxTSozHKMzJp1BunVJsVK1aVQZjUMqnUG4T5k2NJo9GoFzicXzCRkSuUaUzjkCcjmcY6LmOZgMpHM4Do7mVzgnIq5gXRsxM4DMTOHB0WTKORWcyjYy6LGSur7N/ZvN2jRjelKN8rnG19bWu7eR5yT02256O3iI9V8XWzx+JXjLLN2usumqu90XqYeeezq+m1y16/pOlerOWWTs9qi7bFvdl5mLipPM7q19dqb13trfyM/GYvPKo3U+dyttdttovdfuSD3F9PJ7q+q3bJEkwUmXkwbZ0uFVsqzrZVjJyQGQWTASYEDIhGcAuNucorbY78LMtIrv0GKNHe9WGzJHjPpWb+wcVEvHAreovuHPiLcDcvwXLouQB4dbooJGhyXgg0F2ovOduPcFtHIWdFcvBFZYZcF4IYy227Xpr9isl2cxzpXgPwv/HwRT4PJeCsMKn6bSWH2jkoEaXBIs6bW4MmdQeqj0wOzJryLuJzIL1U/TPsHJkjMtNFcodpemfZJ1ewvg5XzX4teCX5F5oLg18i53f8zuvqGr7CSdEnIDJsJJAas/fiKVVjvxbbjkcQ9ll4C05A5ztv5l8T05PEvgvAqsQ3ZcexCjqPx0B1pWvm2bxyFadq9IU4ScJVKeZOzjmjmT4WdtTN6AoOpOSmoOk3JtSa+aLWt4PavmXeuRldBdIUaNWcqtBV9ijGcmowb1coxtq2273vytv9pgetlOUZJYKhGy3QT0vazVlc6PRnDzPJ5N7+bJz7PFYTG0/jRhBvIquVp7I/DSikkr2jeK1PXSxMdt16bt/AVp9bLNuGCwceaoWbt4cwmI6/VIUm/wBnw7Tssrp/LrtTSlwFvE1Wnh8txPnpyE78Dslv08EY3RnSLrQ+JlUW3bKrtfpey+u004Sd9Dj3m5vHo4s1JfuYVbdZeBz4vZ4EcN5aUTLq+JLireCKwqW4EhPkvAvUhwQjVT5kB68CAB6k3sA5H+LaeI017ZyT97jSVKkadlrYva2rVvrqXhTvsTfO+w443fuyH0lP89/ArGo9y7977C9m3Za8eC/B34Wt+XnxKnCBySbv+S2Ty7AyT5ncrC6HC+0skEcWRxF0w0clMJkKOAugJanbhsvlcpZh3oVVvfmdum/wVjfTX3axaK5/jcOgPE4eSg5afpbXbb8BoUVG0bXSslt2LRAKj1jFvbOK/lvOXioMai9y9+/sKiBSp67PaKVcN799wdyd7cvrt9Akpe+3/Au8NlPDX9+KFcRQt797vQ2r/V+bOVoX2q9/wXN8pXLFoxs9fUU6SWWMm72Xja56J0L7FxMjpPAVpxcYWa1Wr+g8bnqTrPtXgKmJjCbvLbla47xzBY9KFaebZFOzdnrKKSXaKdMdW8bUqX/Z5aKKvGzjppuBUep9dNSnRqyVr/pjGNu3PfzPSm8WfM/l43m8Gvf21/iU/ieklFJxu72Xzppr03CfSHSLnC6/TZt8ney7tWHj1Wklf9jlu2yaeu7/AJvoBqdUKrd1QnBbvmhLXdpKV/Mfr8c/efyxx4t9/Tr/AF/69p1Thmw8ZZrRlKT/AKr2XBnoKVHZnsm7tO6a0b4bNNDL6AwKpYWNKS1jHXW3zbm9WuenEYhKUbb1Z7Nfz3nmeS+rWufd73hlz48y/ZrKy2Ne+4vkTWluwzKU7LbpzTt2jEKz4934MLG0FdLiV2FoVL6Pd2ok4bdNPv2kmnykKOHuxBAzKL8ey/dwBzprZrf3tIQ0iEnNrTalzavy7AkZtrRJX8EiEK/YOqCWnts6rbiEEEyo4iEAJl9SW4++JCCCsl9zi0IQAq5W0KTb9++ZCDDsJfX0KW4b/wAfc4QQJu7rR4KFSX/18sV5OQ5Sbvt4cP8Ab9mQhdKCQX19LkcffcdIRapFDS5HS2s6QVppZETW737uQggFO7W/x4ai8k1rx33015d5CAHFG752u3v7NO7YR4ZNaR77/XZchAogtJKyje714+pSrFLmly1XL/BCDgSyau0WjTi9nh73EIKnFZNJ/gcw9S69+BCC18ARVZcH4r7EIQg3/9k=" alt="Card image cap">
                                <div class="card-block">
                                    <p class="card-text"> Sample Title</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- end owl carousel -->

        </div> <!-- .container -->

        <div class="container">
            <div class="row">
                <div class="col-xs-12 center">
                    <a href="{{url('order')}}" class="btn btn-lg btn-link btn-order"> Order now </a>
                </div>
            </div>
        </div>
    </div> <!-- end .screenshots -->
</section>
<!-- ====== End Screenshots Section ====== -->







<!-- ====== Testimonial Section ====== -->
<!--section id="testimonial">
    <div class="bg-color bg-testimonial">
        <div class="testimonial section-padding">
            <div class="container">
                <div class="testimonial-slide">

                    <div class="testimonial-header">
                        <h1> <strong>what our customers say</strong></h1>
                        <div class="underline small-margin-bottom"><i class="fa fa-cog"></i></div>
                    </div>


                    <div id="carousel-testimonial" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-testimonial" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-testimonial" data-slide-to="1" class=""></li>
                            <li data-target="#carousel-testimonial" data-slide-to="2" class=""></li>
                        </ol>
                        <div class="carousel-inner">

                            <div class="item">
                                <div class="image">
                                    <img src="{{asset('images/01.jpg')}}" alt="">
                                </div>
                                <div class="content">
                                    <p class="block-customer-name">
                                        <strong>Jon Doe (Web developer)</strong>
                                        <span class="note">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </p>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut dignissimos ipsam obcaecati
                                        corrupti modi, deserunt facere asperiores. Voluptatum laudantium ut, minus nam. Libero
                                        facilis aspernatur cumque, quisquam quod sint odit.
                                    </p>
                                </div>
                            </div>

                            <div class="item active left">
                                <div class="image">
                                    <img src="{{asset('images/02.jpg')}}" alt="">
                                </div>
                                <div class="content">
                                    <p class="block-customer-name">
                                        <strong>Jon Doe (Web developer)</strong>
                                        <span class="note">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut dignissimos ipsam obcaecati corrupti modi, deserunt facere asperiores. Voluptatum laudantium ut, minus nam. Libero facilis aspernatur cumque, quisquam quod sint odit.</p>

                                </div>
                            </div>

                            <div class="item next left">
                                <div class="image">
                                    <img src="{{asset('images/03.jpg')}}" alt="">
                                </div>
                                <div class="content">
                                    <p class="block-customer-name">
                                        <strong>Jon Doe (Web developer)</strong>
                                        <span class="note">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut dignissimos ipsam obcaecati corrupti modi, deserunt facere asperiores. Voluptatum laudantium ut, minus nam. Libero facilis aspernatur cumque, quisquam quod sint odit.</p>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 center">
                        <a href="{{url('order')}}" class="btn btn-lg btn-link btn-order"> Order now </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section-->
<!-- ====== End Testimonial Section ====== -->



<!-- ====== Price Section ====== -->
<!--section  class="services" id="domaine">
    <div class="price section-padding dark-bg">
        <div class="container">

            <div class="header">
                <h1>Type of paper</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui hic laboriosam odio doloribus suscipit error nostrum totam dignissimos esse numquam voluptatum, aspernatur est, at voluptatem minus</p>
                <div class="underline small-margin-bottom"><i class="fa fa-file-text-o"></i></div>
            </div>

            <div class="row">
                <ul class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <li><a href="#">Admission essay</a></li>
                    <li><a href="#">Annotated bibliography</a></li>
                    <li><a href="#">Application letter</a></li>
                    <li><a href="#">Argumentative essay</a></li>
                </ul>
                <ul class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <li><a href="#">Article</a></li>
                    <li><a href="#">Article review</a></li>
                    <li><a href="#">Biography</a></li>
                    <li><a href="#">Book review</a></li>
                </ul>
                <ul class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <li><a href="#">Business plan</a></li>
                    <li><a href="#">Case study</a></li>
                    <li><a href="#">Course work</a></li>
                    <li><a href="#">Cover letter</a></li>
                </ul>
                <ul class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <li><a href="#">Creative writing</a></li>
                    <li><a href="#">Critical thinking</a></li>
                    <li><a href="#">Curriculum vitae</a></li>
                    <li><a href="#">Dissertation</a></li>
                </ul>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <a  href="#" class="view-all pull-right">View all
                        <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>

        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-12 center">
                    <a href="{{url('order')}}" class="btn btn-lg btn-link btn-order"> Order now </a>
                </div>
            </div>
        </div>
    </div>
</section-->
<!-- ====== End Price Section ====== -->



@include('front.contactBloc')



@endsection





@section('scripts')
    <script src="{{asset('js/my.js')}}"></script>



@endsection

