<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FileSystem ILPSDK | Forget Password</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{asset('template')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
        <div class="login-logo">
            <a href="/login"><b>FileSystem</b>ILPSDK</a>
        </div><!-- /.login-logo -->

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">You forgot your password?</p>
                <p class="login-box-msg">Input your email and we will send you reset password link.</p>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')    
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-warning btn-block">Request new password</button>
                    </div><!-- /.col -->
                    </div>
                </form>

                <div class="text-center mt-5 text-lg fs-4">
                    <p class="mt-3 mb-1">Remember your account?
                        <a href="/login" class="font-bold"> Login</a>
                    </p>
                </div>
            </div><!-- /.login-card-body -->
        </div>
        </div><!-- /.login-box -->

        <!-- jQuery -->
        <script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
    </body>
</html>

