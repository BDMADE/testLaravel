@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/monstyle.css')}}">
@endsection

@section('content')
    <?php
    //die();
    $user = auth()->user();


    $avatar = '';
    if(!is_null(auth()->user()->avatar) && auth()->user()->avatar != "")
        $avatar = asset("images/avatars/".auth()->user()->avatar);
    else
        if(auth()->user()->sexe != "feminin")
            $avatar = asset("images/avatars/default_male.png");
        else
            $avatar = asset("images/avatars/default_female.png");

    ?>

    <div class="container">
        <div class="row">



            @include('users.globalStat')




            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2  ">
                &nbsp;
            </div>


            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 small-margin-top">
                <div class="box box-primary update_profile_box">
                    <form id="step_form" method="post" action="{{route('save-profile')}}" enctype="multipart/form-data" class="form-horizontal" >
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input type="text" value="{!! $user->name !!}" class="form-control" name="name" id="name" placeholder="Name...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">login</label>

                            <div class="col-sm-10">
                                <input type="text" value="{!! $user->login !!}" class="form-control" name="login" id="login" placeholder="login...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                <input type="email" value="{!! $user->email !!}" readonly class="form-control" name="email" id="email" placeholder="Email...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="avartar" class="col-sm-2 control-label">profile image</label>

                            <div class="col-sm-10">
                                <div class="col-sm-4">
                                    <img src="{{$avatar}}" class="" id="img-profile">
                                </div>
                                <div class="col-sm-6">
                                    <input class="" type="file" name="file"  name="avartar" id="avartar"  accept="image/*" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel1" class="col-sm-2 control-label">Phone 1</label>

                            <div class="col-sm-10">
                                <input type="number" value="{!! $user->tel1 !!}" class="form-control" name="tel1" id="tel1" placeholder="phone...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel2" class="col-sm-2 control-label">Phone 2</label>

                            <div class="col-sm-10">
                                <input type="number" value="{!! $user->tel2 !!}" class="form-control" name="tel2" id="tel2" placeholder="another phone...">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
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
        //window.geturl = '{{route('get-last-message')}}';


    </script>


@endsection

