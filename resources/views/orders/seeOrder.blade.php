@extends('layouts.app')

@section('css')
    <style>
        .line-view{
            padding: 10px 15px;
            border-bottom: 1px solid #eaeaea;
        }
    </style>
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

            @if(auth()->user()->role->slug == 'superadmin' || auth()->user()->role->slug == 'admin')
                @include('users.Admin.globalStat')
            @else
                @include('users.globalStat')
            @endif



            <div class="col-xs-12 general-stats">
                <div class="box box-info">
                    <div class="box-header with-border">
                            <h3 class="box-title">Order {!! $order->ref !!}</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <div class="col-xs-12 line-view">
                            <div class="col-xs-12 col-sm-4">
                                Order NO
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                @if($order->is_premium)
                                    <span class="label label-warning " title="{!! config('app.premium_service') !!}">{!! $order->ref !!}</span>
                                @else
                                    {!! $order->ref !!}
                                @endif
                            </div>
                        </div>
                        @if($order->is_premium)
                            <div class="col-xs-12 line-view">
                                <div class="col-xs-12 col-sm-4">
                                    &nbsp;
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    <span class="label label-warning " title="{!! config('app.premium_service') !!}">Premium Service</span>
                                </div>
                            </div>
                        @endif
                        <div class="col-xs-12 line-view">
                            <div class="col-xs-12 col-sm-4">
                                Subject
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                {!! $order->subject->nom !!}
                            </div>
                        </div>
                        <div class="col-xs-12 line-view">
                            <div class="col-xs-12 col-sm-4">
                                Topic
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                {!! $order->topic !!}
                            </div>
                        </div>
                        <div class="col-xs-12 line-view">
                            <div class="col-xs-12 col-sm-4">
                                Description
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                {!! $order->description !!}
                            </div>
                        </div>
                        <div class="col-xs-12 line-view">
                            <div class="col-xs-12 col-sm-4">
                                Source
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                {!! $order->source !!}
                            </div>
                        </div>
                        <div class="col-xs-12 line-view">
                            <div class="col-xs-12 col-sm-4">
                                Academic Level
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                {!! $order->deadline->academicLevel->nom !!}
                            </div>
                        </div>
                        <div class="col-xs-12 line-view">
                            <div class="col-xs-12 col-sm-4">
                                Type of paper
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                {!! $order->typeOfPaper->nom !!}
                            </div>
                        </div>
                        <div class="col-xs-12 line-view">
                            <div class="col-xs-12 col-sm-4">
                                Pages(words)
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                {!! $order->number_of_page !!} x {!! $order->wordPage->nb_word !!}
                            </div>
                        </div>
                        @if(!is_null($order->extratService()))
                            <div class="col-xs-12 line-view">
                                <div class="col-xs-12 col-sm-4">
                                    Extra services
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    @foreach($order->extratService() as $ex)
                                        <span> {!! $ex->nom !!} </span> <br>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if(!is_null($order->bonreduction_id))
                            <div class="col-xs-12 line-view">
                                <div class="col-xs-12 col-sm-4">
                                    &nbsp;
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    you have used the promotional code <span class="label label-success ">
                                    {!! $order->bonReduction->code !!}</span> in your order
                                </div>
                            </div>
                        @endif
                        <div class="col-xs-12 line-view">
                            <div class="col-xs-12 col-sm-4">
                                deadline (estimate day)
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                {!! $order->deadline->deadline->nom !!} (ready by {!! date('D d M. Y', strtotime($order->created_at. ' + '.$order->deadline->deadline->nb_days.' days')) !!})
                            </div>
                        </div>
                        @if($order->userLevel_id > 1)
                            <div class="col-xs-12 line-view">
                                <div class="col-xs-12 col-sm-4">
                                    Writer priority
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    {!! $order->userLevel->nom !!}
                                </div>
                            </div>
                        @endif
                        @if(count($order->files) > 0)
                            <div class="col-xs-12 line-view">
                                <div class="col-xs-12 col-sm-4">
                                    Material
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    @foreach($order->files as $file)
                                        <a href="{!! asset($file->emplacement.'/'.$file->physical_name ) !!}">
                                            {!! $file->nom !!}
                                        </a> <br>

                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="col-xs-12 line-view">
                            <div class="col-xs-12 col-sm-4">
                                Total amount for order
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                {!! config('app.currency_sombolHTML') !!}
                                {!! number_format((float)$order->montant, 2, '.', '') !!}
                            </div>
                        </div>








                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="{!! route('home') !!}" class="btn btn-sm btn-info btn-flat pull-left">Back</a>
                        <!--a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a-->
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>





        </div>
    </div>

@endsection
