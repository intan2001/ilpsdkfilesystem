@extends('layouts.template')
@section('title', 'Edit Serahan')
@section('page', 'SERAHAN')

@section('content')
    <!-- Horizontal Form -->
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Edit Serahan</h3>
        </div><!-- /.card-header -->

        @if(Session::get('success'))
            <div class="alert alert-success">
                {{ Session:get('success')}}
            </div>
        @endif

        @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session:get('fail')}}
            </div>
        @endif

        <!-- form start -->
        <form method="POST" action="{{ route('editSerahan') }}">
            @csrf
            <input type="hidden" name="cid" value="{{ $Info->id }}">
            <div class="row">
                <div class="card-body">
                    <div class="form-group">
                        <label class="col-sm-2 col-form-label">Nama Serahan:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Tambahan Serahan" name="serahanNew" value="{{ $Info->nama_serahan }}">
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="card-footer">
                <button type="submit" class="btn btn-danger">Update</button>
            </div>
                <!-- /.card-footer -->
        </form>
    </div><!-- /.card -->

@endsection
