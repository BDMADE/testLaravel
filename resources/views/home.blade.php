@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/monstyle.css')}}">
@endsection

@section('content')
    <?php
    //die();
    $user = auth()->user();
    ?>
    <div class="container">
        <div class="row">

            <div style="padding-left: 12px;">
                <a href="{!! route('order') !!}" class="btn btn-sm btn-warning">Place New Order</a>
            </div>

            @include('users.globalStat')



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
                            <small>Not rated yet</small>
                            <br>
                            <small>Registered : {!! auth()->user()->created_at->format('d M. Y') !!}</small>
                            <br>
                            <span class="email-profile">
                                <i class="fa fa-envelope"></i>
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

                                @foreach($user->messages as $msg)
                                    @if(!$msg->user_is_sender)
                                        <li class="item">
                                            <div class="product-img">
                                                <img src="{{asset('images/logo.png')}}" alt="logo">
                                            </div>
                                            <div class="product-info">
                                                <a href="{!! route('my-messages') !!}" class="product-title">
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
                                    @endif
                                @endforeach


                            </ul>
                        </div>
                        <!-- /.box-footer -->
                    </div>

                </div>
            </div>

            <div class="col-xs-12 general-stats">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Orders</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
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
                                    <!--th>Bids</th>
                                    <th>Writer</th>
                                    <th>Action</th-->
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                @foreach($user->orders as $ord)
                                    @if($i < 10)
                                        <tr>
                                            <td>
                                                <a href="{!! route('see-order', $ord->id) !!}">
                                                    @if($ord->is_premium)
                                                        <span class="label label-warning " title="{!! config('app.premium_service') !!}">{!! $ord->ref !!}</span>
                                                    @else
                                                        {!! $ord->ref !!}
                                                    @endif
                                                </a>
                                            </td>
                                            <td>{!! $ord->topic !!}</td>
                                            <td>
                                                @if($ord->etat == "BIDDING")
                                                    <span class="label label-info">{!! $ord->etat() !!}</span>
                                                @elseif($ord->etat == "IN PROGRESS")
                                                    <span class="label label-success">{!! $ord->etat() !!}</span>
                                                @elseif($ord->etat == "COMPLETED")
                                                    <span class="label label-danger ">{!! $ord->etat() !!}</span>
                                                    @if($ord->est_noter == false)
                                                        <a href="{!! route('note-order', $ord->id) !!}">Give your note</a>
                                                    @endif
                                                @endif
                                            </td>
                                            <td> {!! $ord->typeOfPaper->nom !!} </td>
                                            <td> {!! $ord->number_of_page !!} x {!! $ord->wordPage->nb_word !!}</td>
                                            <td> {!! $ord->deadline->deadline->nom !!} </td>
                                            <!--td> $ {!! number_format((float)$ord->montant, 2, '.', '') !!} </td>
                                            <td>{!! (is_null($ord->writer) ? 'not allowed' : $ord->thewriter->name) !!}</td-->
                                            <!--td>
                                                @if($ord->montant_payer < $ord->montant )
                                                    <a href="{!! route('pay-for-order', [$ord->id, number_format((float)($ord->montant - $ord->montant_payer), 2, '.', '')]) !!}" class="btn btn-sm btn-success btn-flat pull-left">
                                                        $ Pay now
                                                    </a>
                                                @endif
                                            </td-->
                                        </tr>
                                        <?php $i++; ?>
                                    @endif
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="{!! route('order') !!}" class="btn btn-sm btn-warning btn-flat pull-left">Place New Order</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>




            <!--div class="col-xs-12 general-stats">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pending Payment</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>S. NO</th>
                                    <th>Amount Requested</th>
                                    <th>Date</th>
                                    <th>Comments</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->orders as $ord)
                                    @if(($ord->montant_payer < $ord->montant ))
                                        <tr>
                                            <td><a href="{!! route('see-order', $ord->id) !!}">{!! $ord->ref !!}</a></td>
                                            <td>
                                                <!--a href="{!! route('pay-for-order', [$ord->id, number_format((float)($ord->montant - $ord->montant_payer), 2, '.', '')]) !!}" class="btn btn-sm btn-success btn-flat pull-left">
                                                    Pay now
                                                </a>
                                                &nbsp;&nbsp;&nbsp;
                                                $ {!! number_format((float)($ord->montant - $ord->montant_payer), 2, '.', '') !!}
                                            </td>
                                            <td>{!! date_format($ord->created_at, 'Y-m-d') !!}</td>
                                            <td>
                                                you have not all pay for this order
                                            </td>

                                        </tr>
                                        <?php $i++; ?>
                                    @endif
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <a href="{!! route('order') !!}" class="btn btn-sm btn-warning btn-flat pull-left">Place New Order</a>
                    </div>
                </div>
            </div-->





            <div class="col-xs-12 general-stats">
                <h3>Orders</h3>
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Completed</a></li>
                        <li><a href="#timeline" data-toggle="tab">In progress</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
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
                                            <!--th>Bids</th>
                                            <th>Writer</th-->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user->orders as $ord)
                                            @if($ord->etat == "COMPLETED")
                                                <tr>
                                                    <td>
                                                        <a href="{!! route('see-order', $ord->id) !!}">
                                                            @if($ord->is_premium)
                                                                <span class="label label-warning " title="{!! config('app.premium_service') !!}">{!! $ord->ref !!}</span>
                                                            @else
                                                                {!! $ord->ref !!}
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td>{!! $ord->topic !!}</td>
                                                    <td>
                                                        <span class="label label-danger">{!! $ord->etat() !!}</span>
                                                    </td>
                                                    <td> {!! $ord->typeOfPaper->nom !!} </td>
                                                    <td> {!! $ord->number_of_page !!} x {!! $ord->wordPage->nb_word !!}</td>
                                                    <td> {!! $ord->deadline->deadline->nom !!} </td>
                                                    <!--td> $ {!! number_format((float)$ord->montant, 2, '.', '') !!} </td>
                                                    <td>{!! (is_null($ord->writer) ? 'not allowed' : $ord->thewriter->name) !!}</td-->
                                                </tr>
                                            @endif
                                        @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix">
                                <a href="{!! route('order') !!}" class="btn btn-sm btn-warning btn-flat pull-left">Place New Order</a>
                            </div>
                            <!-- /.post -->
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
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
                                            <!--th>Bids</th>
                                            <th>Writer</th-->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user->orders as $ord)
                                            @if($ord->etat == "IN PROGRESS")
                                                <tr>
                                                    <td>
                                                        <a href="{!! route('see-order', $ord->id) !!}">
                                                            @if($ord->is_premium)
                                                                <span class="label label-warning " title="{!! config('app.premium_service') !!}">{!! $ord->ref !!}</span>
                                                            @else
                                                                {!! $ord->ref !!}
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td>{!! $ord->topic !!}</td>
                                                    <td>
                                                        <span class="label label-success">{!! $ord->etat() !!}</span>
                                                    </td>
                                                    <td> {!! $ord->typeOfPaper->nom !!} </td>
                                                    <td> {!! $ord->number_of_page !!} x {!! $ord->wordPage->nb_word !!}</td>
                                                    <td> {!! $ord->deadline->deadline->nom !!} </td>
                                                    <!--td> $ {!! number_format((float)$ord->montant, 2, '.', '') !!} </td>
                                                    <td>{!! (is_null($ord->writer) ? 'not allowed' : $ord->thewriter->name) !!}</td-->
                                                </tr>
                                            @endif
                                        @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix">
                                <a href="{!! route('order') !!}" class="btn btn-sm btn-warning btn-flat pull-left">Place New Order</a>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!-- /.tab-pane -->

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
        //window.geturl = '{{route('get-last-message')}}';


    </script>


@endsection

