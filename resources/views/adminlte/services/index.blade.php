@extends('adminlte.layout.app')

@section('title', 'View Services')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>Services</h1>
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
              <li class="breadcrumb-item active">Services</li>
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
          <h3 class="card-title">Services</h3>

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
                          Service
                      </th>
                      <th style="width: 30%">
                          Price
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($service as $service)
                  <tr>
                      <td>
                          {{$service->id}}
                      </td>
                      <td>
                          <a>
                              {{$service->name}}
                          </a>
                      </td>
                      <td>
                          {{$service->price}}
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="{{route('editService', $service->id)}}">
                              <i class="fas fa-pencil-alt"></i>
                              Edit
                          </a>
                          <span>
                            <span class="btn btn-danger btn-sm" onclick="event.preventDefault();
                                if(confirm('Are you sure?')){
                                    document.getElementById('form-delete-{{$service->id}}')
                                    .submit()
                                }">
                              <i class="fas fa-trash"></i>
                              Delete
                            </span>

                            <form action="{{route('deleteService', $service->id)}}" id="{{'form-delete-'.$service->id}}" method="post" style="display:none;">
                                @csrf
                                @method('patch')
                            </form>
                          </span>
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