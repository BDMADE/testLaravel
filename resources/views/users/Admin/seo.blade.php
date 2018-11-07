@extends('layouts.appAdmin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/monstyle.css')}}">
@endsection

@section('content')
    <?php
    //die();
        $user = auth()->user();
        $truct = count($structure) > 0 ? $structure[0] : null;
    ?>
    <div class="container">
        <div class="row">

            <br><br>



            <div class="col-sm-11">

                <div class="col-sm-12">

                    <div class="col-sm-1">&nbsp;</div>

                    <div class="col-sm-9 offset-md-2">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Manag Type of papers</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            {!! Form::open(['route' => 'seo-setting', 'method' => 'post']) !!}
                            <!-- /.box-header -->
                            <div class="box-body" style="">
                                <input id="id" name="id" type="hidden" value="{!! (is_null($truct) ? '' : $truct->id) !!}">

                                <div class="col-sm-12 form-group">
                                    <label for="seo_description" class="col-sm-3 control-label">Description SEO</label>
                                    <div class="col-sm-9">
                                        <textarea name="seo_description" id="seo_description" cols="30" rows="5" class="form-control" required
                                                >{!! (is_null($truct) ? '' : $truct->seo_description) !!}</textarea>
                                        <p class="error text-center alert alert-danger hidden"></p>
                                    </div>
                                </div>
                                <br><br>
                                <div class="col-sm-12 form-group">
                                    <label for="seo_tag" class="col-sm-3 control-label">key words SEO (separat with ",")</label>
                                    <div class="col-sm-9">
                                        <textarea name="seo_tag" id="seo_tag" cols="30" rows="3" class="form-control" required
                                                >{!! (is_null($truct) ? '' : $truct->seo_tag) !!}</textarea>
                                        <p class="error text-center alert alert-danger hidden"></p>
                                    </div>
                                </div>


                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix" style="">
                                <table class="table no-margin">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <button type="submit" title="Save" class="btn btn-info pull-right">
                                                <i class="fa fa-edit"></i> Save
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            {!! Form::close() !!}
                            <!-- /.box-footer -->
                        </div>
                    </div>



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

