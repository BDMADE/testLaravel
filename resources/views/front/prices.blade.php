@extends('layouts.template')


@section('menu')
@include('layouts.menu2')
@endsection

@section('content')
        <!-- ====== Features Section ====== -->
<section id="ourservice">
    <div class="features section-padding">
        <div class="container">

            <div class="header">
                <h1>the best value for money</h1>
                <div class="underline">
                    <i class="fa fa-briefcase"></i>
                </div>
            </div> <!-- end .container> .header -->

            <div class="row">
                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr class="light header1">
                                <th class="col-xs-2 text-center"></th>
                                @for($i = 0; $i < count($academiclevel); $i++)
                                    <th colspan="2" class="col-xs-2 text-center titre">{!! $academiclevel[$i][1] !!}</th>
                                @endfor
                            </tr>
                            <tr class="light header2">
                                <th class="col-xs-2 text-center titre1">Delivery Time</th>
                                @for($i = 0; $i < count($academiclevel); $i++)
                                    <th class="col-xs-2 text-center titre">Standard</th>
                                    <th class="col-xs-2 text-center titre">Premium</th>
                                @endfor
                            </tr>
                            </thead>
                            <tbody>
                            @for($i = 0; $i < count($prices); $i++)
                                <tr>
                                    <td class="col-xs-2 text-center light">{!! $deadline[$i] !!}</td>
                                    @for($j = 0; $j < count($prices[$i]); $j++)
                                        <td class="col-xs-2 text-center light">{!! config('app.currency_sombol') !!} {!! $prices[$i][$j][0] !!}</td>
                                    @endfor

                                </tr>
                            @endfor

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <p>
                            * All the price are displayed in {!! config('app.currency') !!}
                            {!! config('app.currency_name') !!} for 1 double-space page, e.i. 275 words.
                        </p>
                    </div> <!-- end .container> .row -->

                </div>
                <div class="col-md-3 card" style="background: url(images/bg3.jpg) 50% 0 no-repeat fixed;">
                    @include('front.formPriceCacul')
                </div> <!-- end .container> .row -->

            </div> <!-- end .container> .row -->


        </div> <!-- end .container -->
    </div> <!-- end .features -->
</section>
<!-- ====== End Features Section ====== -->


@include('front.contactBloc')


@endsection