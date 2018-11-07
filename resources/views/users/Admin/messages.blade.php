@extends('layouts.appAdmin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/monstyle.css')}}">
@endsection

@section('content')
    <?php
    //die();
    //$user = auth()->user();
    ?>
    <div class="container">
        <div class="row">

            <div style="padding-left: 12px;">
                <a href="{!! route('see-bidding-orders') !!}" class="btn btn-sm btn-success">see bidding orders</a>
            </div>



            <div class="col-xs-12 general-stats">


                <div class="col-sm-4" id="bloc-user-list">
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-green">
                            <!-- /.widget-user-image -->
                            <h3 class="">Customers</h3>
                        </div>
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                @foreach($users as $usr)
                                    @if($usr->isClient() )
                                        <li onclick="chargerConversation({!! $usr->id !!})">
                                            <a href="javasript:void(0)">
                                                {!! !is_null($usr->name) ? $usr->name : $usr->email !!}
                                                <span class="pull-right badge {!! count($usr->messagesNotRead()) > 0 ? 'bg-red' : 'bg-aqua' !!} "
                                                      id="nb-not-read-{!! $usr->id !!}">
                                                    {!! count($usr->messagesNotRead()) !!}
                                                </span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>



                <div class="col-sm-5" id="bloc-chat-box-admin">
                    <div class="box box-success direct-chat direct-chat-success">
                        <div class="box-header with-border">
                            <h3 class="box-title" id="user-name-chat-title">
                                {!! isset($user) ? (!is_null($user->name) ? $user->name : $user->email) : 'Direct Chat' !!}
                            </h3>

                            <div class="box-tools pull-right">

                                <span data-toggle="tooltip" class="badge bg-green">
                                    {!! count($usr->messagesNotRead()) > 0 ? count($usr->messagesNotRead()) : '' !!}
                                </span>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages" id="box-message-admin">
                                <!-- Message. Default to the left -->
                                @if(isset($user))
                                    <?php
                                    $avatar = '';
                                    if(!is_null($user->avatar) && $user->avatar != "")
                                        $avatar = asset("images/avatars/".$user->avatar);
                                    else
                                        if(auth()->user()->sexe != "feminin")
                                            $avatar = asset("images/avatars/default_male.png");
                                        else
                                            $avatar = asset("images/avatars/default_female.png");

                                        //dd($user->id);
                                    ?>

                                    @foreach($user->messages as $msg)
                                        <?php $last_id = $msg->id; ?>
                                        @if($msg->user_is_sender)
                                            <div class="direct-chat-msg">
                                                <div class="direct-chat-info clearfix">
                                                    <span class="direct-chat-name pull-left">{!! (!is_null($user->name) ? $user->name : $user->email) !!}</span>
                                                    <span class="direct-chat-timestamp pull-right">
                                                        {!! $msg->created_at->format('d M Y') !!} at {!! $msg->created_at->format('H:i A') !!}
                                                    </span>
                                                </div>
                                                <!-- /.direct-chat-info -->
                                                <img class="direct-chat-img" src="{!! $avatar !!}" alt=""><!-- /.direct-chat-img -->
                                                <div class="direct-chat-text">
                                                    {!! $msg->message !!}
                                                </div>
                                                <!-- /.direct-chat-text -->
                                            </div>
                                        @else
                                            <div class="direct-chat-msg right">
                                                <div class="direct-chat-info clearfix">
                                                    <span class="direct-chat-name pull-right">{!! config('app.name') !!} ({!! $msg->admin->name !!})</span>
                                                    <span class="direct-chat-timestamp pull-left">
                                                        {!! $msg->created_at->format('d M Y') !!} at {!! $msg->created_at->format('H:i A') !!}
                                                    </span>
                                                </div>
                                                <!-- /.direct-chat-info -->
                                                <img class="direct-chat-img" src="{{asset('images/logo.png')}}" alt="Message User Image"><!-- /.direct-chat-img -->
                                                <div class="direct-chat-text">
                                                    {!! $msg->message !!}
                                                </div>
                                                <!-- /.direct-chat-text -->
                                            </div>

                                        @endif
                                    @endforeach
                                @endif

                                <div id="ledernier_message"></div>


                            </div>
                            <input type="hidden" id="last-id-msg" name="last-id-msg" value="{!! isset($last_id) ? $last_id : 0 !!}">
                            <input type="hidden" id="user_id" name="user_id" value="{!!  isset($user) ? $user->id : '' !!}">
                            <input type="hidden" id="nom_structure" name="nom_structure" value="{!! config('app.name') !!}">

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <textarea rows="3" name="message" id="message-text" class="form-control" placeholder="Type Message ..." ></textarea>
                                    <span class="input-group-btn">
                                        <button type="button" onclick="envoyerMessageAdmin('{!! route('admin-send-message') !!}', {!! auth()->user()->id !!})" class="btn btn-success btn-flat">
                                            Send <i class="fa fa-spinner fa-spin hidden" id="send_message"></i>
                                        </button>
                                    </span>
                                </div>

                            </form>
                        </div>
                        <!-- /.box-footer-->
                    </div>
                </div>


                <div class="col-sm-3" id="bloc-files-box-admin">
                    <div class="box box-widget widget-user-2">
                        <div class="widget-user-header bg-blue">
                            <h3 class="">sharing files</h3>
                        </div>
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked" id="liste-fichier-partager">
                                @if(isset($user))
                                    @foreach($user->files as $f)
                                        <li>
                                            <a href="{!! asset($f->emplacement.'/'.$f->physical_name) !!}"
                                               class="{!! ($f->iAmSender($user->id) ? '' : 'admin') !!}" target="_blank">
                                                {!! $f->nom !!} <br>
                                                <small class="">
                                                    (By {!! ($f->iAmSender($user->id) ? $user->name : 'admin : '.$f->admin->name) !!})
                                                </small>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="box-footer">
                            <form  id="fichier_form" method="post" action="{!! route('uploadFile') !!}"  ENCTYPE="multipart/form-data">
                                {!! csrf_field() !!}
                                <input type="file" id="fichier" name="fichiers[]" class="hidden" multiple
                                        onchange="afficherFichier(this)">
                                <input type="hidden" id="is_user" name="is_user" value="0">
                                <input type="hidden" id="file_user_id" name="file_user_id" value="{!! (isset($user) ? $user->id : 0) !!}">
                                <input type="hidden" id="file_admin_id" name="file_admin_id" value="{!! auth()->user()->id !!}">
                            </form>
                            <button type="reset" class="btn btn-default" id="open-new-file-window">
                                <i class="fa fa-plus"></i> Add files
                            </button>
                            <button type="reset" class="btn btn-success pull-right hidden" id="send-new-file">
                                <i class="fa fa-send"></i> send <i class="fa fa-spinner fa-spin hidden" id="loader-file-upload"></i>
                            </button>

                            <ul class="nav  nav-stacked" id="new-files"> </ul>
                        </div>
                    </div>
                </div>


            </div>



        </div>
    </div>

