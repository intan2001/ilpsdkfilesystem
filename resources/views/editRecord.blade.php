@extends('layouts.template')
@section('title', 'Edit Record')
@section('page', 'RECORD SYSTEM')

@section('content')
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Edit Record Entry</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('editRecord') }}">
                @csrf
                <input type="hidden" name="cid" value="{{ $Info->id }}">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tarikh Surat:</label>
                            <input type="date" class="form-control" placeholder="Tarikh Surat" name="tarikhSurat" value="{{ $Info->tarikh_surat }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Tarikh Penerimaan Surat:</label>
                            <input type="date" class="form-control" placeholder="Tarikh Penerimaan Surat" name="tarikhTerima" value="{{ $Info->tarikh_terima }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fail Surat:</label>
                            <input type="text" class="form-control" placeholder="No. Rujukan Surat" name="rujukanSurat" value="{{ $Info->rujukan_surat }}">
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fail Rujukan:</label>
                            <input type="text" class="form-control" placeholder="No. Fail Rujukan" name="rujukanFail" value="{{ $Info->rujukan_fail }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Daripada:</label>
                            <input type="text" class="form-control" placeholder="Nama Organisasi" name="namaOrganisasi" value="{{ $Info->daripada }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Serahan:</label>
                            <select class="form-control" name="serahan">
                                <option></option>
                                @foreach($serahans as $serahan)
                                    <option value="{{ $serahan->id }}">{{ $serahan->nama_serahan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Perkara:</label>
                            <input type="text" class="form-control" rows="3" placeholder="Tajuk Surat" name="tajukSurat" value="{{ $Info->perkara }}"></input>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Cacatan:</label>
                            <input type="text" class="form-control" rows="3" placeholder="Jika Ada" name="cacatan" value="{{ $Info->cacatan }}"></input>
                        </div>
                    </div>
                </div>

                <br>

                <div>
                    <button type="submit" class="btn btn-danger">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
