@extends('layouts.template')
@section('title', 'Serahan')
@section('page', 'SERAHAN')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-20">
                    <!-- Horizontal Form -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Serahan</h3>
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
                        <form method="POST" action="{{ route('serahan') }}">
                            @csrf
                            <div class="row">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-form-label">Nama Serahan:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" placeholder="Tambahan Serahan" name="serahanNew">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning float-right">Submit</button>
                            </div>
                                <!-- /.card-footer -->
                        </form>
                    </div><!-- /.card -->

                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">List Serahan</h3>

                            <form class="form-inline float-right" method="get" action="/searchSerahan">
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
                                <th>Serahan</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach ($serahans as $key=>$serahan)
                                    <tr>
                                        <td>{{  ++$key  }}</td>
                                        <td>{{  $serahan->nama_serahan ?? null }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="deleteSerahan/{{    $serahan->id   }}" class="btn btn-danger btn-xs">Delete</a>
                                                <a href="editSerahan/{{    $serahan->id   }}" class="btn btn-primary btn-xs">Edit</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