@endsection




@section('scripts')
    <script src="{{asset('js/my.js')}}"></script>
    <script src="{{asset('js/standard.js')}}"></script>

    <script>

        window.token = '{!! csrf_token() !!}';
        window.base_url = '{!! url('/') !!}';
        window.logo = '{{asset('images/logo.png')}}';
        //window.geturl = '{{route('get-last-message')}}';

        $(document).ready(function($) {
            window.getLastMessageCmd = setInterval(getLasttedMessage, 5000);

            $('#open-new-file-window').click(function(){
                $('#fichier').trigger('click');
            });

            $('#send-new-file').click(function(){
                $('#fichier_form').submit();

            });

            $('#fichier_form').submit( function( e ) {
                e.preventDefault();
                var form = $('#fichier_form');
                //var formData = new FormData(form);// get the form data
                $.ajax({
                    url: '{!! route('uploadFile') !!}',
                    type: 'POST',
                    data: new FormData( this ),
                    processData: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    beforeSend: function() {
                        $('#loader-file-upload').removeClass('hidden');
                    },
                    success : function(result, statut){
                        if(result.status == "1"){
                            var lehtml = '';
                            for(var i = 0; i < result.files.length; i++){
                                lehtml += '<li>'+
                                        '<a href="'+result.files[i].url+'" class="'+result.files[i].class+'" target="_blank">'+
                                        result.files[i].nom+' <br>'+
                                        '<small class="">'+
                                        '(By '+result.files[i].proprietaire+')'+
                                        '</small>'+
                                        '</a>'+
                                        '</li>';
                            }
                            $('#liste-fichier-partager').append(lehtml);
                            $('#send-new-file').addClass('hidden');
                            $('#new-files').html('');
                            var $el = $('#fichier');
                            $el.wrap('<form>').closest('form').get(0).reset();
                            $el.unwrap();
                            //alert('done');
                        }else{
                            alert('error : can\'t delete that element');
                        }
                    },

                    error : function(resultat, statut, erreur){
                        alert('error');
                        console.log(resultat);
                        console.log(statut);
                        console.log(erreur);
                    },

                    complete : function(resultat, statut){
                        $('#loader-file-upload').addClass('hidden');

                    }
                });
            });


        });



        function afficherFichier(elm){
            var fichier = '';
            $.each( elm.files, function( key, value ) {
                fichier += '<li>'+value.name+'</li>';
            });
            $('#new-files').html(fichier);
            if(elm.files.length > 0){
                $('#send-new-file').removeClass('hidden');
            }else{
                $('#send-new-file').addClass('hidden');
            }
        }
    </script>


@endsection

