
<div class="login-box-body">
    <p class="login-box-msg">Register</p>

    <form method="post" action="{{ url('/register') }}">

        {!! csrf_field() !!}

        <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="email"> name </label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Full Name">

            @if ($errors->has('name'))
                <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email"> Email </label>
            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Email">

            @if ($errors->has('email'))
                <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password"> Password </label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">

            @if ($errors->has('password'))
                <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password_confirmation"> Password confirmation </label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm password">

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
            @endif
        </div>

        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox"> I agree to the <a href="#">terms</a>
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <div class="center login-forget-linck">
        <a href="#" onclick="loginModal2()" class="text-center">I already have a membership</a>

    </div>

</div>
    