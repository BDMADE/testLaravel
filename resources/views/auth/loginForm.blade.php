<!-- /.login-logo -->
<div class="login-box-body">
    <p class="login-box-msg">Sign in</p>

    <form method="post" action="{{ url('/login') }}">
        {!! csrf_field() !!}

        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email"> Email </label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password"> Password </label>
            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <div class="center login-forget-linck">
        <a href="#" onclick="emailModal()" >I forgot my password</a><br>
        <a href="#" onclick="registerModal2()" class="text-center">Register a new membership</a>

    </div>

</div>
<!-- /.login-box-body -->