@extends('layouts.appAdmin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/monstyle.css')}}">
    <link src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css">
@endsection

@section('content')
    <?php
    //die();
    $user = auth()->user();
    ?>
    <div class="container">

        <div class="row">

            <style>
                .form-group input{
                    margin-bottom: 20px;
                }
                #error-code-exist .error{
                    color : #db0000;
                }
                #error-code-exist .success{
                    color : #3ad22b;
                }
            </style>

            <br><br>
            <!-- /.box-body -->
            <div class="col-sm-10" style="">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">New Coupon</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="">

                        <div class="col-sm-12 form-group">
                            <label style="margin-top: 0px;font-size: 14px;" class="col-sm-4 text-right control-label">
                                Coupon Name : </label>

                            <div class="col-sm-7">
                                <input  type="text" id="name_code" value="" class="form-control" title="Code"
                                        placeholder="Type here">
                            </div>
                        </div>

                        <div class="col-sm-12 form-group">
                            <label style="margin-top: 0px;font-size: 14px;" class="col-sm-4 text-right control-label">
                                Coupon Code : </label>

                            <div class="col-sm-7">
                                <input  type="text" id="new_code" value="" class="form-control" title="Code"
                                        onchange="if_exist_code(this.value)"
                                        placeholder="e.g : COA52148 or live blank for generating default code">
                                <i class="fa fa-spinner fa-spin hidden" id="check-code"></i>
                                <p class="col-sm-12" id="error-code-exist"></p>
                            </div>
                        </div>

                        <div class="col-sm-12 form-group">
                            <label style="margin-top: 0px;font-size: 14px;" class="col-sm-4 text-right control-label">
                                Discount Type : </label>

                            <div class="col-sm-4">
                                <div class="custom-control custom-radio">
                                    <input type="radio" value="0"  checked id="new_radio_bonreductions"
                                           name="new_radio_bonreductions" class="custom-control-input"
                                            onchange="modifierType(this.value)">
                                    <label class="custom-control-label" for="customRadio1">Percentage</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="custom-control custom-radio">
                                    <input type="radio" value="1" id="new_radio_bonreductions1"
                                           name="new_radio_bonreductions" class="custom-control-input"
                                           onchange="modifierType(this.value)">

                                    <label class="custom-control-label" for="customRadio1">Fixed Amount</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 form-group">
                            <label style="margin-top: 0px;font-size: 14px;" class="col-sm-4 text-right control-label">
                                Amount : </label>

                            <div class="col-sm-7">
                                <input type="number" step="0.01" min="0.01" id="amount" value="1" class="form-control" >

                            </div>
                        </div>

                        <div class="col-sm-12 form-group" id="montant-percent">
                            <label style="margin-top: 0px;font-size: 14px;" class="col-sm-4 text-right control-label">
                                Maximum discount :
                            </label>
                            <div class="col-sm-7">
                                <input type="number" step="0.01"  id="max_discount" value="0" class="form-control" >

                            </div>
                        </div>

                        <div class="col-sm-12 form-group" id="montant-fixe">
                            <label style="margin-top: 0px;font-size: 14px;" class="col-sm-4 text-right control-label">
                                Minimum Spent :
                            </label>
                            <div class="col-sm-7">
                                <input type="number" step="0.01"  id="min_spent" value="0" class="form-control" >

                            </div>
                        </div>

                        <div class="col-sm-12 form-group">
                            <label style="margin-top: 0px;font-size: 14px;" class="col-sm-4 text-right control-label">
                                Validity : </label>

                            <div class="col-sm-3">
                                start form
                                <input type="text" class="form-control datepicker" readonly id="new_date_debut" value="{!! date('Y-m-d') !!}"  >

                            </div>
                            <div class="col-sm-3">
                                Ends in
                                <input type="text" class="form-control datepicker" readonly id="new_date_fin" value="{!! date('Y-m-d') !!}" >

                            </div>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label style="margin-top: 0px;font-size: 14px;" class="col-sm-4 text-right control-label">
                                Number of people can use : </label>

                            <div class="col-sm-7">
                                <input  type="number" step="1" min="0" id="new_nb_user_max" value="1" class="form-control pull-right"  title="Number of user that can use this discount">

                            </div>
                        </div>
                        <div class="col-sm-12 form-group">
                            <button type="button" title="Update" class="btn btn-info pull-right" onclick="addBonReduction()">
                                Save and apply <i class="fa fa-spinner fa-spin hidden" id="new_bonreductions_loader"></i>
                            </button>
                        </div>

                    </div>

                </div>



                </div>
            </div>
            <!-- /.box-footer -->


        </div>

        <div class="row">




            <div class="col-md-11">

                <div class="col-md-12">

                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Manag discounts</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body" style="">
                                <div class="table-responsive">
                                    <table class="table no-margin">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Type</th>
                                            <th>Amount</th>
                                            <th>Max discount</th>
                                            <th>minimum spen</th>
                                            <th style="width: 15%">valid from</th>
                                            <th style="width: 15%">valide to</th>
                                            <th>number of customer that can use</th>
                                            <th>number of customer that have use</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="bonreductions_table_body">
                                        @foreach($reductions as $tp)
                                            <tr id="bonreductions_row_{!! $tp->id !!}">
                                                <td>
                                                    {!! $tp->nom !!}
                                                </td>
                                                <td>
                                                    {!! $tp->code !!}
                                                </td>
                                                <td>
                                                    {!! $tp->getType() !!}
                                                </td>
                                                <td>
                                                    {!! $tp->getAmount() !!}
                                                </td>
                                                <td>
                                                    {!! $tp->getMaxDiscount() !!}
                                                </td>
                                                <td>
                                                    {!! $tp->getMinSpent() !!}
                                                </td>
                                                <td>
                                                    {!! $tp->date_debut->format('Y-m-d') !!}

                                                </td>
                                                <td>
                                                    {!! $tp->date_fin->format('Y-m-d') !!}

                                                </td>

                                                <td>
                                                    {!! $tp->nb_user_max !!}
                                                </td>
                                                <td>
                                                    {!! $tp->nb_user_utiliser !!}
                                                </td>

                                                <td>
                                                    <!--button type="button" title="Update" class="btn btn-info btn-xs" onclick="updateBonReduction({!! $tp->id !!})">
                                                        <i class="fa fa-pencil-square-o"></i> <i class="fa fa-spinner fa-spin hidden" id="bonreductions-up_{!! $tp->id !!}"></i>
                                                    </button-->
                                                    <button type="button" title="delete" class="btn btn-danger btn-xs" onclick="deleteBonReduction({!! $tp->id !!})">
                                                        <i class="fa fa-trash"></i> <i class="fa fa-spinner fa-spin hidden" id="bonreductions-del_{!! $tp->id !!}"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>

                        </div>




                </div>


            </div>






        </div>
    </div>

