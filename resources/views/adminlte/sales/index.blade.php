@extends('adminlte.layout.app')

@section('title', 'View Sales')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Sales</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sales</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">View Sales</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button> -->
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          S/N
                      </th>
                      <th style="width: 20%">
                        Car Reg No
                      </th>
                      <th style="width: 20%">
                        Service(s)
                      </th>
                      <th style="width: 20%">
                        Washed By
                      </th>
                      <th style="width: 10%">
                        Date
                      </th>
                      <th style="width: 8%" class="text-center">
                        Total
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($sales as $sale)
                  <tr>
                      <td>
                        {{$sale->id}}
                      </td>
                      <td>
                        {{$sale->customer_car_reg_no}}
                      </td>
                      <td>
                        {{$sale->service_name}}
                      </td>
                      <td>
                      {{$sale->washer}}
                      </td>
                      <td class="project_progress">
                        {{$sale->date}}
                      </td>
                      <td class="project-state">
                        {{$sale->total}}
                      </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection