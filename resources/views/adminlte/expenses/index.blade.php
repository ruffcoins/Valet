@extends('adminlte.layout.app')

@section('title', 'View Expenses')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Expenses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Expenses</li>
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
          <h3 class="card-title">View Expenses</h3>

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
                      <th style="width: 15%">
                          Payee
                      </th>
                      <th style="width: 15%">
                          Expense
                      </th>
                      <th style="width: 20%">
                          Purpose
                      </th>
                      <th style="width: 10%">
                          Phone
                      </th>
                      <th style="width: 8%" class="text-center">
                          Date
                      </th>
                      <th style="width: 10%" class="text-right">
                      Cost
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                        <a>
                            AdminLTE v3
                        </a>
                      </td>
                      <td>
                          Expense name
                      </td>
                      <td>
                          Purpose
                      </td>
                      <td class="project_progress">
                          08078766543
                      </td>
                      <td class="project-state">
                          22/12/2020
                      </td>
                     <td class="text-right">
                      <p>5000</p>
                     </td>
                  </tr>
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