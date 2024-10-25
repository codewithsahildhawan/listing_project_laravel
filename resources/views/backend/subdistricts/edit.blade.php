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
                    <h1 class="m-0">SubDistricts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">SubDistricts</li>
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
                            <h3 class="card-title">Edit SubDistrict ({{ $subdistrict->subdistrict_name }})</h3>
                        </div>
                        <form action="{{ route('subdistricts.update', $subdistrict->subdistrict_id) }}" method="POST">
                            @csrf
                            @method('PUT') <!-- Use PUT for updates -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="district_id">Select District</label>
                                    <select class="district-dropdown form-control" id="district_id" name="district_id">
                                        <option value="">Select District</option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->district_id }}" {{ $district->district_id == $subdistrict->district_id ? 'selected' : '' }}>
                                                {{ $district->district_name }} ({{ $district->district_code }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="subdistrict_name">SubDistrict Name</label>
                                    <input type="text" class="form-control" id="subdistrict_name" name="subdistrict_name"
                                        placeholder="Enter SubDistrict Name" value="{{ old('subdistrict_name', $subdistrict->subdistrict_name) }}">
                                </div>
                                <div class="form-group">
                                    <label for="subdistrict_code">SubDistrict Code</label>
                                    <input type="text" class="form-control" id="subdistrict_code" name="subdistrict_code"
                                        placeholder="Enter SubDistrict Code" value="{{ old('district_code', $subdistrict->district_code) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{ $subdistrict->status === 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $subdistrict->status === 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update State</button>
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
