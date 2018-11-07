@extends('layouts.appAdmin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/monstyle.css')}}">
@endsection

@section('content')
    <?php
    //die();
    $user = auth()->user();
    ?>
    <!--form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="7ZAM7NSN8DNFQ">
        <input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
    </form-->
    <div class="container">
        <div class="row">

            <div style="padding-left: 12px;">
                <a href="{!! route('order') !!}" class="btn btn-sm btn-warning">Place New Order for user</a>
            </div>

            @include('users.Admin.globalStat')


            @if(!isset($menu))

                <div class="col-xs-12 margin-top-md general-stats no-padding">
                <div class="col-xs-12 col-sm-6 mini-profile">
                    <div class="col-xs-12 general-bg-block no-padding box-shadow">
                        <div class="col-xs-4 general-bg-block">
                            @if(auth()->check())
                                @if(!is_null(auth()->user()->avatar) && auth()->user()->avatar != "")
                                    <img src="{{asset("images/avatars/".auth()->user()->avatar)}}" class=""/>
                                @else
                                    @if(auth()->user()->sexe != "feminin")
                                        <img src="{{asset("images/avatars/default_male.png")}}" class=""/>
                                    @else
                                        <img src="{{asset("images/avatars/default_female.png")}}" class=""/>
                                    @endif
                                @endif
                            @else
                                <img src="{{asset("images/avatars/default_male.png")}}" class=""/>

                            @endif
                        </div>
                        <div class="col-xs-7 general-bg-block no-padding">
                            <h3>{{auth()->user()->name}}</h3>
                            <small>You are <span class="label label-warning">{{auth()->user()->role->name}}</span></small>
                            <br>
                            <small>Registered : {!! auth()->user()->created_at->format('d M. Y') !!}</small>
                            <br>
                            <span class="email-profile">
                                <i class="fa fa-envelope-o"></i>
                                <span>{!! auth()->user()->email !!}</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="box box-primary general-stats-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Recent messages</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <ul class="products-list product-list-in-box limited-height-msg_box">

                                @foreach($user->messagesAllAdmin() as $msg)
                                    @if(!$msg->user_is_sender)
                                        <li class="item">
                                            <div class="product-img">
                                                <img src="{{asset('images/logo.png')}}" alt="logo">
                                            </div>
                                            <div class="product-info">
                                                <a href="javascript:void(0)" class="product-title">
                                                    {!! config('app.name') !!} ({!! $msg->admin->name !!})
                                                </a>
                                                <span class="pull-right date ">
                                                    {!! date('d M. Y', strtotime($msg->created_at)).' at '.date('h:i A', strtotime($msg->created_at)) !!}
                                                </span>
                                                <span class="product-description">
                                                    {!! $msg->message !!}
                                                </span>
                                            </div>
                                        </li>
                                    @else
                                        <li class="item">
                                            <div class="product-img">
                                                @if(!is_null($msg->user->avatar) && $msg->user->avatar != "")
                                                    <img src="{{asset("images/avatars/".$msg->user->avatar)}}" class=""/>
                                                @else
                                                    @if($msg->user->sexe != "feminin")
                                                        <img src="{{asset("images/avatars/default_male.png")}}" class=""/>
                                                    @else
                                                        <img src="{{asset("images/avatars/default_female.png")}}" class=""/>
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="product-info">
                                                <a href="javascript:void(0)" class="product-title">
                                                    {!! $msg->user->name !!}
                                                </a>
                                                <span class="pull-right date ">
                                                    {!! date('d M. Y', strtotime($msg->created_at)).' at '.date('h:i A', strtotime($msg->created_at)) !!}
                                                </span>
                                                <span class="product-description">
                                                    {!! $msg->message !!}
                                                </span>
                                            </div>
                                        </li>

                                    @endif
                                @endforeach


                            </ul>
                        </div>
                        <!-- /.box-footer -->
                    </div>

                </div>
            </div>

            @endif

            <div class="col-xs-12 general-stats">
                <h3>List of Orders</h3>
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <?php $new_order = new App\Models\Order(); ?>
                        <li class="active"><a href="#bidding" data-toggle="tab">{!! $new_order->getDefaultState() !!}</a></li>
                        <li><a href="#progress" data-toggle="tab">In progress</a></li>
                        <li><a href="#complete" data-toggle="tab">Completed</a></li>
                        <li><a href="#dealine" data-toggle="tab">Dealine</a></li>
                    </ul>
                    <div class="tab-content">

                        <!-- /.tab-pane -->
                        <div class="active tab-pane" id="bidding">
                            <!-- The timeline -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Order NO</th>
                                            <th>Topic</th>
                                            <th>Status</th>
                                            <th>Type of paper</th>
                                            <th>Pages(words)</th>
                                            <th>deadline</th>
                                            <th>Amount</th>
                                            <th>date of order</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $ord)
                                            @if($ord->etat == "BIDDING")
                                                <tr>
                                                    <td><a href="{!! route('see-order', $ord->id) !!}">{!! $ord->ref !!}</a></td>
                                                    <td>{!! $ord->topic !!}</td>
                                                    <td>
                                                        <span class="label label-info"  id="label_etat_{!! $ord->id !!}">{!! $ord->etat() !!}</span>
                                                        <br>
                                                        change to  <i class="fa fa-spinner fa-spin hidden" id="etat_loader_{!! $ord->id !!}"></i>

                                                        <span id="error_etat_{!! $ord->id !!}" class="error"></span>
                                                        <select id="etat_{!! $ord->id !!}"  class="form-control"
                                                                onchange="changeEtatOrder({!! $ord->id !!}, this.value)">
                                                            <option value="{!! $ord->etat !!}">{!! $ord->etat() !!}</option>
                                                            <option value="IN PROGRESS">IN PROGRESS</option>
                                                            <option value="COMPLETED">COMPLETED</option>
                                                        </select>
                                                    </td>
                                                    <td> {!! $ord->typeOfPaper->nom !!} </td>
                                                    <td> {!! $ord->number_of_page !!} x {!! $ord->wordPage->nb_word !!}</td>
                                                    <td> {!! $ord->deadline->deadline->nom !!} </td>
                                                    <td>
                                                        {!! config('app.currency_sombolHTML') !!}  {!! number_format((float)$ord->montant, 2, '.', '') !!}
                                                        <br>
                                                        @if($ord->is_premium)
                                                            <span class="label label-warning " title="{!! config('app.premium_service_admin') !!}">Premium</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {!! $ord->created_at->format('d M. Y') !!} at {!! $ord->created_at->format('H:i A') !!}
                                                    </td>
                                                    <td>
                                                        <a href="{!! route('Messages', [$ord->user->id]) !!}" class='btn btn-info btn-xs'>
                                                            <i class="fa fa-envelope-o"></i>
                                                        </a>

                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.tab-pane -->

                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="progress">
                            <!-- The timeline -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Order NO</th>
                                            <th>Topic</th>
                                            <th>Status</th>
                                            <th>Type of paper</th>
                                            <th>Pages(words)</th>
                                            <th>deadline</th>
                                            <th>Amount</th>
                                            <th>date of order</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $ord)
                                            @if($ord->etat == "IN PROGRESS")
                                                <tr>
                                                    <td><a href="{!! route('see-order', $ord->id) !!}">{!! $ord->ref !!}</a></td>
                                                    <td>{!! $ord->topic !!}</td>
                                                    <td>
                                                        <span class="label label-success"  id="label_etat_{!! $ord->id !!}">{!! $ord->etat() !!}</span>
                                                        <br>
                                                        change to  <i class="fa fa-spinner fa-spin hidden" id="etat_loader_{!! $ord->id !!}"></i>

                                                        <span id="error_etat_{!! $ord->id !!}" class="error"></span>
                                                        <select id="etat_{!! $ord->id !!}"  class="form-control"
                                                                onchange="changeEtatOrder({!! $ord->id !!}, this.value)">
                                                            <option value="{!! $ord->etat !!}">{!! $ord->etat !!}</option>
                                                            <option value="BIDDING">{!! $ord->getDefaultState() !!}</option>
                                                            <option value="COMPLETED">COMPLETED</option>
                                                        </select>

                                                    </td>
                                                    <td> {!! $ord->typeOfPaper->nom !!} </td>
                                                    <td> {!! $ord->number_of_page !!} x {!! $ord->wordPage->nb_word !!}</td>
                                                    <td> {!! $ord->deadline->deadline->nom !!} </td>
                                                    <td>
                                                        {!! config('app.currency_sombolHTML') !!}  {!! number_format((float)$ord->montant, 2, '.', '') !!}
                                                        <br>
                                                        @if($ord->is_premium)
                                                            <span class="label label-warning " title="{!! config('app.premium_service_admin') !!}">Premium</span>
                                                        @endif
                                                    </td>
                                                     <td>
                                                        {!! $ord->created_at->format('d M. Y') !!} at {!! $ord->created_at->format('H:i A') !!}
                                                    </td>
                                                    <td>
                                                        <a href="{!! route('Messages', [$ord->user->id]) !!}" class='btn btn-info btn-xs'>
                                                            <i class="fa fa-envelope-o"></i>
                                                        </a>

                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.tab-pane -->


                        <div class="tab-pane" id="complete">
                            <!-- Post -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Order NO</th>
                                            <th>Topic</th>
                                            <th>Status</th>
                                            <th>Type of paper</th>
                                            <th>Pages(words)</th>
                                            <th>deadline</th>
                                            <th>Amount</th>
                                            <th>date of order</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $ord)
                                            @if($ord->etat == "COMPLETED")
                                                <tr>
                                                    <td><a href="{!! route('see-order', $ord->id) !!}">{!! $ord->ref !!}</a></td>
                                                    <td>{!! $ord->topic !!}</td>
                                                    <td>
                                                        <span class="label label-danger"  id="label_etat_{!! $ord->id !!}">{!! $ord->etat !!}</span>
                                                        <br>
                                                        change to  <i class="fa fa-spinner fa-spin hidden" id="etat_loader_{!! $ord->id !!}"></i>

                                                        <span id="error_etat_{!! $ord->id !!}" class="error"></span>
                                                        <select id="etat_{!! $ord->id !!}"  class="form-control"
                                                                onchange="changeEtatOrder({!! $ord->id !!}, this.value)">
                                                            <option value="{!! $ord->etat !!}">{!! $ord->etat !!}</option>
                                                            <option value="BIDDING">{!! $ord->getDefaultState() !!}</option>
                                                            <option value="IN PROGRESS">IN PROGRESS</option>
                                                        </select>

                                                    </td>
                                                    <td> {!! $ord->typeOfPaper->nom !!} </td>
                                                    <td> {!! $ord->number_of_page !!} x {!! $ord->wordPage->nb_word !!}</td>
                                                    <td> {!! $ord->deadline->deadline->nom !!} </td>
                                                    <td>
                                                        {!! config('app.currency_sombolHTML') !!}  {!! number_format((float)$ord->montant, 2, '.', '') !!}
                                                        <br>
                                                        @if($ord->is_premium)
                                                            <span class="label label-warning " title="{!! config('app.premium_service_admin') !!}">Premium</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {!! $ord->created_at->format('d M. Y') !!} at {!! $ord->created_at->format('H:i A') !!}
                                                    </td>
                                                    <td>
                                                        <a href="{!! route('Messages', [$ord->user->id]) !!}" class='btn btn-info btn-xs'>
                                                            <i class="fa fa-envelope-o"></i>
                                                        </a>

                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>

                            <!-- /.post -->
                        </div>
                        <!-- /.tab-pane -->
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="dealine">
                            <!-- The timeline -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Order NO</th>
                                            <th>Topic</th>
                                            <th>Status</th>
                                            <th>Type of paper</th>
                                            <th>Pages(words)</th>
                                            <th>Amount</th>
                                            <th>deadline</th>
                                            <th>date of order</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders_sort as $ord)
                                            <tr>
                                                <td><a href="{!! route('see-order', $ord->id) !!}">{!! $ord->ref !!}</a></td>
                                                <td>{!! $ord->topic !!}</td>
                                                <td>@if($ord->etat == "BIDDING")
                                                        <span id="label_etat_{!! $ord->id !!}" class="label label-info">{!! $ord->etat() !!}</span>
                                                    @elseif($ord->etat == "IN PROGRESS")
                                                        <span id="label_etat_{!! $ord->id !!}" class="label label-success">{!! $ord->etat() !!}</span>
                                                    @elseif($ord->etat == "COMPLETED")
                                                        <span id="label_etat_{!! $ord->id !!}" class="label label-danger ">{!! $ord->etat() !!}</span>

                                                    @endif
                                                    <br>
                                                    change to  <i class="fa fa-spinner fa-spin hidden" id="etat_loader_{!! $ord->id !!}"></i>

                                                    <span id="error_etat_{!! $ord->id !!}" class="error"></span>
                                                    <select id="etat_{!! $ord->id !!}"  class="form-control"
                                                            onchange="changeEtatOrder({!! $ord->id !!}, this.value)">
                                                        <option value="{!! $ord->etat !!}">{!! $ord->etat() !!}</option>
                                                        <option value="BIDDING">{!! $ord->getDefaultState() !!}</option>
                                                        <option value="IN PROGRESS">IN PROGRESS</option>
                                                        <option value="COMPLETED">COMPLETED</option>
                                                    </select>
                                                </td>
                                                <td> {!! $ord->typeOfPaper->nom !!} </td>
                                                <td> {!! $ord->number_of_page !!} x {!! $ord->wordPage->nb_word !!}</td>
                                                <td>
                                                    {!! config('app.currency_sombolHTML') !!}  {!! number_format((float)$ord->montant, 2, '.', '') !!}
                                                    <br>
                                                    @if($ord->is_premium)
                                                        <span class="label label-warning " title="{!! config('app.premium_service_admin') !!}">Premium</span>
                                                    @endif
                                                </td>
                                                <td> {!! $ord->deadline->deadline->nom !!} </td>
                                                <td>
                                                    {!! $ord->created_at->format('d M. Y') !!} at {!! $ord->created_at->format('H:i A') !!}
                                                </td>
                                                <td>
                                                    <a href="{!! route('Messages', [$ord->user->id]) !!}" class='btn btn-info btn-xs'>
                                                        <i class="fa fa-envelope-o"></i>
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.tab-pane -->

                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>




        </div>
    </div>

@endsection




@section('scripts')
    <script src="{{asset('js/my.js')}}"></script>

    <script>

        window.token = '{!! csrf_token() !!}';
        window.base_url = '{!! url('/') !!}';
        window.logo = '{{asset('images/logo.png')}}';


    </script>


@endsection

