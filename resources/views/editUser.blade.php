@extends('layouts.template')
@section('title', 'Edit User')
@section('page', 'USER')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Edit Users</h3>
        </div>

        <div class="card-body register-card-body">

            <form action="{{ route('editUser') }}" method="post">
                @csrf
                <input type="hidden" name="cid" value="{{ $Info->id }}">
                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label text-md-end">{{ __('Name') }}</label>
                    <div class="col-md-9">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $Info->name }}" required autocomplete="name" autofocus>

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
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $Info->email }}" required autocomplete="email">

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
                        <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ $Info->role }}" required autocomplete="role">

                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="row">
                    <div class="col-8">

                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-info btn-block">Update</button>
                    </div>

                </div>
            </form>
        </div>
    </div><!-- /.card -->

@endsection
