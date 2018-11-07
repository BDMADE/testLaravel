@extends('layouts.appAdmin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/monstyle.css')}}">
    <style>
        .form-horizontal .form-group {
            margin-right: 0px;
            margin-left: 0px;
        }
        .form-horizontal .control-label {
            padding-top: 7px;
            margin-bottom: 0;
            text-align: left;
        }
    </style>
@endsection

@section('content')
    <?php
    //die();
    $user = auth()->user();
    ?>
    <div class="container">
        <div class="row">

            <div class="col-xs-10" style="padding-left: 12px;">
                    <a href="{!! route('see-bidding-orders') !!}" class="btn btn-sm btn-success pull-left">
                        see bidding orders
                    </a>
                    @if(auth()->user()->role->slug == 'superadmin')
                    <button type="button" class="btn btn-sm btn-success pull-right"
                            data-toggle="modal" data-target="#myModal_nouveau_user">
                        <i class="fa fa-plus"></i> Add user
                    </button>
                    @endif

            </div>

            @include('users.Admin.globalStat')


            <div class="col-xs-12 general-stats">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Admin User</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>avartar</th>
                                    <th>role</th>
                                    <th>phone</th>
                                    <th>created at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="user_admin">
                                <?php $i = 0; ?>
                                @foreach($user->userAllAdmin() as $usr)
                                    @if($usr->role->slug == 'admin' || $usr->role->slug == 'superadmin' )
                                        <tr id="user_{!! $usr->id !!}">
                                            <td>{!! $usr->name !!}</td>
                                            <td class="avatar">
                                                @if(!is_null($usr->avatar) && $usr->avatar != "")
                                                    <img src="{{asset("images/avatars/".$usr->avatar)}}" class=""/>
                                                @else
                                                    @if($usr->sexe != "feminin")
                                                        <img src="{{asset("images/avatars/default_male.png")}}" class=""/>
                                                    @else
                                                        <img src="{{asset("images/avatars/default_female.png")}}" class=""/>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>

                                                <span class="label label-warning"  id="label_role_{!! $usr->id !!}">{!! $usr->role->name !!}</span>
                                                <br>
                                                change to  <i class="fa fa-spinner fa-spin hidden" id="role_loader_{!! $usr->id !!}"></i>

                                                <span id="error_role_{!! $usr->id !!}" class="error"></span>
                                                <select id="role_{!! $usr->id !!}"  class="form-control"
                                                        onchange="changeRoleUser({!! $usr->id !!}, this.value, '{!! $usr->role->slug !!}')">
                                                    @foreach($roles as $role)
                                                        <option value="{!! $role->id !!}" {!! ($usr->role->id == $role->id)? 'selected' : '' !!}>
                                                            {!! $role->name !!}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                @if(!is_null($usr->pay_id))
                                                    (+{!! $usr->pay->indicatif_tel !!})
                                                @endif
                                                {!! $usr->tel1 !!} {!! !is_null($usr->tel2) ? ' / '.$usr->tel2 : '' !!}
                                            </td>
                                            <td>{!! $usr->created_at->format('d M. Y') !!}</td>
                                            <td>
                                                <a href="{!! route('edit-user', $usr->id) !!}" class='btn btn-info btn-xs'>
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @if(auth()->user()->role->slug == 'superadmin')
                                                <a href="#"
                                                   class='btn btn-danger btn-xs'
                                                    onclick="event.preventDefault(); if(confirm('do you want to delete this user ?')) document.getElementById('delete-user-form-{!! $usr->id !!}').submit();">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <form id="delete-user-form-{!! $usr->id !!}" action="{{ route('delete-user') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="user_id" value="{!! $usr->id !!}">
                                                </form>
                                                @endif

                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>




            <div class="col-xs-12 general-stats">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Customers</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>avartar</th>
                                    <th>phone</th>
                                    <th>role</th>
                                    <th>created at</th>
                                </tr>
                                </thead>
                                <tbody id="user_customers">
                                <?php $i = 0; ?>
                                @foreach($user->userAllAdmin() as $usr)
                                    @if($usr->role->slug != 'admin' && $usr->role->slug != 'superadmin' )
                                        <tr id="user_{!! $usr->id !!}">
                                            <td>{!! $usr->name !!}</td>
                                            <td class="avatar">
                                                @if(!is_null($usr->avatar) && $usr->avatar != "")
                                                    <img src="{{asset("images/avatars/".$usr->avatar)}}" class=""/>
                                                @else
                                                    @if($usr->sexe != "feminin")
                                                        <img src="{{asset("images/avatars/default_male.png")}}" class=""/>
                                                    @else
                                                        <img src="{{asset("images/avatars/default_female.png")}}" class=""/>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>

                                                <span class="label label-warning"  id="label_role_{!! $usr->id !!}">{!! $usr->role->name !!}</span>
                                                <br>
                                                change to  <i class="fa fa-spinner fa-spin hidden" id="role_loader_{!! $usr->id !!}"></i>

                                                <span id="error_role_{!! $usr->id !!}" class="error"></span>
                                                <select id="role_{!! $usr->id !!}"  class="form-control"
                                                        onchange="changeRoleUser({!! $usr->id !!}, this.value, '{!! $usr->role->slug !!}')">
                                                    @foreach($roles as $role)
                                                        <option value="{!! $role->id !!}" {!! ($usr->role->id  == $role->id)? 'selected' : '' !!}>
                                                            {!! $role->name !!}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                @if(!is_null($usr->pay_id))
                                                    (+{!! $usr->pay->indicatif_tel !!})
                                                @endif
                                                {!! $usr->tel1 !!} {!! !is_null($usr->tel2) ? ' / '.$usr->tel2 : '' !!}
                                            </td>
                                            <td>{!! $usr->created_at->format('d M. Y') !!}</td>
                                            <td>
                                                <a href="{!! route('edit-user', $usr->id) !!}" class='btn btn-info btn-xs'>
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endif
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>




        </div>
    </div>




    <div id="myModal_nouveau_user"  class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{!! route('new-user') !!}" class="form-horizontal" method="post" id="new-reservation-form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h2 class="modal-title">
                            New User
                            <i class="fa fa-spinner fa-spin invisible" id="loader-reservation"></i>
                        </h2>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            {!! csrf_field() !!}




                            <div class="col-md-12" id="new-user">
                                <div class="col-md-6 form-group">
                                    <label class="col-md-12  control-label" for="name">Name *</label>
                                    <input type="text" name="name" value=""  class="form-control" required
                                           placeholder="Name *">

                                </div>

                                <div class="col-md-6 form-group">
                                    <label class="col-md-12  control-label" for="email">Email * </label>
                                    <input type="email" name="email" value="" class="form-control" required
                                           placeholder="Email ">

                                </div>

                                <div class="col-md-12 form-group">
                                    <label class="col-md-12  control-label" for="email">Role * </label>
                                    <select id="role_id" name="role_id"  class="form-control">
                                        @foreach($roles as $role)
                                            <option value="{!! $role->id !!}" {!! $role->slug == "superadmin" ? 'selected' : '' !!}>
                                                {!! $role->name !!}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>


                                <div class="col-md-6 form-group">
                                    <label class="col-md-12  control-label" for="password">Password *</label>
                                    <input type="password" name="password" autocomplete="new-password" required
                                           class="form-control" placeholder="Password *">

                                </div>

                                <div class="col-md-6 form-group">
                                    <label class="col-md-12  control-label" for="password_confirmation">confirm password *</label>
                                    <input type="password" name="password_confirmation" autocomplete="new-password" required
                                           class="form-control" placeholder="confirm password *" >

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" >Save</button>
                    </div>
                </form>
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

