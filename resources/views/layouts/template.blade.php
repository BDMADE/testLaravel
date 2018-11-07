<!DOCTYPE html>
<html lang="en">
    <?php

        $truct = (isset($structure) && count($structure) > 0) ? $structure[0] : null;
    ?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{!! (is_null($truct) ? '' : $truct->seo_description)  !!}" />
        <meta name="keywords" content="{!! (is_null($truct) ? '' : $truct->seo_tag) !!}">
        <meta name="author" content="{!! config('app.website') !!}">
        <!-- Template Title -->
        <title>{{config('app.name')}}</title>

        <link rel="icon" href="images/favicon.ico" type="image/x-icon"/>

        <!-- Bootstrap 3.2.0 stylesheet -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Font Awesome Icon stylesheet -->
        <link href="{{asset('font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Over the Rainbow' rel='stylesheet'>
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

        <!-- Owl Carousel stylesheet -->
        <link href="{{asset('css/owl.carousel.css')}}" rel="stylesheet">

        <!-- Pretty Photo stylesheet -->
        <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet">

        <!-- Custom stylesheet -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">

        <link href="{{asset('css/color/white.css')}}" rel="stylesheet">


        <!-- Custom Responsive stylesheet -->
        <link href="{{asset('css/responsive.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('css/footer-distributed-with-address-and-phones.css')}}">
        <link href="{{asset('css/customCheckbox.css')}}" rel="stylesheet">
        <link href="{{asset('css/monstyle.css')}}" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        @yield('css')


    </head>
    <body>

    @yield('scriptImportant')

    @yield('header')

    @yield('menu')


    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">

                @yield('content')



            </div>
        </div>
    </div>

    @yield('sample')

    @include('layouts.footer')


            <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/59f3b12c4854b82732ff8432/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->


        <!-- jQuery -->
        <script src="http://code.jquery.com/jquery.min.js"></script>
        <script src="{{asset('js/jquery.js')}}"></script>

        <!-- Modernizr js -->
        <script src="{{asset('js/modernizr-latest.js')}}"></script>

        <!-- Bootstrap 3.2.0 js -->
        <script src="{{asset('js/bootstrap.min.js')}}"></script>

        <!-- Owl Carousel plugin -->
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>

        <!-- ScrollTo js -->
        <script src="{{asset('js/jquery.scrollto.min.js')}}"></script>

        <!-- LocalScroll js -->
        <script src="{{asset('js/jquery.localScroll.min.js')}}"></script>

        <!-- jQuery Parallax plugin -->
        <script src="{{asset('js/jquery.parallax-1.1.3.js')}}"></script>

        <!-- Skrollr js plugin -->
        <script src="{{asset('js/skrollr.min.js')}}"></script>

        <!-- jQuery One Page Nav Plugin -->
        <script src="{{asset('js/jquery.nav.js')}}"></script>

        <!-- jQuery Pretty Photo Plugin -->
        <script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>


        <!-- Custom JS -->
        <script src="{{asset('js/main.js')}}"></script>

        <script src="{{asset('js/standard.js')}}"></script>

        <script src="{{asset('js/calculateForm.js')}}"></script>

        <script>
            jQuery(document).ready(function($) {
                "use strict";

                jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({social_tools:false});
            });
        </script>


        @yield('scripts')

    <script>
        //var academicLevel = [];
        @foreach($academiclevels as $academiclevel)
            window.academicLevel[{!! $academiclevel->id !!}] = [];
            var i = 0;
            @foreach($deadlines as $deadline)
                @if($deadline->academiclevel_id == $academiclevel->id)
                    window.academicLevel[{!! $academiclevel->id !!}][{!! $deadline->standarddeadline_id !!}] = [{!! $deadline->prix_standard !!}, {!! $deadline->prix_premium !!}];

                @endif

            @endforeach
        @endforeach


        //var typeOfWorks = [];
        @foreach($typeofworks as $typeofwork)
            window.typeOfWorks[{!! $typeofwork->id !!}] = [{!! $typeofwork->prix_percent !!} , {!! $typeofwork->prix_fixe !!} , {!! $typeofwork->appliquer_prixfixe ? 'true' : 'false' !!}];

        @endforeach

        //var wordpages = [];
        @foreach($wordpages as $wordpage)
            window.wordpages[{!! $wordpage->id !!}] = [{!! $wordpage->nb_word !!} , {!! $wordpage->percentage_price !!}];

        @endforeach

        @foreach($standarddeadlines as $standarddeadline)
            window.standarddeadline[{!! $standarddeadline->id !!}] = ['{!! $standarddeadline->nom !!}' , {!! $standarddeadline->nb_days !!}];

        @endforeach


        window.percent_to_pay = {!! $structure[0]->activation_order_price !!};
        window.token = '{!! csrf_token() !!}';
        window.base_url = '{!! url('/') !!}';


    </script>

    </body>
</html>