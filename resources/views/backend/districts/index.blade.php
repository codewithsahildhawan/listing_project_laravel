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
                @if (session('success'))
                <div class="col-md-12">
                    <div class="alert alert-success">{{ session('success') }}</div>
                </div>    
                @endif
                <div class="col-md-12 text-right mb-2">
                    <a href="{{route('districts.create')}}" class="btn btn-primary">Add District</a>
                </div>
                <div class="col-md-12 m-50">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>District Name</th>
                                <th>State</th>
                                <th>Active/Inactive</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp  <!-- Initialize $i to 1 -->
                            @foreach ($districts as $district)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $district->district_name }}</td>
                                <td>{{ $district->state->state_name }}</td>
                                <td>{!! $district->status === '1' ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>' !!}</td> <!-- Conditional output for status -->
                                <td>
                                    <a href="{{ route('districts.edit', $district->district_id ) }}" class="btn btn-warning">Edit</a> <!-- Link to edit -->
                                    <form action="{{ route('districts.destroy', $district->district_id ) }}" method="POST" style="display:inline;"> <!-- Form for delete -->
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @php $i++; @endphp
                            @endforeach
                        </tbody>
                    </table>
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
