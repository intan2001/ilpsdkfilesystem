@extends('layouts.template')
@section('title', 'Record Entry')
@section('page', 'RECORD SYSTEM')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-20">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Record Entry</h3>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('recordEntry') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tarikh Surat:</label>
                                            <input type="date" class="form-control" placeholder="Tarikh Surat" name="tarikhSurat">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tarikh Penerimaan Surat:</label>
                                            <input type="date" class="form-control" placeholder="Tarikh Penerimaan Surat" name="tarikhTerima">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Fail Surat:</label>
                                            <input type="text" class="form-control" placeholder="No. Rujukan Surat" name="rujukanSurat">
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Fail Rujukan:</label>
                                            <input type="text" class="form-control" placeholder="No. Fail Rujukan" name="rujukanFail">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Daripada:</label>
                                            <input type="text" class="form-control" placeholder="Nama Organisasi" name="namaOrganisasi">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Serahan:</label>
                                            <select class="form-control" name="serahan">
                                                <option></option>
                                                @foreach($serahans as $serahan)
                                                    <option value="{{ $serahan->id }}">{{ $serahan->nama_serahan}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Perkara:</label>
                                            <input type="text" class="form-control" rows="3" placeholder="Tajuk Surat" name="tajukSurat"></input>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Cacatan:</label>
                                            <input type="text" class="form-control" rows="3" placeholder="Jika Ada" name="cacatan"></input>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div>
                                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
