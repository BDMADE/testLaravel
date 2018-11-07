@extends('layouts.app')

@section('meta')
    <meta charset="utf-8">
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.9.3/js/dropin.min.js"></script>

@endsection

@section('content')
    <?php
    //die();
    $user = auth()->user();
    ?>
    <div class="container">
        <div class="row">

            <style>
                .small-margin-top{
                    margin-top: 25px;
                }
                .block-paypal-btn{
                    text-align: center;
                    padding: 10px 10px 0 10px;
                    min-height: 60px;
                }
                .block-paypal-btn label{
                    display: block;
                    border-bottom: 1px solid #eee;
                    padding: 10px;
                }
                .block-paypal-btn label input {
                    vertical-align: middle;
                }
                .block-paypal-btn label img {
                    vertical-align: middle;
                    height: 40px;
                }
            </style>


            <br><br><br>



            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  ">
                &nbsp;
            </div>
            <div class="col-xs-8 col-sm-6 col-md-6 col-lg-6 small-margin-top">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Confirm the amount and continue</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{!! route('pay-for-order-post') !!}" method="post" id="pay-form">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <span class="error" id="error_form"></span>
                            </div>
                            <div class="form-group">
                                <label for="amount">Your amount ({!! config('app.currency_sombol') !!})</label>
                                <input type="number" id="amount" class="form-control"
                                       min="{!! $amount !!}"
                                       max="{!! $max_amount !!}"
                                       value="{!! $amount !!}"
                                       name="amount" placeholder="Your amount:" required>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="checkbox icheck">
                                        <label>
                                            <input type="checkbox" id="agree_term_pay" name="agree_term_pay" required> I agree to the
                                            <a href="{!! route('term') !!}" target="_blank">terms</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 block-paypal-btn">

                                    <label>
                                        <input type="radio" name="payment-option" value="paypal" checked>
                                        <img class="img-paypal" src="{!! asset('images/paypal-mark.jpg') !!}" alt="Pay with Paypal">
                                    </label>

                                    <label>
                                        <input type="radio" name="payment-option" value="card">
                                        <img class="img-paypal" src="{!! asset('images/card-mark.png') !!}" alt="Accepting Visa, Mastercard, Discover and American Express">
                                    </label>

                                    <div id="paypal-button-container"></div>
                                    <div id="card-button-container" class="hidden"><button>Continue</button></div>

                                </div>
                            </div>
                            <div id="dropin-container"></div>
                            <div class="form-group">
                                <button type="button" id="submit-button" class="form-control btn btn-success btn-block pull-right">
                                    Pay Now
                                </button>
                            </div>

                        </form>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <!--a href="{!! route('home') !!}" class="btn btn-sm btn-info btn-flat pull-left">Back</a-->
                        <!--a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a-->
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>


            <div class="col-xs-2 col-sm-3 col-md-3 col-lg-3 ">
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
        window.amount = '{{ $amount  }}';

        $('#amount').change(function(event){

            window.amount = $(this).val() * 1;
            var min = $(this).attr('min') * 1;
            var max = $(this).attr('max') * 1;
            console.log('==========================');
            console.log(window.amount);
            if(min > window.amount){
                window.amount = min * 1;
                $(this).val(min * 1);
            }
            if(max < window.amount){
                window.amount = max * 1;
                $(this).val(max * 1);
            }
            console.log(window.amount);



        });

    </script>




    <script>

        function getElements(el) {
            return Array.prototype.slice.call(document.querySelectorAll(el));
        }

        function hideElement(el) {
            document.body.querySelector(el).style.display = 'none';
        }

        function showElement(el) {
            document.body.querySelector(el).style.display = 'block';
        }

        function savePayment(){
            var max_amount = {!! $max_amount !!};

            $.ajax({
                url : '{!! route('send-payment-nonce') !!}',
                type : 'post',
                data : {_token : window.token, amount : window.amount, max_amount : max_amount },
                dataType : 'json',
                beforeSend: function() {
                    $('#apply_discount').removeClass('hidden');
                },
                success : function(result, statut){
                    if(result.statu == "1"){
                        alert('your payment was successfull save !!!');
                        document.location.href = "{!! route('home') !!}";

                    }else{
                        alert('some error occur during the payment !!!');
                        document.location.href = "{!! url('/').'pay-for-order/'!!}" + amount + '/' + max_amount;


                    }
                },

                error : function(resultat, statut, erreur){
                    alert('error');
                    console.log(resultat);
                    console.log(statut);
                    console.log(erreur);
                },

                complete : function(resultat, statut){
                    $('#apply_discount').addClass('hidden');

                }

            });
        }

        // Listen for changes to the radio fields

        getElements('input[name=payment-option]').forEach(function(el) {
            el.addEventListener('change', function(event) {

                // If PayPal is selected, show the PayPal button

                if (event.target.value === 'paypal') {
                    hideElement('#card-button-container');
                    showElement('#paypal-button-container');
                }

                // If Card is selected, show the standard continue button

                if (event.target.value === 'card') {
                    showElement('#card-button-container');
                    hideElement('#paypal-button-container');
                }
            });
        });

        // Hide Non-PayPal button by default

        hideElement('#card-button-container');

        // Render the PayPal button


        paypal.Button.render({

            env: '{!! config('paypal.mode') !!}',

            client: {
                sandbox:    '{!! config('paypal.sandbox.js_secret') !!}',
                production: '{!! config('paypal.live.js_secret') !!}'
            },

            payment: function(data, actions) {
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: { total: ''+window.amount, currency: '{!! config('paypal.currency') !!}' }
                            }
                        ]
                    }
                });
            },

            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    savePayment();
                    //console.log(data);
                });
            }

        }, '#paypal-button-container');








