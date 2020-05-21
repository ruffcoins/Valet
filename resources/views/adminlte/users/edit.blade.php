@extends('adminlte.layout.app')

@section('title', 'Edit User')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="{{route('updateUser', $user->id)}}" method="post">
      @csrf
      @method('patch')
        <div class="row">         
          <div class="col-md-6 col-sm-6 offset-3">
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">User Information</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              
                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{$user->email}}">
                  </div>    
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" required="required" value="{{$user->phone}}">
                  </div>
                  
                  <div class="form-group">
                    <label>Role</label>
                    @if(auth()->user()->role == "Admin" && $user->role == "Supervisor")
                      <select name="role" class="form-control" disabled>
                          <option value="">No Role</option>
                          @foreach($guardedRoleList as $id => $name)
                              <option>{{$name}}</option>
                          @endforeach
                      </select>
                    @else
                      <select name="role" class="form-control">
                          <option value="">No Role</option>
                          @foreach($guardedRoleList as $id => $name)
                              <option>{{$name}}</option>
                          @endforeach
                      </select>
                    @endif
                  </div>
                </div>
                <button type="submit" class="btn btn-success float-right form-control">Update User</button> 
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection