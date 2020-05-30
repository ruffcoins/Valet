@extends('adminlte.layout.app')

@section('title', 'View Customer')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer Detail</li>
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
          <h3 class="card-title">Customer Detail</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Number of transactions</span>
                      <span class="info-box-number text-center text-muted mb-0">{{$customer->transaction_count}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total amount spent</span>
                      <span class="info-box-number text-center text-muted mb-0">{{$customer->total_amount}}</span>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-12">
                  <h4>Recent Transactions</h4>
                    <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          S/N
                      </th>
                      <th style="width: 30%">
                          Service
                      </th>
                      <th style="width: 30%">
                          Price
                      </th>
                      <th style="width: 30%">
                          Date
                      </th>
                  </tr>
              </thead>
              <tbody>
              @foreach($sales as $index => $sale)
                <tr>
                  <td>
                    {{$loop->iteration}}
                  </td>
                  <td>
                      {{str_replace(array('["', '"]'), '',$name[$index])}}
                  </td>
                  <td>
                    {{$sale->total}}
                  </td>
                  <td>
                  {{$sale->date}}
                  </td>
                </tr>
                @endforeach
              </tbody>
          </table>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-user"></i> {{$customer->first_name}} {{$customer->last_name}}</h3>
              <br>
              <div class="text-muted">
                <p class="text-sm">Car Registeration Number
                  <b class="d-block">{{$customer->car_reg_no}}</b>
                </p>
                <p class="text-sm">Phone Number
                  <b class="d-block">{{$customer->phone}}</b>
                </p>
              </div>

              <div class="text-center mt-5 mb-3">
                <a href="{{route('editCustomer', $customer->id)}}" class="btn btn-sm btn-info">
                    <i class="fas fa-pencil-alt"></i>
                    Edit
                </a>
                <span>
                    <span class="btn btn-danger btn-sm" onclick="event.preventDefault();
                        if(confirm('Are you sure?')){
                            document.getElementById('form-delete-{{$customer->id}}')
                            .submit()
                        }">
                        <i class="fas fa-trash"></i>
                        Delete
                    </span>

                    <form action="{{route('deleteCustomer', $customer->id)}}" id="{{'form-delete-'.$customer->id}}" method="post" style="display:none;">
                        @csrf
                        @method('patch')
                    </form>
                </span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
