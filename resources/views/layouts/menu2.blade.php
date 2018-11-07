

<!-- ====== Menu Section ====== -->
<section id="menu">
    <div class="navigation">
        <div id="main-nav" class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--a class="navbar-brand" href="">{{config('app.name')}}</a-->
                    <a class="navbar-brand" href=""><img class="" src="{{asset('images/logo1.png')}}" alt="{{config('app.name')}}"
                                style="max-width: 240px;"></a>
                </div> <!-- end .navbar-header -->

                <div class="navbar-collapse collapse">
                    <ul id="ulnav" class="nav navbar-nav navbar-right">
                        <li><a href="{{url('/')}}" style="font-size: 16px;">Home</a></li>
                        <li><a href="{{url('prices')}}" style="font-size: 16px;">Prices</a></li>
                        <!--li><a href="{{url('/')}}#ourservice" class="menu_scroll">best service</a></li-->
                        <li><a href="{{url('/')}}#presentation" class="menu_scroll" style="font-size: 16px;">Features</a></li>
                        <li><a href="{{url('/')}}#download" class="menu_scroll" style="font-size: 16px;">How it works ?</a></li>
                        <li><a href="{{url('/')}}#ourstats" class="menu_scroll" style="font-size: 16px;">Services</a></li>
                        <li><a href="{{url('/')}}#contact" class="menu_scroll" style="font-size: 16px;">Samples</a></li>
                        <li><a href="{{url('blog')}}" class="" style="font-size: 16px;">Blogs</a></li>
                        <li><a href="{{url('/')}}" style="font-size: 16px;">Calculate</a></li>
                    </ul>
                </div><!-- end .navbar-collapse -->

            </div> <!-- end .container -->
        </div> <!-- end #main-nav -->
    </div> <!-- end .navigation -->
</section>
<!-- ====== End Menu Section ====== -->

