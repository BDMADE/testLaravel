<!-- ====== Contact Section ====== -->
<!--section id="contact" class="contact">
    <div class="footer section-padding">
        <div class="container">
            <div class="header">
                <h1 class=" small-margin-bottom">Contact Us</h1>
                <p>you can contact us by these means.</p>
                <div class="underline small-margin-bottom"><i class="fa fa-phone"></i></div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="col-sm-3 col-xs-12">
                            <img src="{{asset('images/Globe.png')}}" alt="">
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <p class="medium ">location</p>
                            <a href="javascript:void(0)" class="regular">{!! config('app.contact_location') !!}</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 ">
                        <div class="col-sm-3 col-xs-12">
                            <img src="{{asset('images/enveloppes_3.png')}}" alt="">
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <p class="medium ">E-mail</p>
                            <a href="mailto:{!! config('app.contact_email') !!}" class="regular">{!! config('app.contact_email') !!}</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 ">
                        <div class="col-sm-3 col-xs-12">
                            <img src="{{asset('images/Phone2.png')}}" alt="">
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <p class="medium ">Phone number</p>
                            <a href="tel:{!! config('app.contact_phone') !!}" class="regular">{!! config('app.contact_phone_text') !!}</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section-->
<!-- ====== End Contact Section ====== -->



<!-- ====== Contact Section ====== -->
<style>
    .social-icon-footer {
        margin-top: 20px;
    }
    .social-icon-footer img{
        padding: 10px;
    }
    .get-in-touch{
        font-family: 'Over the Rainbow', serif;
        font-size: 2.4em;
        color: #ffffff;
        text-align: left;
        font-weight: bold;
    }
    .we-are-social{
        font-family: 'Over the Rainbow', serif;
        font-size: 2.4em;
        color: #c3c3c3;
        text-align: center;
        font-weight: bold;
    }
    .disclaimer{
        color: #ffffff;
        font-size: 1.3em;
    }
    .quick-access a, .quick-access a:visited{
        color: #ffffff;
        text-decoration: none;
    }
    .quick-access a:hover{
        color: #ffffff;
        text-decoration: underline;
    }
    .white-text{
        color : white;
    }
    .hidden-xs-up{
        display: none;
    }
    @media (max-width:575px){
        .link-footer {
            margin: 0px 0px 10px 0px;
        }
        .hidden-xs-up{
            display: inline-block;
        }
    }
</style>
<footer class="footer-distributed" id="contact">

    <div class="contaner">
        <div class="row">
            <div class="col-xs-12 quick-access">

                <div class="col-sm-2 link-footer"> <a href="#"><i class="fa fa-chevron-right hidden-xs-up"></i> About Us</a> </div>
                <div class="col-sm-3 link-footer"> <a href="#"><i class="fa fa-chevron-right hidden-xs-up"></i> Fair Usage Policy</a> </div>
                <div class="col-sm-2 link-footer"> <a href="#"><i class="fa fa-chevron-right hidden-xs-up"></i> FAQ</a> </div>
                <div class="col-sm-3 link-footer"> <a href="{!! route('term') !!}" target="_blank"><i class="fa fa-chevron-right hidden-xs-up"></i> Term of use</a> </div>
                <div class="col-sm-2 link-footer"> <a href="#"><i class="fa fa-chevron-right hidden-xs-up"></i> Cookies</a> </div>
            </div>
            <div class="col-xs-12">

                <div class="col-sm-4">
                    <h1 class="get-in-touch">Get in touch</h1>
                    <p class="white-text"><i class="fa fa-phone" aria-hidden="true"></i> {!! config('app.contact_phone_text') !!}</p>
                    <p class="white-text"><i class="fa fa-envelope" aria-hidden="true"></i> {!! config('app.contact_email') !!}</p>
                    <p class="white-text"><i class="fab fa-facebook-messenger"></i> {!! config('app.contact_messenger') !!}</p>
                    <div class="col-xs-12">
                        <img src="{!! asset('images/logo1.png') !!}" alt="">
                    </div>
                </div>
                <div class="col-sm-4 social-icon-footer">
                    <h1 class="we-are-social">We are social</h1>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <a href="#"><img src="{!! asset('images/facebook.png') !!}" alt=""></a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#"><img src="{!! asset('images/google.png') !!}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <a href="#"><img src="{!! asset('images/instagram.png') !!}" alt=""></a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#"><img src="{!! asset('images/likedin.png') !!}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <br><br>
                    <img src="{!! asset('images/paypal1.png') !!}" alt="">
                </div>
            </div>
            <div class="col-xs-12">

                <p class="disclaimer white-text">
                    Disclaimer: Excel Essay Writing Service is an on demand writing
                    assistance service and does not violates academic laws, nor promotes
                    academic cheating. The paper supplied are intended to be used as
                    learning/research materials, guidance and assistance purpose. All the
                    work should be used in accordance with the appropriate policies and
                    applicable laws.
                </p>
            </div>
        </div>
    </div>

</footer>
<!-- ====== End Contact Section ====== -->