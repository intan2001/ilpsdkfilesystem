@extends('layouts.template')
@section('title', 'User')
@section('page', 'USER')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">New Users</h3>
        </div>

        <div class="card-body register-card-body">

            <form action="{{ route('addUser') }}" method="post">
            @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label text-md-end">{{ __('Name') }}</label>
                    <div class="col-md-9">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-3 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>
                    <div class="col-md-9">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="role" class="col-md-3 col-form-label text-md-end">{{ __('Role') }}</label>
                    <div class="col-md-9">
                        <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role">

                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-3 col-form-label text-md-end">{{ __('Password') }}</label>
                    <div class="col-md-9">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-3 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                    <div class="col-md-9">
                        <input id="password-confirm" type="password" class="form-control" name="passwordConfirm" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">

                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-info btn-block">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div><!-- /.card -->

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">List User</h3>

            <form class="form-inline float-right" method="get" action="/searchUser">
                @csrf
                <div class="input-group input-group-sm">
                    <input name="search" class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append"></div>
                </div>
            </form>
        </div><!-- /.card-header -->

        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($users as $key=>$user)
                <tr>
                    <td>{{  ++$key  }}</td>
                    <td>{{  $user->name  }}</td>
                    <td>{{  $user->email  }}</td>
                    <td>{{  $user->role  }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="deleteUser/{{    $user->id   }}" class="btn btn-danger btn-xs">Delete</a>
                            <a href="editUser/{{    $user->id   }}" class="btn btn-primary btn-xs">Edit</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>

    </div><!-- /.card -->

<!-- jQuery -->
<script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
@endsection
