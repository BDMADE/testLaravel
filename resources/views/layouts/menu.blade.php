

<!-- ====== Menu Section ====== -->
<section id="menu">
    <div class="navigation">
        <div id="main-nav" class="navbar navbar-default" role="navigation">
            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="">{{config('app.name')}}</a>
                </div> <!-- end .navbar-header -->

                <div class="navbar-collapse collapse">
                    <ul id="ulnav" class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#top" class="menu_scroll" style="font-size: 16px;">Home</a></li>
                        <!--li><a href="#ourservice" class="menu_scroll">best service</a></li-->
                        <li><a href="#presentation" class="menu_scroll" style="font-size: 16px;">Features</a></li>
                        <li><a href="#download" class="menu_scroll" style="font-size: 16px;">How it works ?</a></li>
                        <li><a href="#ourstats" class="menu_scroll" style="font-size: 16px;">Services</a></li>
                        <li><a href="#sample" class="menu_scroll" style="font-size: 16px;">Samples</a></li>
                        <li><a href="{{url('blog')}}" class="" style="font-size: 16px;">Blogs</a></li>
                        <!--li><a href="#top" class="menu_scroll">Calculate</a></li-->
                        <li><a href="{{url('prices')}}" style="font-size: 16px;">price</a></li>
                    </ul>
                </div><!-- end .navbar-collapse -->

            </div> <!-- end .container -->
        </div> <!-- end #main-nav -->
    </div> <!-- end .navigation -->
</section>
<!-- ====== End Menu Section ====== -->

<!--li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('pays*') ? 'active' : '' }}">
    <a href="{!! route('pays.index') !!}"><i class="fa fa-edit"></i><span>Pays</span></a>
</li>

<li class="{{ Request::is('academiclevels*') ? 'active' : '' }}">
    <a href="{!! route('academiclevels.index') !!}"><i class="fa fa-edit"></i><span>Academiclevels</span></a>
</li>

<li class="{{ Request::is('bonreductions*') ? 'active' : '' }}">
    <a href="{!! route('bonreductions.index') !!}"><i class="fa fa-edit"></i><span>Bonreductions</span></a>
</li>

<li class="{{ Request::is('deadlines*') ? 'active' : '' }}">
    <a href="{!! route('deadlines.index') !!}"><i class="fa fa-edit"></i><span>Deadlines</span></a>
</li>

<li class="{{ Request::is('etats*') ? 'active' : '' }}">
    <a href="{!! route('etats.index') !!}"><i class="fa fa-edit"></i><span>Etats</span></a>
</li>

<li class="{{ Request::is('extratservices*') ? 'active' : '' }}">
    <a href="{!! route('extratservices.index') !!}"><i class="fa fa-edit"></i><span>Extratservices</span></a>
</li>

<li class="{{ Request::is('files*') ? 'active' : '' }}">
    <a href="{!! route('files.index') !!}"><i class="fa fa-edit"></i><span>Files</span></a>
</li>

<li class="{{ Request::is('historiques*') ? 'active' : '' }}">
    <a href="{!! route('historiques.index') !!}"><i class="fa fa-edit"></i><span>Historiques</span></a>
</li>

<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{!! route('orders.index') !!}"><i class="fa fa-edit"></i><span>Orders</span></a>
</li>

<li class="{{ Request::is('pays*') ? 'active' : '' }}">
    <a href="{!! route('pays.index') !!}"><i class="fa fa-edit"></i><span>Pays</span></a>
</li>

<li class="{{ Request::is('referencements*') ? 'active' : '' }}">
    <a href="{!! route('referencements.index') !!}"><i class="fa fa-edit"></i><span>Referencements</span></a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>

<li class="{{ Request::is('roleUsers*') ? 'active' : '' }}">
    <a href="{!! route('roleUsers.index') !!}"><i class="fa fa-edit"></i><span>Role Users</span></a>
</li>

<li class="{{ Request::is('soldes*') ? 'active' : '' }}">
    <a href="{!! route('soldes.index') !!}"><i class="fa fa-edit"></i><span>Soldes</span></a>
</li>

<li class="{{ Request::is('structures*') ? 'active' : '' }}">
    <a href="{!! route('structures.index') !!}"><i class="fa fa-edit"></i><span>Structures</span></a>
</li>

<li class="{{ Request::is('typeformats*') ? 'active' : '' }}">
    <a href="{!! route('typeformats.index') !!}"><i class="fa fa-edit"></i><span>Typeformats</span></a>
</li>

<li class="{{ Request::is('typeofworks*') ? 'active' : '' }}">
    <a href="{!! route('typeofworks.index') !!}"><i class="fa fa-edit"></i><span>Typeofworks</span></a>
</li>

<li class="{{ Request::is('typepapers*') ? 'active' : '' }}">
    <a href="{!! route('typepapers.index') !!}"><i class="fa fa-edit"></i><span>Typepapers</span></a>
</li>

<li class="{{ Request::is('userslevels*') ? 'active' : '' }}">
    <a href="{!! route('userslevels.index') !!}"><i class="fa fa-edit"></i><span>Userslevels</span></a>
</li>

<li class="{{ Request::is('wordpages*') ? 'active' : '' }}">
    <a href="{!! route('wordpages.index') !!}"><i class="fa fa-edit"></i><span>Wordpages</span></a>
</li>

<li class="{{ Request::is('etats*') ? 'active' : '' }}">
    <a href="{!! route('etats.index') !!}"><i class="fa fa-edit"></i><span>Etats</span></a>
</li>

<li class="{{ Request::is('typeofworks*') ? 'active' : '' }}">
    <a href="{!! route('typeofworks.index') !!}"><i class="fa fa-edit"></i><span>Typeofworks</span></a>
</li>

<li class="{{ Request::is('historiques*') ? 'active' : '' }}">
    <a href="{!! route('historiques.index') !!}"><i class="fa fa-edit"></i><span>Historiques</span></a>
</li>

<li class="{{ Request::is('bonreductions*') ? 'active' : '' }}">
    <a href="{!! route('bonreductions.index') !!}"><i class="fa fa-edit"></i><span>Bonreductions</span></a>
</li>

<li class="{{ Request::is('subjects*') ? 'active' : '' }}">
    <a href="{!! route('subjects.index') !!}"><i class="fa fa-edit"></i><span>Subjects</span></a>
</li>

<li class="{{ Request::is('standarddeadlines*') ? 'active' : '' }}">
    <a href="{!! route('standarddeadlines.index') !!}"><i class="fa fa-edit"></i><span>Standarddeadlines</span></a>
</li>

<li class="{{ Request::is('operations*') ? 'active' : '' }}">
    <a href="{!! route('operations.index') !!}"><i class="fa fa-edit"></i><span>Operations</span></a>
</li>

<li class="{{ Request::is('messages*') ? 'active' : '' }}">
    <a href="{!! route('messages.index') !!}"><i class="fa fa-edit"></i><span>Messages</span></a>
</li-->


