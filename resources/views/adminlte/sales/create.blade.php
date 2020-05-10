@extends('adminlte.layout.app')

@section('title', 'New Sale')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Enter Sale</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Sales</li>
              <li class="breadcrumb-item active">New Sale</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
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
                <label>Customer Search</label>
                <input type="text" name="customer_search" class="form-control">
              </div>
              <!-- <div class="form-group">
                <label>First Name</label>
                <input type="text" name="firstname" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Last Name</label>
                <input type="text" name="lastname" class="form-control">
              </div>     -->
              <div class="form-group">
                <label for="inputClientCompany">Car Registeraton Number</label>
                <input type="text" name="carregno" class="form-control">
              </div>
              <!-- <div class="form-group">
                <label for="inputProjectLeader">Phone Number</label>
                <input type="text" name="phoneno" class="form-control">
              </div> -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-5">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Service Information</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="servicesearch">Service Search</label>
                <input type="text" name="servicesearch" class="form-control">
              </div>
              <div class="form-group">
                <label for="servicename">Service Name</label>
                <input type="text" name="servicename" class="form-control">
              </div>
              <div class="form-group">
                <label for="servicecharge">Service Charge</label>
                <input type="number" name="servicecharge" class="form-control">
              </div>
              <div>
                <input type="submit" value="Add Service" class="btn btn-success float-right">
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 5%">
                                S/N
                            </th>
                            <th style="width: 50%">
                                Name
                            </th>
                            <th style="width: 30%">
                                Charge
                            </th>
                            <th style="width: 15%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                #
                            </td>
                            <td>
                                <p>Sevice name</p>
                            </td>
                            <td>
                                <p>5000</p>
                            </td>
                            
                            <td class="project-actions text-right">
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-3">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Sale</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Server</label>
                <input type="text" name="server" class="form-control">
              </div>
              <div class="form-group">
                <!-- Date dd/mm/yyyy -->
                  <label>Date</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" class="form-control" name="date">
                  </div>
                  <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Total</label>
                <input type="number" name="total" class="form-control">
              </div>
              <div class="form-group">
                <label>Amount Paid</label>
                <input type="number" name="amountpaid" class="form-control">
              </div>
              <div class="form-group">
                <label>Balance</label>
                <input type="number" name="balance" class="form-control">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row mt-10">
        <div class="col-md-6 col-sm-6 offset-3">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Save Sale" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection