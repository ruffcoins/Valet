@extends('adminlte.layout.app')

@section('title', 'View Customers')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>Customers</h1>
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
              <li class="breadcrumb-item active">Customers</li>
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
                      <th style="width: 15%">
                          Car Reg No
                      </th>
                      <th style="width: 15%">
                          Phone
                      </th>
                      <th style="width: 8%" class="text-center">
                          Transactions
                      </th>
                      <th style="width: 13%" >
                          Amount Spent
                      </th>
                      <th style="width: 35%">
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
                        {{$customer->first_name}} {{$customer->last_name}}
                      </td>
                      <td>
                          {{$customer->car_reg_no}}
                      </td>
                      <td class="project_progress">
                          {{$customer->phone}}
                      </td>
                      <td class="project_progress">
                          {{$customer->transaction_count}}
                      </td>
                      <td class="project_progress">
                          {{$customer->total_amount}}
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="{{route('showCustomer', $customer->id)}}">
                              <i class="fas fa-folder"></i>
                              View
                          </a>
                          @role('Admin|Supervisor')
                            <a class="btn btn-info btn-sm" href="{{route('editCustomer', $customer->id)}}">
                                <i class="fas fa-pencil-alt"></i>
                                Edit
                            </a>
                          @endrole
                          @role('Supervisor')
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
                          @endrole
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