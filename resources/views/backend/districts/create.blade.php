@extends('layouts.backend.master')
@section('title', 'Admin | Dashboard')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('backend_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('main-body')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Districts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Districts</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-right mb-2"><a href="{{route('districts.index')}}" class="btn btn-primary">Back</a></div>
                <div class="col-md-12 m-50">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-md-12 m-50">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add District</h3>
                        </div>
                        <form action="{{ route('districts.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="State">Select State</label>
                                    <select class="state-dropdown form-control" id="state_id" name="state_id">
                                        <option value="">Select State</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->state_id }}">{{ $state->state_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="district_name">District Name</label>
                                    <input type="text" class="form-control" id="district_name" name="district_name"
                                        placeholder="Enter District" value="{{ old('district_name') }}">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('extra-script')

    <script src="{{ asset('backend_assets/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('backend_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('backend_assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend_assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend_assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend_assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('backend_assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend_assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend_assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend_assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend_assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('backend_assets/dist/js/adminlte.min2167.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>

@endsection
