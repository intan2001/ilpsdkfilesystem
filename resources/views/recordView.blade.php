@extends('layouts.template')
@section('title', 'Record View')
@section('page', 'RECORD SYSTEM')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-20">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Record View</h3>

                            <form class="form-inline float-right" method="get" action="{{ route('recordView') }}">
                                <div class="input-group input-group-sm">
                                    <input name="search" class="form-control form-control-navbar" type="search"
                                        value="{{ request()->get('search') }}" placeholder="Search" aria-label="Search">
                                    <div class="input-group-append"></div>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tarikh Penerimaan Surat</th>
                                        <th>Perkara</th>
                                        <th>No. Rujukan Fail</th>
                                        <th>No. Rujukan Surat</th>
                                        <th>Tarikh Surat</th>
                                        <th>Daripada</th>
                                        <th>Serahan</th>
                                        <th>Cacatan</th>
                                        <th>Oleh</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($records as $key => $record)
                                        <tr>
                                            <input type="hidden" class="recdelete_val" value="{{ $record->id }}">
                                            <td>{{ $records->firstItem() + $key }}</td>
                                            <td>{{ $record->tarikh_terima }}</td>
                                            <td>{{ $record->perkara }}</td>
                                            <td>{{ $record->rujukan_fail }}</td>
                                            <td>{{ $record->rujukan_surat }}</td>
                                            <td>{{ $record->tarikh_surat }}</td>
                                            <td>{{ $record->daripada }}</td>
                                            <td>{{ $record->serahan->nama_serahan ?? null }}</td>
                                            <td>{{ $record->cacatan }}</td>
                                            <td>{{ $record->user->name ?? null }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="#" id="{{ $record->id }}"
                                                        class="btn btn-danger btn-xs recdeletebtn">
                                                        <span>Delete</span>
                                                    </a>


                                                    <a href="editRecord/{{ $record->id }}"
                                                        class="btn btn-primary btn-xs">Edit</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <br>

                            {{ $records->appends(['search' => request('search')])->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.recdeletebtn').click(function(e) {
                e.preventDefault();

                var id = this.id;

                //     Swal.fire({
                //     title: 'Error!',
                //     text: 'Do you want to continue',
                //     icon: 'error',
                //     confirmButtonText: 'Cool'
                // });



                //var delete_id = $(this).closest("tr").find('.recdelete_val_id').val();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            /* the route pointing to the post function */
                            url: 'deleteRecord/' + id,
                            type: 'POST',
                            /* send the csrf-token and the input to the controller */
                            data: {
                                id: id
                            },
                            dataType: 'JSON',
                            /* remind that 'data' is the response of the AjaxController */
                            success: function(data) {

                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                ).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                });

                            },
                            error: function() {
                                Swal.fire(
                                    'Error On Delete!',
                                    'Your file unsuccessfully deleted.',
                                    'error'
                                )
                            }

                        });


                    }
                })


            });
        });
    </script>

@endsection
