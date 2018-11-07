<!-- ====== Header Section ====== -->
<header id="top">
    <div class="bg-color">
        <div class="top section-padding">
            <div class="container">
                <div class="row">
                    <div class="container">
                        <div class="">
                            <div class="col-md-3 col-sm-12 col-xs-12 text-center ">
                                <div class="uk-navbar-brand" style="height: 100%;">
                                    <a class="logo" href="{!! url('/') !!}" style="height: 100%;">
                                        <img class="" src="{{asset('images/logo1.png')}}" alt="{{config('app.name')}}">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 text-center no-padding hnrmXT">
                                <div>
                                    <p class="uk-navbar-nav">
                                        <span class="">
                                            <i class="fa fa-phone default-text-white"></i>
                                        </span>
                                        <span class="regular default-text-white">
                                            <span class="hidden-xs">Call toll free: &nbsp;</span>
                                            <a href="tel:{!! config('app.contact_phone') !!}" class="regular phone-header">
                                                {!! config('app.contact_phone_text') !!}</a>

                                        </span>

                                    </p><!-- react-empty: 2178 -->
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12 text-center ">
                                <div>
                                    <ul class="regular block-login">
                                        @if(!auth()->check())
                                            <li class="login" onclick="loginModal()">Log in</li>
                                            <li class="signup" onclick="registerModal()">Sign up</li>
                                        @else
                                            <li class="signup">
                                                <a href="{!! route('home') !!}">Home</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm-7 col-md-7">
                        <div class="content">
                            <h1 style="font-size: 4em;"><strong>  </strong>Get Help from Experts </h1>
                            <h2>Struggling with your assignments, essay or Dissertation ?</h2>
                            <p style="text-align: left;">
                                Give your self a peace of mind with our professional writers for any subject, deadline
                                and any complexity. We provide 100% confidential and plagiarism free papers with guaranteed grade.
                                <br>
                                <i class="fa fa-paypal" style="color: #1B9CFC;"></i> Payment after Complete work <br>
                                <i class="fa fa-cc-paypal" style="color: #1B9CFC;"></i>
                                <i class="fa fa-credit-card" style="color: #eb4d4b;"></i> Paypal and All Credit Card Accepted!
                            </p>
                        </div> <!-- end .content -->
                    </div> <!-- end .top > .container> .row> .col-md-7 -->

                    <div class="col-sm-5  col-md-4 col-md-offset-1 col-xs-12 card">
                        @include('front.formPriceCacul')
                    </div>

                </div> <!-- end .top> .container> .row -->
            </div> <!-- end .top> .container -->
        </div> <!-- end .top -->
    </div> <!-- end .bg-color -->
</header>
<!-- ====== End Header Section ====== -->

@include('front.loginModal')

@include('front.registerModal')

@include('front.emailModal')