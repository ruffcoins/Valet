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
    <form action="{{route('createSale')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-sm-12 col-md-12">
          @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br>
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
      </div>
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Sales Information</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>

            <div class="form-group mx-5 my-3">
              <label>Car Registeration Number</label>
              <select id="customers" name="customers" class="form-control">
                  <option disabled selected>Select a car registeration number...</option>
                  @foreach ($customers as $customer)
                    <option id="{{$customer->id}}" value="{{$customer->car_reg_no}}">{{$customer->car_reg_no}}</option>
                  @endforeach
              </select>
            </div>
            
            <div class="form-group mx-5 my-3">
              <label>Service Name</label>
              <select id="services" name="services" class="form-control">
                  <option disabled selected>Select a service...</option>
                  @foreach ($services as $service)
                      <option value="{{ $service->name }}" data-price="{{ $service->price }}">{{ $service->name }}</option>
                  @endforeach
              </select>
            </div>

            <div class="form-group mx-5 my-3">
              <label>Washed by whom?</label>
              <input type="text" name="washer" class="form-control" required="required">
            </div>

            <div class="form-group mx-5 my-2">
              <label>Date</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="date" id="date" class="form-control" name="date" required="required">
              </div>
            </div>

            <div class="form-group mx-5 my-2">
              <label>Total</label>
              <input type="text" name="total" id="total" class="form-control" required="required" value="" readonly="readonly">
            </div>
            <!-- /.card-body -->
          <input type="submit" value="Save Sale" class="btn btn-success float-right my-2">
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-3"></div>
      </div>
    </form>
  </section>
</div>
<script src="{{ asset ('plugins/jquery/jquery.min.js') }}"></script>
<script>
    $('#services').on('change',function(){
      var price = $(this).children('option:selected').data('price');
      $('#total').val(price);
  });

  var now = new Date(),
    // maximum date the user can choose, in this case now and in the future
    maxDate = now.toISOString().substring(0,10);

$('#date').prop('max', maxDate);
</script>
@endsection