/*
        // Render the PayPal button

        paypal.Button.render({

            // Set your environment

            env: 'sandbox', // sandbox | production

            // Specify the style of the button

            style: {
                layout: 'vertical',  // horizontal | vertical
                size:   'medium',    // medium | large | responsive
                shape:  'rect',      // pill | rect
                color:  'gold'       // gold | blue | silver | black
            },

            // Specify allowed and disallowed funding sources
            //
            // Options:
            // - paypal.FUNDING.CARD
            // - paypal.FUNDING.CREDIT
            // - paypal.FUNDING.ELV

            funding: {
                allowed: [ paypal.FUNDING.CARD, paypal.FUNDING.CREDIT ],
                disallowed: [ ]
            },

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create

            client: {
                sandbox:    '{!! config('paypal.sandbox.secret') !!}',
                production: '<insert production client id>'
            },

            payment: function(data, actions) {
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: { total: '0.01', currency: '{!! config('paypal.currency') !!}' }
                            }
                        ]
                    }
                });
            },

            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    window.alert('Payment Complete!');
                });
            }

        }, '#paypal-button-container');
*/
    </script>



    <script>
        /*
        var button = document.querySelector('#submit-button');

        braintree.dropin.create({
            authorization: '{!! $braintreeToken !!}',
            container: '#dropin-container'
        }, function (createErr, instance) {
            button.addEventListener('click', function (e) {
                if (!$('#agree_term_pay').is(':checked')) {
                    alert('please agree to term before submit !!!');
                    e.preventDefault();
                    return false;
                }
                instance.requestPaymentMethod(function (err, payload) {
                    // Submit payload.nonce to your server
                    var amount = $('#amount').val();
                    var max_amount = {!! $max_amount !!};

                    $.ajax({
                        url : '{!! route('send-payment-nonce') !!}',
                        type : 'post',
                        data : {_token : window.token, nonce : payload.nonce, amount : amount, max_amount : max_amount },
                        dataType : 'json',
                        beforeSend: function() {
                            $('#apply_discount').removeClass('hidden');
                        },
                        success : function(result, statut){
                            if(result.statu == "1"){
                                alert('your payment was successfull save !!!');
                                document.location.href = "{!! route('home') !!}";

                            }else{
                                alert('some error occur during the payment !!!');
                                document.location.href = "{!! url('/').'pay-for-order/'!!}" + amount + '/' + max_amount;


                            }
                        },

                        error : function(resultat, statut, erreur){
                            alert('error');
                            console.log(resultat);
                            console.log(statut);
                            console.log(erreur);
                        },

                        complete : function(resultat, statut){
                            $('#apply_discount').addClass('hidden');

                        }

                    });
                });
            });
        });
        */
    </script>

@endsection

