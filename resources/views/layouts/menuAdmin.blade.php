

<li class="treeview {!! !isset($menu)? 'active' : '' !!}">
    <a href="{!! route('home') !!}">
        <i class="fa fa-cubes"></i> <span>Dashboard</span>
    </a>
</li>
<li class="treeview {!! (isset($menu) && $menu == 1)? 'active' : '' !!}">
    <a href="{!! route('manag-user') !!}">
        <i class="fa fa-users"></i> <span>Users</span>
    </a>
</li>
<li class="treeview {!! (isset($menu) && $menu == 2)? 'active' : '' !!}">
    <a href="{!! route('Messages', 0) !!}">
        <i class="fa fa-envelope"></i> <span>Messages</span>
    </a>
</li>
<li class="treeview {!! (isset($menu) && $menu == 3)? 'active' : '' !!}">
    <a href="{!! route('manag-order') !!}">
        {!! config('app.currency_sombolHTML') !!} <span>Orders</span>
    </a>
</li>
<li class="treeview {!! (isset($menu) && $menu == 4)? 'active' : '' !!}">
    <a href="{!! route('manag-discount') !!}">
        <i class="fa fa-minus"></i> <span>Discounts</span>
    </a>
</li>
<li class="treeview {!! (isset($menu) && $menu == 5)? 'active' : '' !!}">
    <a href="{!! route('manag-prices') !!}"><i class="fa fa-credit-card"></i> prices</a>
</li>
<li class="treeview {!! (isset($menu) && $menu == 6)? 'active' : '' !!}">
    <a href="{!! route('static-setting') !!}"><i class="fa fa-cogs"></i> Static settings</a>
</li>
<li class="treeview {!! (isset($menu) && $menu == 7)? 'active' : '' !!}">
    <a href="{!! route('seo-setting') !!}"><i class="fa fa-cogs"></i> SEO </a>
</li>
<li class="treeview {!! (isset($menu) && $menu == 8)? 'active' : '' !!}">
    <a href="{!! route('edit-term') !!}"><i class="fa fa-cogs"></i> Manage Terms </a>
</li>
