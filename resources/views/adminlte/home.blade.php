@extends('adminlte.layout.app')

@section('title', 'Dashboard')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Users</span>
                <span class="info-box-number">
                  {{$userCount}}
                  <!-- <small>%</small> -->
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-server"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Services</span>
                <span class="info-box-number">{{$serviceCount}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Transactions</span>
                <span class="info-box-number">{{$saleCount}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Customers</span>
                <span class="info-box-number">{{$customerCount}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card">

              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <!-- <span class="text-bold text-lg">820</span> -->
                    <span class="text-bold text-lg">Sales Trends</span>
                  </p>
                  <!-- <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
                  </p> -->
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  {!! $salesChart->container() !!}

                </div>
                {!! $salesChart->script() !!}

              </div>
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">

              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <!-- <span class="text-bold text-lg">$18,230.00</span> -->
                    <span class="text-bold text-lg">Expense Trends</span>
                  </p>
                  <!-- <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Since last month</span>
                  </p> -->
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  {!! $expenseChart->container() !!}

                </div>
                {!! $expenseChart->script() !!}

              </div>
            </div>
            <!-- /.card -->
          </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="row">
            <div class="col-sm-3 col-6">
              <div class="description-block border-right">
                <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> ---</span>
                <h5 class="description-header">₦{{$formattedSaleGrandTotal}}</h5>
                <span class="description-text">TOTAL SALES</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-6">
              <div class="description-block border-right">
                <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> ---</span>
                <h5 class="description-header">₦{{$formattedExpenseGrandTotal}}</h5>
                <span class="description-text">TOTAL EXPENSES</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-6">
              <div class="description-block border-right">
              @if($formattedProfit < 0)
                <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i>  {{$profitPercentage}}%</span>
                  <h5 class="description-header">₦{{$formattedProfit}}</h5>
                  <span class="description-text">TOTAL LOSS</span>
              @else
                  <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> {{$profitPercentage}}%</span>
                  <h5 class="description-header">₦{{$formattedProfit}}</h5>
                  <span class="description-text">TOTAL PROFIT</span>
              @endif

              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-6">
              <div class="description-block">
              @if($weeklyGrowthPercentage < 0)
                <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i>  {{$weeklyGrowthPercentage}}%</span>
                      <h5 class="description-header">{{$weeklyGrowthPercentage}}% Decrease this week</h5>
                      <span class="description-text">WEEKLY GROWTH</span>
              @else
              <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> {{$weeklyGrowthPercentage}}%</span>
                      <h5 class="description-header">{{$weeklyGrowthPercentage}}% Increase this week</h5>
                      <span class="description-text">WEEKLY GROWTH</span>
              @endif

              </div>
              <!-- /.description-block -->
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->


@endsection