@endsection




@section('scripts')
    <script src="{{asset('js/my.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script>

    <script>

        window.token = '{!! csrf_token() !!}';
        window.base_url = '{!! url('/') !!}';
        window.logo = '{{asset('images/logo.png')}}';
        //window.geturl = '{{route('get-last-message')}}';

        $(document).ready(function(){
            $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
            $('.datepicker').datepicker({format: "yyyy-mm-dd"});

        });

    </script>
    <script>

        function modifierType(valeur){
            if(valeur == 0){
                $('#montant-percent').show(600);
                $('#montant-fixe').hide(500);
            }else{
                $('#montant-percent').hide(500);
                $('#montant-fixe').show(600);
            }
        }
        function if_exist_code(valeur){

            $.ajax({
                url : '{!! route('existe-code') !!}',
                type : 'post',
                data : {_token : window.token, code : valeur},
                dataType : 'json',
                beforeSend: function() {
                    $('#check-code').removeClass('hidden');
                },
                success : function(result, statut){
                    if(result.statu == "0"){
                        $('#error-code-exist').html("<span class='success'>this code is valide !!!</span>");
                    }else{
                        $('#error-code-exist').html("<span class='error'>code all ready existe !!!</span>");
                    }
                },

                error : function(resultat, statut, erreur){
                    alert('error');
                    console.log(resultat);
                    console.log(statut);
                    console.log(erreur);
                },

                complete : function(resultat, statut){
                    $('#check-code').addClass('hidden');

                }

            });
        }
        $(document).ready(function(){
            modifierType(0);
            $( "#new_code" ).keyup(function(e) {
                var inp = String.fromCharCode(e.keyCode);
                var valeur = this.value;
                if (/[a-zA-Z0-9]/.test(inp)){
                    if_exist_code(valeur);
                }
            });
        });
    </script>


@endsection

