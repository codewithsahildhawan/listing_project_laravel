@extends('layouts.backend.master')
@section('title','Admin | Dashboard')
@section('main-body')

<div class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
             <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
             </ol>
          </div>
       </div>
    </div>
 </div>
 <section class="content">
    <div class="container-fluid">
       <div class="row">
          <div class="col-lg-3 col-6">
             <div class="small-box bg-info">
                <div class="inner">
                   <h3>150</h3>
                   <p>New Orders</p>
                </div>
                <div class="icon">
                   <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i
                   class="fas fa-arrow-circle-right"></i></a>
             </div>
          </div>
          <div class="col-lg-3 col-6">
             <div class="small-box bg-success">
                <div class="inner">
                   <h3>53<sup style="font-size: 20px">%</sup></h3>
                   <p>Bounce Rate</p>
                </div>
                <div class="icon">
                   <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i
                   class="fas fa-arrow-circle-right"></i></a>
             </div>
          </div>
          <div class="col-lg-3 col-6">
             <div class="small-box bg-warning">
                <div class="inner">
                   <h3>44</h3>
                   <p>User Registrations</p>
                </div>
                <div class="icon">
                   <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i
                   class="fas fa-arrow-circle-right"></i></a>
             </div>
          </div>
          <div class="col-lg-3 col-6">
             <div class="small-box bg-danger">
                <div class="inner">
                   <h3>65</h3>
                   <p>Unique Visitors</p>
                </div>
                <div class="icon">
                   <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i
                   class="fas fa-arrow-circle-right"></i></a>
             </div>
          </div>
       </div>
    </div>
 </section>

 @endsection

 @section('extra-js')
 <script>
    $.widget.bridge('uibutton', $.ui.button)
 </script>
 <script src="{{ asset('backend_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('backend_assets/plugins/chart.js/Chart.min.js') }}"></script>
 <script src="{{ asset('backend_assets/plugins/sparklines/sparkline.js') }}"></script>
 <script src="{{ asset('backend_assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
 <script src="{{ asset('backend_assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
 <script src="{{ asset('backend_assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
 <script src="{{ asset('backend_assets/plugins/moment/moment.min.js') }}"></script>
 <script src="{{ asset('backend_assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
 <script src="{{ asset('backend_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
 <script src="{{ asset('backend_assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
 <script src="{{ asset('backend_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
 <script src="{{ asset('backend_assets/dist/js/adminlte2167.js?v=3.2.0') }}"></script>
 <script src="{{ asset('backend_assets/dist/js/demo.js') }}"></script>
 <script src="{{ asset('backend_assets/dist/js/pages/dashboard.js') }}"></script>
 @endsection


