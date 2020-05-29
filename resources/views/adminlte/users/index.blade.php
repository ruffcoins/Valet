@extends('adminlte.layout.app')

@section('title', 'View Users')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>Users</h1>
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
              <li class="breadcrumb-item active">Users</li>
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
          <h3 class="card-title">Users</h3>

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
                          Name
                      </th>
                      <th style="width: 18%">
                          Email
                      </th>
                      <th style="width: 15%">
                          Phone
                      </th>
                      <th style="width: 5%" class="text-center">
                          Role
                      </th>
                      <!-- <th style="width: 13%" >
                          Amount Spent
                      </th> -->
                      <th style="width: 40%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($data as $key => $user)
                  <tr>
                      <td>
                      {{ ($data->currentpage()-1) * $data->perpage() + $key + 1 }}
                      </td>
                      <td>
                        {{$user->name}}
                      </td>
                      <td>
                          {{$user->email}}
                      </td>
                      <td class="project_progress">
                          {{$user->phone}}
                      </td>
                      <td class="project_progress">
                          {{$user->role}}
                      </td>
                      <!-- <td class="project_progress">
                          {{$user->total_amount}}
                      </td> -->
                      <td class="project-actions text-right">
                          
                          @role('Admin|Supervisor')
                            <a class="btn btn-info btn-sm" href="{{route('editUser', $user->id)}}">
                                <i class="fas fa-pencil-alt"></i>
                                Update
                            </a>
                          @endrole
                          @role('Supervisor')
                            <span>
                              <span class="btn btn-danger btn-sm" onclick="event.preventDefault();
                                  if(confirm('Are you sure?')){
                                      document.getElementById('form-delete-{{$user->id}}')
                                      .submit()
                                  }">
                                <i class="fas fa-trash"></i>
                                Delete
                              </span>

                              <form action="{{route('deleteUser', $user->id)}}" id="{{'form-delete-'.$user->id}}" method="post" style="display:none;">
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
      <div>
        {{$data->links()}}
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection