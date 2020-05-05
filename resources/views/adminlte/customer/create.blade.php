@extends('adminlte.layout.app')

@section('title', 'New Customer')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Customer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">New Customer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6 col-sm-6 offset-3">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Customer Information</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">First Name</label>
                <input type="text" id="firstname" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Last Name</label>
                <input type="text" id="lastname" class="form-control">
              </div>    
              <div class="form-group">
                <label for="inputClientCompany">Car Registeraton Number</label>
                <input type="text" id="carregno" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Phone Number</label>
                <input type="text" id="phoneno" class="form-control">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 offset-3 my-10">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Add New Customer" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection