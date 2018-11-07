@extends('layouts.app')

@section('content')
    <?php
    //die();
    $user = auth()->user();
    ?>
    <div class="container">
        <div class="row">



            @include('users.globalStat')





            <div class="col-xs-12 general-stats">
                <h3>My Orders</h3>
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <?php $new_order = new App\Models\Order(); ?>
                        <li class="active"><a href="#bidding" data-toggle="tab">{!! $new_order->getDefaultState() !!}</a></li>
                        <li><a href="#progress" data-toggle="tab">In progress</a></li>
                        <li><a href="#complete" data-toggle="tab">Completed</a></li>
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
                                            <!--th>Bids</th>
                                            <th>Writer</th>
                                            <th>Action</th-->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user->orders as $ord)
                                            @if($ord->etat == "BIDDING")
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
                                                        <span class="label label-info">{!! $ord->etat() !!}</span>
                                                    </td>
                                                    <td> {!! $ord->typeOfPaper->nom !!} </td>
                                                    <td> {!! $ord->number_of_page !!} x {!! $ord->wordPage->nb_word !!}</td>
                                                    <td> {!! $ord->deadline->deadline->nom !!} </td>
                                                    <!--td> $ {!! number_format((float)$ord->montant, 2, '.', '') !!} </td>
                                                    <td>{!! (is_null($ord->writer) ? 'not allowed' : $ord->thewriter->name) !!}</td>
                                                    <td>
                                                        @if($ord->montant_payer < $ord->montant )
                                                            <a href="{!! route('pay-for-order', [$ord->id, number_format((float)($ord->montant - $ord->montant_payer), 2, '.', '')]) !!}" class="btn btn-sm btn-success btn-flat pull-left">
                                                                $ Pay now
                                                            </a>
                                                        @endif
                                                    </td-->
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
                                <a href="{!! route('home') !!}" class="btn btn-sm btn-default btn-flat pull-right">Back</a>
                            </div>
                            <!-- /.box-footer -->
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
                                            <!--th>Bids</th>
                                            <th>Writer</th>
                                            <th>Actiion</th-->
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
                                                    <td>{!! (is_null($ord->writer) ? 'not allowed' : $ord->thewriter->name) !!}</td>
                                                    <td>
                                                        @if($ord->montant_payer < $ord->montant )
                                                            <a href="{!! route('pay-for-order', [$ord->id, number_format((float)($ord->montant - $ord->montant_payer), 2, '.', '')]) !!}" class="btn btn-sm btn-success btn-flat pull-left">
                                                                $ Pay now
                                                            </a>
                                                        @endif
                                                    </td-->
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
                                <a href="{!! route('home') !!}" class="btn btn-sm btn-default btn-flat pull-right">Back</a>
                            </div>
                            <!-- /.box-footer -->
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
                                            <!--th>Bids</th>
                                            <th>Writer</th>
                                            <th>Action</th-->
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
                                                    <td>{!! (is_null($ord->writer) ? 'not allowed' : $ord->thewriter->name) !!}</td>
                                                    <td>
                                                        @if($ord->montant_payer < $ord->montant )
                                                            <a href="{!! route('pay-for-order', [$ord->id, number_format((float)($ord->montant - $ord->montant_payer), 2, '.', '')]) !!}" class="btn btn-sm btn-success btn-flat pull-left">
                                                                $ Pay now
                                                            </a>
                                                        @endif
                                                    </td-->
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
                                <a href="{!! route('home') !!}" class="btn btn-sm btn-default btn-flat pull-right">Back</a>
                            </div>
                            <!-- /.post -->
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>



        </div>
    </div>

@endsection
