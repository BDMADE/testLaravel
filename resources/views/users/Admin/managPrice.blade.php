@extends('layouts.appAdmin')

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

            <br><br>


            <div class="col-md-6">

                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">minimum percent to bye went user make an order</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <td class="text-center light">
                                            <div class="input-group">
                                                <input type="number" step="0.01" min="0" class="form-control" value="{!! $structure->activation_order_price !!}" name="structur_per" id="structure_per">
                                                <span class="input-group-addon">
                                                        %
                                                </span>
                                                <span class="input-group-addon btn btn-info"
                                                      onclick="updateStructure({!! $structure->id !!})">
                                                    <i class="fa fa-pencil-square-o"></i> Save <i class="fa fa-spinner fa-spin hidden" id="loader-structur"></i>
                                                </span>
                                            </div>

                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix" style="">
                        &nbsp;
                    </div>
                    <!-- /.box-footer -->
                </div>



            </div>




            <div class="col-md-11">

                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Manag Prices</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr class="light header1">
                                        <th class="text-center"></th>
                                        @for($i = 0; $i < count($academiclevels); $i++)
                                            <th colspan="2" class="text-center titre">{!! $academiclevels[$i][1] !!}</th>
                                        @endfor
                                    </tr>
                                    <tr class="light header2">
                                        <th class="text-center titre1">Delivery Time</th>
                                        @for($i = 0; $i < count($academiclevels); $i++)
                                            <th class="text-center titre">Standard</th>
                                            <th class="text-center titre">Premium</th>
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i = 0; $i < count($prices); $i++)
                                    <tr>
                                        <td class="text-center light">{!! $deadline[$i] !!}</td>
                                        @for($j = 0; $j < count($prices[$i]); $j++)
                                            <td class="text-center light">
                                                <div class="input-group">
                                                    <input type="number" step="0.01" min="0" class="form-control" value="{!! $prices[$i][$j][0] !!}" name="price_{!! ($j % 2 == 0) ? 'std' : 'pre' !!}_{!! $prices[$i][$j][1] !!}" id="price_{!! ($j % 2 == 0) ? 'std' : 'pre' !!}_{!! $prices[$i][$j][1] !!}">
                                                    <span class="input-group-addon btn btn-info"
                                                            onclick="updatePrice({!! $prices[$i][$j][1] !!}, '{!! ($j % 2 == 0) ? 'std' : 'pre' !!}')">
                                                            <i class="fa fa-pencil-square-o"></i> <i class="fa fa-spinner fa-spin hidden" id="loader-price_{!! ($j % 2 == 0) ? 'std' : 'pre' !!}_{!! $prices[$i][$j][1] !!}"></i>
                                                    </span>
                                                </div>

                                            </td>
                                        @endfor

                                    </tr>
                                    @endfor

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix" style="">
                        &nbsp;
                    </div>
                    <!-- /.box-footer -->
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

