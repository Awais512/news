@extends('admin.layouts.master')

@section('content')


<link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{asset('admin/assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
<link rel="stylesheet" href="{{asset('admin/assets/scss/style.css')}}">


<div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                <h1>{{$page_name}}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">{{$page_name}}</a></li>
                        <li><a href="#">Table</a></li>
                        <li class="active">Data Table</li>
                    </ol>
                </div>
            </div>
        </div>
</div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

            <div class="col-md-12">
                <div class="card">
                  @if ($message = Session::get('success'))
                      <div class="alert alert-success">
                        {{$message}}
                      </div>
                  @endif
                    <div class="card-header">
                        <strong class="card-title">{{$page_name}}</strong>
                    <a href="{{route('admin.role.create')}}" class="btn btn-primary pull-right">Create</a>
                    </div>
                    <div class="card-body">
              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Display Name</th>
                    <th>Description</th>
                    <th>Permissions</th>
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($roles as $i=>$role)
                  <tr>
                  <td>{{++$i}}</td>
                  <td>{{$role->name}}</td>
                  <td>{{$role->display_name}}</td>
                  <td>{{$role->description}}</td>
                  <td>
                    @if ($role->perms())
                        <ul style="margin-left:20px">
                          @foreach ($role->perms()->get() as $permission)
                         <li>{{$permission->name}}</li>
                          @endforeach
                        </ul>
                    @endif
                  </td>
                    <td>
                      {{-- {{route('admin.permission.edit', $permission->id)}} --}}
                      {{-- {{route('admin.permission.delete', $permission->id)}} --}}
                    <a href="{{route('admin.role.edit', $role->id)}}" class="btn btn-sm btn-info">Edit</a>
                    <form action="{{route('admin.role.delete', $role->id)}}" style="display:inline" method="POST">
                      @csrf
                      @method('DELETE')
                    <button type="submit" style="display:inline" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    </td>
                  </tr>                      
                  @endforeach
                </tbody>
              </table>
                    </div>
                </div>
            </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <script src="{{asset('admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/plugins.js')}}"></script>
    <script src="{{asset('admin/assets/js/main.js')}}"></script>


    <script src="{{asset('admin/assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/data-table/datatables-init.js')}}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
</script>

@endsection