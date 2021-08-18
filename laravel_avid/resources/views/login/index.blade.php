@extends('layouts.login')

@section('title', 'Login')

@section('content')
<div class="row w-100 mx-0">
    <div class="col-lg-4 mx-auto">
        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <div class="brand-logo">
                <img src="<?=url('images/logo.png');?>" alt="logo">
            </div>
            <h6 class="font-weight-light">Sign in to continue.</h6>
            @if ($error = $errors->first('credential'))
            <div class="alert alert-danger">
                {{ $error }}
            </div>
            @endif
            <form class="pt-3" method="POST">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="username" placeholder="Username" name="username" autocomplete="off" required="required" autofocus="autofocus">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password" autocomplete="new-password" required="required">
                </div>
                <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
