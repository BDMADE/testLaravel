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



            <div class="col-sm-12">

                <div class="col-sm-12">


                    <div class="col-sm-10 offset-md-2">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Manag Term & condition</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            {!! Form::open(['route' => 'save-term', 'method' => 'post']) !!}
                                    <!-- /.box-header -->
                            <div class="box-body" style="">

                                <div class="col-sm-12 form-group">
                                    <textarea name="term" id="term" cols="30" rows="20" class="form-control" required
                                            >{!! ((!is_null($terms) && count($terms) > 0) ? $terms[0]->content : '') !!}</textarea>
                                    <p class="error text-center alert alert-danger hidden"></p>
                                </div>



                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix" style="">
                                <table class="table no-margin">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <button type="submit" title="Save" class="btn btn-info pull-right">
                                                <i class="fa fa-edit"></i> Save term & condition
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
    <script src="https://cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>

    <script>

        window.token = '{!! csrf_token() !!}';
        window.base_url = '{!! url('/') !!}';
        window.logo = '{{asset('images/logo.png')}}';
        //window.geturl = '{{route('get-last-message')}}';


    </script>

    <script>
        $(function () {
            CKEDITOR.editorConfig = function( config ) {
                config.toolbarGroups = [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    '/',
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    '/',
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ];
            };
            // instance, using default configuration.
            CKEDITOR.replace('term');
        })
    </script>

@endsection

