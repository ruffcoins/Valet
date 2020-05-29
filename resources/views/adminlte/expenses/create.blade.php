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
      <form action="{{route('createExpense')}}" method="post">
      @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4">
            @if ($errors->any())
              <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            @if(session()->has('success'))
              <div class="alert alert-success">
                {{session()->get('success')}}
              </div>
            @elseif(session()->has('error'))
              <div class="alert alert-danger">
                {{session()->get('error')}}
              </div>
            @endif
          </div>
          <div class="col-md-4"></div>
        </div>
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
                  <label>First Name</label>
                  <input type="text" name="first_name" class="form-control" required="required">
                </div>
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" name="last_name" class="form-control">
                </div>    
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="text" name="phone" class="form-control" required="required">
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
                  <label>Name</label>
                  <input type="text" name="expense_name" class="form-control" required="required">
                </div>
                <div class="form-group">
                  <label>Cost</label>
                  <input type="number" name="expense_cost" class="form-control" required="required">
                </div>
                <div class="form-group">
                  <label>Purpose</label>
                  <input type="text" name="expense_purpose" class="form-control" required="required">
                </div>
                <div class="form-group">
                  <!-- Date dd/mm/yyyy -->
                    <label>Date</label>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="date" id="date" class="form-control" name="expense_date" required="required">
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
          <div class="col-sm-12">
            <input type="submit" value="Save Expense" class="btn btn-success float-right">
          </div>
        </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script src="{{ asset ('plugins/jquery/jquery.min.js') }}"></script>

  <script>
      var now = new Date(),
    // maximum date the user can choose, in this case now and in the future
    maxDate = now.toISOString().substring(0,10);

    $('#date').prop('max', maxDate);
  </script>
@endsection