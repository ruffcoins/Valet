@extends('adminlte.layout.app')

@section('title', 'Customer Report')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>Customer Report</h1>
          </div>
          <div class="col-sm-4">
            @if(session()->has('success'))
              <div class="alert alert-success">
                {{session()->get('success')}}
              </div>
            @endif
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Customers</li>
              <li class="breadcrumb-item active">Reports</li>

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
          <h3 class="card-title">Customers</h3>
          
          <div class="card-tools">
          <a href="{{ route('customerReportDownload') }}" class="btn btn-success ">Save as PDF</a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
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
                        Customer
                    </th>
                    <th style="width: 20%">
                        Car Reg No
                    </th>
                    <th style="width: 20%">
                        Phone
                    </th>
                    <th style="width: 20%">
                        Transactions
                    </th>
                    <th style="width: 28%" >
                        Amount Spent
                    </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($customers as $customer)
                <tr>
                  <td>
                    {{$loop->iteration}}
                  </td>
                  <td>
                    {{$customer['first_name']}} {{$customer['last_name']}}
                  </td>
                  <td>
                      {{$customer['car_reg_no']}}
                  </td>
                  <td class="project_progress">
                      {{$customer['phone']}}
                  </td>
                  <td class="project_progress">
                      {{$customer['transaction_count']}}
                  </td>
                  <td class="project_progress">
                      {{$customer['total_amount']}}
                  </td>
                </tr>                      
                @endforeach
                <tr>
                    <td></td>
                    <td><strong>Grand Total</strong></td>
                    <td></td>
                    <td></td>
                    <td><strong>{{$totalTransactions}}</strong></td>
                    <td><strong> ₦ {{$grandTotal}}</strong></td>
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
  <script>
    $('.print-window').click(function() {
        window.print();
    });
  </script>

  <!-- /.content-wrapper -->
@endsection