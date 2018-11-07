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



            <div class="col-md-11">

                <div class="col-md-12">

                    <div class="col-md-4">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Manag Type of papers</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body bloc-scrllable" style="">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="typepaper_table_body">
                                            @foreach($typepapers as $tp)
                                                <tr id="typepaper_row_{!! $tp->id !!}">
                                                    <td>
                                                        <input type="text" class="form-control" value="{!! $tp->nom !!}" name="{!! $tp->nom !!}" id="typepaper_{!! $tp->id !!}">
                                                    </td>
                                                    <td>
                                                        <button type="button" title="Update" class="btn btn-info btn-xs" onclick="simpleUpdate({!! $tp->id !!}, 'typepaper_', 'loader-tp-up_', 'update-typepaper')">
                                                            <i class="fa fa-pencil-square-o"></i> <i class="fa fa-spinner fa-spin hidden" id="loader-tp-up_{!! $tp->id !!}"></i>
                                                        </button>
                                                        <button type="button" title="delete" class="btn btn-danger btn-xs" onclick="simpleDelete({!! $tp->id !!}, 'typepaper_row_{!! $tp->id !!}', 'delete-typepaper', 'paper type', 'loader-tp-del_')">
                                                            <i class="fa fa-trash-o"></i> <i class="fa fa-spinner fa-spin hidden" id="loader-tp-del_{!! $tp->id !!}"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix" style="">
                                <table class="table no-margin">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" value="" name="new_typepaper" id="new_typepaper">
                                            </td>
                                            <td>
                                                <button type="button" title="Update" class="btn btn-info" onclick="simpleAdd('new_typepaper', 'new_loader-tp', 'add-typepaper', 'typepaper_table_body', 'typepaper_', 'loader-tp-up_', 'loader-tp-del_', 'new_typepaper')">
                                                    + <i class="fa fa-spinner fa-spin hidden" id="new_loader-tp"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                    </div>




                    <div class="col-md-4">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Manag subjects</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body bloc-scrllable" style="">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="subject_table_body">
                                        @foreach($subjects as $tp)
                                            <tr id="subject_row_{!! $tp->id !!}">
                                                <td>
                                                    <input type="text" class="form-control" value="{!! $tp->nom !!}" name="{!! $tp->nom !!}" id="subject_{!! $tp->id !!}">
                                                </td>
                                                <td>
                                                    <button type="button" title="Update" class="btn btn-info btn-xs" onclick="simpleUpdate({!! $tp->id !!}, 'subject_', 'loader-sj-up_', 'update-subject')">
                                                        <i class="fa fa-pencil-square-o"></i> <i class="fa fa-spinner fa-spin hidden" id="loader-sj-up_{!! $tp->id !!}"></i>
                                                    </button>
                                                    <button type="button" title="delete" class="btn btn-danger btn-xs" onclick="simpleDelete({!! $tp->id !!}, 'subject_row_{!! $tp->id !!}', 'delete-subject', 'subject', 'loader-sj-del_')">
                                                        <i class="fa fa-trash-o"></i> <i class="fa fa-spinner fa-spin hidden" id="loader-sj-del_{!! $tp->id !!}"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix" style="">
                                <table class="table no-margin">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" value="" name="new_subject" id="new_subject">
                                        </td>
                                        <td>
                                            <button type="button" title="Update" class="btn btn-info" onclick="simpleAdd('new_subject', 'new_loader-sj', 'add-subject', 'subject_table_body', 'subject_', 'loader-sj-up_', 'loader-sj-del_', 'new_subject')">
                                                + <i class="fa fa-spinner fa-spin hidden" id="new_loader-sj"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                    </div>





                    <div class="col-md-4">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Manag deadlines</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body bloc-scrllable" style="">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th title="this is use for sorting order by deadline">
                                                estimate days <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                            </th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="deadline_table_body">
                                        @foreach($deadlines as $tp)
                                            <tr id="deadline_row_{!! $tp->id !!}">
                                                <td>
                                                    <input type="text" class="form-control" value="{!! $tp->nom !!}" name="deadline_{!! $tp->id !!}" id="deadline_{!! $tp->id !!}">
                                                </td>
                                                <td>
                                                    <input type="number" step="1" class="form-control" value="{!! $tp->nb_days !!}" name="deadline_sd_{!! $tp->id !!}" id="deadline_sd_{!! $tp->id !!}">
                                                </td>
                                                <td>
                                                    <button type="button" title="Update" class="btn btn-info btn-xs" onclick="simpleUpdate({!! $tp->id !!}, 'deadline_', 'loader-dl-up_', 'update-deadline')">
                                                        <i class="fa fa-pencil-square-o"></i> <i class="fa fa-spinner fa-spin hidden" id="loader-dl-up_{!! $tp->id !!}"></i>
                                                    </button>
                                                    <button type="button" title="delete" class="btn btn-danger btn-xs" onclick="simpleDelete({!! $tp->id !!}, 'deadline_row_{!! $tp->id !!}', 'delete-deadline', 'deadline', 'loader-dl-del_')">
                                                        <i class="fa fa-trash-o"></i> <i class="fa fa-spinner fa-spin hidden" id="loader-dl-del_{!! $tp->id !!}"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix" style="">
                                <table class="table no-margin">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" value="" name="new_deadline" id="new_deadline">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" value="" name="new_deadline_sd" id="new_deadline_sd">
                                        </td>
                                        <td>
                                            <button type="button" title="Update" class="btn btn-info" onclick="simpleAdd('new_deadline', 'new_loader-dl', 'add-deadline', 'deadline_table_body', 'deadline_', 'loader-dl-up_', 'loader-dl-del_', 'new_deadline')">
                                                + <i class="fa fa-spinner fa-spin hidden" id="new_loader-dl"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                    </div>

                </div>


                <div class="col-md-12">

                    <div class="col-md-4">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Manag type of formats</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body bloc-scrllable" style="">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="typeformat_table_body">
                                        @foreach($typeformats as $tp)
                                            <tr id="typeformat_row_{!! $tp->id !!}">
                                                <td>
                                                    <input type="text" class="form-control" value="{!! $tp->nom !!}" name="{!! $tp->nom !!}" id="typeformat_{!! $tp->id !!}">
                                                </td>
                                                <td>
                                                    <button type="button" title="Update" class="btn btn-info btn-xs" onclick="simpleUpdate({!! $tp->id !!}, 'typeformat_', 'loader-tf-up_', 'update-typeformat')">
                                                        <i class="fa fa-pencil-square-o"></i> <i class="fa fa-spinner fa-spin hidden" id="loader-tf-up_{!! $tp->id !!}"></i>
                                                    </button>
                                                    <button type="button" title="delete" class="btn btn-danger btn-xs" onclick="simpleDelete({!! $tp->id !!}, 'typeformat_row_{!! $tp->id !!}', 'delete-typeformat', 'type of format', 'loader-tf-del_')">
                                                        <i class="fa fa-trash-o"></i> <i class="fa fa-spinner fa-spin hidden" id="loader-tf-del_{!! $tp->id !!}"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix" style="">
                                <table class="table no-margin">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" value="" name="new_typeformat" id="new_typeformat">
                                        </td>
                                        <td>
                                            <button type="button" title="Update" class="btn btn-info" onclick="simpleAdd('new_typeformat', 'new_loader-tf', 'add-typeformat', 'typeformat_table_body', 'typeformat_', 'loader-tf-up_', 'loader-tf-del_', 'new_typeformat')">
                                                + <i class="fa fa-spinner fa-spin hidden" id="new_loader-tf"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                    </div>




                    <div class="col-md-8">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Manag type of works</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body bloc-scrllable" style="">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>fixe price</th>
                                            <th>fixe percente</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="typeofwork_table_body">
                                        @foreach($typeofworks as $tp)
                                            <tr id="typeofwork_row_{!! $tp->id !!}">
                                                <td>
                                                    <input type="text" class="form-control" value="{!! $tp->nom !!}" name="typeofwork_{!! $tp->id !!}" id="typeofwork_{!! $tp->id !!}">
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="{!! $tp->prix_fixe !!}" name="typeofwork_pf{!! $tp->id !!}" id="typeofwork_pf{!! $tp->id !!}">
                                                        <span class="input-group-addon">
                                                          <input type="radio"  value="1" name="typeofwork_apf{!! $tp->id !!}" {!! $tp->appliquer_prixfixe == true ? 'checked' : '' !!}>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="{!! $tp->prix_percent !!}" name="typeofwork_pp{!! $tp->id !!}" id="typeofwork_pp{!! $tp->id !!}">
                                                        <span class="input-group-addon">
                                                          <input type="radio"  value="0" name="typeofwork_apf{!! $tp->id !!}" {!! $tp->appliquer_prixfixe == false ? 'checked' : '' !!}>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" title="Update" class="btn btn-info btn-xs" onclick="simpleUpdateTree({!! $tp->id !!}, 'typeofwork_', 'loader-tw-up_', 'update-typeofwork', 'typeofwork_row_')">
                                                        <i class="fa fa-pencil-square-o"></i> <i class="fa fa-spinner fa-spin hidden" id="loader-tw-up_{!! $tp->id !!}"></i>
                                                    </button>
                                                    <button type="button" title="delete" class="btn btn-danger btn-xs" onclick="deleteTypeOfWork({!! $tp->id !!})">
                                                        <i class="fa fa-trash-o"></i> <i class="fa fa-spinner fa-spin hidden" id="loader-tw-del_{!! $tp->id !!}"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix" style="">
                                <table class="table no-margin" id="new_typeofwork_row">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" value="" name="new_typeofwork" id="new_typeofwork">
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" min="0" class="form-control" value="0" name="new_typeofwork_pf" id="new_typeofwork_pf">
                                                <span class="input-group-addon">
                                                    <input type="radio"  value="1" name="new_typeofwork_apf" >
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" min="0" class="form-control" value="0" name="new_typeofwork_pp" id="new_typeofwork_pp">
                                                <span class="input-group-addon">
                                                    <input type="radio"  value="0" name="new_typeofwork_apf" checked>
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" title="Update" class="btn btn-info" onclick="AddTypeOfWork()">
                                                + <i class="fa fa-spinner fa-spin hidden" id="new_loader-tw"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                    </div>

                </div>


                <div class="col-md-12">

                    <div class="col-md-6">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Manag words per pages</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body bloc-scrllable" style="">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>nomber of words</th>
                                            <th>percentage price</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="wordpage_table_body">
                                        @foreach($wordpages as $tp)
                                            <tr id="wordpage_row_{!! $tp->id !!}">
                                                <td>
                                                    <input type="text" class="form-control" value="{!! $tp->nom !!}" name="wordpage_{!! $tp->id !!}" id="wordpage_{!! $tp->id !!}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="{!! $tp->nb_word !!}" name="wordpage_nb{!! $tp->id !!}" id="wordpage_nb{!! $tp->id !!}">
                                                </td>
                                                <td title="add {!! $tp->percentage_price !!}% of the stardard price ">
                                                    <input type="text" class="form-control" value="{!! $tp->percentage_price !!}" name="wordpage_pp{!! $tp->id !!}" id="wordpage_pp{!! $tp->id !!}">

                                                </td>
                                                <td>
                                                    <button type="button" title="Update" class="btn btn-info btn-xs" onclick="updateWordPage({!! $tp->id !!})">
                                                        <i class="fa fa-pencil-square-o"></i> <i class="fa fa-spinner fa-spin hidden" id="loader-wp-up_{!! $tp->id !!}"></i>
                                                    </button>
                                                    <button type="button" title="delete" class="btn btn-danger btn-xs" onclick="deleteWordPage({!! $tp->id !!})">
                                                        <i class="fa fa-trash-o"></i> <i class="fa fa-spinner fa-spin hidden" id="loader-wp-del_{!! $tp->id !!}"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix" style="">
                                <table class="table no-margin" id="new_wordpage_row">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" value="" name="new_wordpage" id="new_wordpage">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" value="" name="new_wordpage_nb" id="new_wordpage_nb">
                                        </td>
                                        <td>
                                            <input type="number" min="0" class="form-control" value="0" name="new_wordpage_pp" id="new_wordpage_pp">
                                        </td>
                                        <td>
                                            <button type="button" title="Update" class="btn btn-info" onclick="AddWordPage()">
                                                + <i class="fa fa-spinner fa-spin hidden" id="new_loader-wp"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Manag academic level</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body bloc-scrllable" style="">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="academiclevel_table_body">
                                        @foreach($academiclevels as $tp)
                                            <tr id="academiclevel_row_{!! $tp->id !!}">
                                                <td>
                                                    <input type="text" class="form-control" value="{!! $tp->nom !!}" name="{!! $tp->nom !!}" id="academiclevel_{!! $tp->id !!}">
                                                </td>
                                                <td>
                                                    <button type="button" title="Update" class="btn btn-info btn-xs" onclick="simpleUpdate({!! $tp->id !!}, 'academiclevel_', 'loader-tp-up_', 'update-academiclevel')">
                                                        <i class="fa fa-pencil-square-o"></i> <i class="fa fa-spinner fa-spin hidden" id="loader-al-up_{!! $tp->id !!}"></i>
                                                    </button>
                                                    <button type="button" title="delete" class="btn btn-danger btn-xs" onclick="simpleDelete({!! $tp->id !!}, 'academiclevel_row_{!! $tp->id !!}', 'delete-academiclevel', 'paper type', 'loader-al-del_')">
                                                        <i class="fa fa-trash-o"></i> <i class="fa fa-spinner fa-spin hidden" id="loader-al-del_{!! $tp->id !!}"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer clearfix" style="">
                                <table class="table no-margin">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" value="" name="new_academiclevel" id="new_academiclevel">
                                        </td>
                                        <td>
                                            <button type="button" title="Update" class="btn btn-info" onclick="simpleAdd('new_academiclevel', 'new_loader-tp', 'add-academiclevel', 'academiclevel_table_body', 'academiclevel_', 'loader-al-up_', 'loader-al-del_', 'new_academiclevel')">
                                                + <i class="fa fa-spinner fa-spin hidden" id="new_loader-al"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
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

