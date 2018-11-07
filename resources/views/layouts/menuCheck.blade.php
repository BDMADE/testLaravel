
@if(!isset($nomenu))

<li class="treeview {!! !isset($menu)? 'active' : '' !!}">
    <a href="{!! route('home') !!}">
        <i class="fa fa-cubes"></i> <span>Dashboard</span>
    </a>
</li>
<li class="treeview {!! (isset($menu) && $menu == 1)? 'active' : '' !!}">
    <a href="{!! route('my-orders') !!}">
        <i class="fa fa-reorder"></i> <span>My Orders</span>
    </a>
</li>
<li class="treeview {!! (isset($menu) && $menu == 2)? 'active' : '' !!}">
    <a href="{!! route('profile') !!}">
        <i class="fa fa-user"></i> <span>My Profile</span>
    </a>
</li>
<li class="treeview {!! (isset($menu) && $menu == 3)? 'active' : '' !!}">
    <a href="{!! route('my-payments') !!}">
        {!! config('app.currency_sombolHTML') !!} <span>My Payments</span>
    </a>
</li>
<li class="treeview {!! (isset($menu) && $menu == 4)? 'active' : '' !!}">
    <a href="{!! route('my-messages') !!}">
        <i class="fa fa-envelope"></i> <span>Messages</span>
    </a>
</li>
<!--li class="treeview {!! (isset($menu) && $menu == 5)? 'active' : '' !!}">
    <a href="#">
        <i class="fa fa-commenting-o"></i> <span>Reviews</span>
    </a>
</li>
<li class="treeview {!! (isset($menu) && $menu == 6)? 'active' : '' !!}">
    <a href="#">
        <i class="fa fa-phone"></i> <span>Support</span>
    </a>
</li-->

@endif








<!--li class="treeview">
    <a href="#">
        <i class="fa fa-files-o"></i>
        <span>Layout Options</span>
        <span class="pull-right-container">
          <span class="label label-primary pull-right">4</span>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
        <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
        <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
        <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
    </ul>
</li>
<li>
    <a href="pages/widgets.html">
        <i class="fa fa-th"></i> <span>Widgets</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-green">new</small>
        </span>
    </a>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-pie-chart"></i>
        <span>Charts</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
        <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
        <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
        <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
    </ul>
</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-laptop"></i>
        <span>UI Elements</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
        <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
        <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
        <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
        <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
        <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
    </ul>
</li-->