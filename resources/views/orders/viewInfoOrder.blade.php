@extends('layouts.template')

@section('css')
    <link rel="stylesheet" href="{{asset('css/monstyle.css')}}">
    <style>
        .line-view{
            padding: 10px 15px;
            border-bottom: 1px solid #eaeaea;
        }
        .mt-3{
            margin-top: 3em;
        }
    </style>
@endsection


@section('menu')
    @include('layouts.menu2')
@endsection

@section('content')
    <?php
    //die();
    $user = auth()->user();
    ?>
    <div class="container">
        <div class="row">



            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2  ">
                &nbsp;
            </div>


            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 small-margin-top">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Order detail</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


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
                        <div class="col-xs-12 line-view mb-3">
                            <div class="col-xs-12 col-sm-4">
                                Total amount for order
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                {!! config('app.currency_sombolHTML') !!}
                                {!! number_format((float)$order->montant, 2, '.', '') !!}
                            </div>
                        </div>

                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    @if(auth()->user()->role->slug != 'superadmin' && auth()->user()->role->slug != 'admin')
                        <div class="box-footer clearfix ">
                            <?php $per = ($order->montant * $struc->activation_order_price) / 100; $amount_max = $order->montant; ?>
                            <a href="{!! route('pay-for-order', [$per, $amount_max] ) !!}" class="btn btn-md btn-warning pull-right">Continue and order</a>
                        </div>
                    @else
                        <!-- /.box-body -->
                        <div class="box-footer clearfix mt-3">
                            <a href="{!! route('home') !!}" class="btn btn-md btn-warning pull-right">Save and Continue</a>
                        </div>
                    @endif
                    <!-- /.box-footer -->
                    <br><br><br>
                </div>
            </div>



            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2  ">
                &nbsp;
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

