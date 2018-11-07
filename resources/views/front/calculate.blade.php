@extends('layouts.template')


@section('menu')
@include('layouts.menu2')
@endsection

@section('content')
        <!-- ====== Features Section ====== -->
<section id="ourservice">
    <div class="features section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-xs-12 card">
                    @include('front.formPriceCacul')
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ====== Contact Section ====== -->
<section id="contact" class="contact">
    <div class="footer section-padding">
        <div class="container">
            <div class="header">
                <h1 class=" small-margin-bottom">Contact Us</h1>
                <p>you can contact us by these means.</p>
                <div class="underline small-margin-bottom"><i class="fa fa-phone"></i></div>
            </div> <!-- end .container> .header -->

            <div class="row">
                <div class="col-xs-12">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="col-sm-3 col-xs-12">
                            <img src="{{asset('images/Globe.png')}}" alt="">
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <p class="medium ">location</p>
                            <a href="#" class="regular">over the world</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 ">
                        <div class="col-sm-3 col-xs-12">
                            <img src="{{asset('images/enveloppes_3.png')}}" alt="">
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <p class="medium ">E-mail</p>
                            <a href="mailto:support@bestwriter.com" class="regular">support@bestwriter.com</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 ">
                        <div class="col-sm-3 col-xs-12">
                            <img src="{{asset('images/Phone2.png')}}" alt="">
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <p class="medium ">Phone number</p>
                            <a href="tel:+88000000000" class="regular">+880 0-000-00-00</a>
                        </div>
                    </div>
                </div>
            </div>


        </div> <!-- end .container -->
    </div> <!-- end .footer -->
</section>
<!-- ====== End Contact Section ====== -->



@endsection