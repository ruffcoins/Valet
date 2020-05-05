@extends('adminlte.layout.app')

@section('title', 'Enter Expense')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Enter Expense</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Expenses</li>
              <li class="breadcrumb-item active">New Expenses</li>

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Payee Information</h3>

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
                <label for="inputProjectLeader">Phone Number</label>
                <input type="text" id="phoneno" class="form-control">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Expense Information</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="expensename">Name</label>
                <input type="text" id="expensename" class="form-control">
              </div>
              <div class="form-group">
                <label for="expensecost">Cost</label>
                <input type="number" id="expensecost" class="form-control">
              </div>
              <div class="form-group">
                <label for="expensepurpose">Purpose</label>
                <input type="text" id="expensepurpose" class="form-control">
              </div>
              <div class="form-group">
                <!-- Date dd/mm/yyyy -->
                  <label>Date</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" name="date" id="date" placeholder="dd/mm/yyyy">
                  </div>
                  <!-- /.input group -->
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Save Expense" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection