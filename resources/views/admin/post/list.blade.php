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
                        @permission(['Post Add','All'])
                    <a href="{{route('admin.post.create')}}" class="btn btn-primary pull-right">Create</a>
                    @endpermission
                    </div>
                    <div class="card-body">
              <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Views</th>
                    <th>Status</th>
                    <th>Hot News</th>
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $i=>$post)
                  <tr>
                    <td>{{++$i}}</td>
                    <td>
                        @if (file_exists(public_path('/post/').$post->thumb_image))
                        <img src ="{{asset('post')}}/{{$post->thumb_image}}" class="img img-responsive" width="120" height="120">
                        @endif
                    </td>
                    <td>{{$post->title}}</td>
                    <td>
                      {{ $post->creator->name }}
                    </td>
                    <td>{{$post->view_count}}</td>
                    <td>
                        {{ Form::open(['method'=> 'PUT', 'url' =>['back/post/status/'.$post->id], 'style'=>'display:inline']) }}
                        @if ($post->status===1)
                            {{ Form::submit('Unpublish', ['class' =>'btn btn-danger']) }}
                            @else 
                            {{ Form::submit('Publish', ['class' =>'btn btn-success']) }}
                        @endif
                      {{Form::close()}}
                    </td>

                    <td>
                      {{ Form::open(['method'=> 'PUT', 'url' =>['back/post/hot/'.$post->id], 'style'=>'display:inline']) }}
                      @if ($post->hot_news===1)
                          {{ Form::submit('No', ['class' =>'btn btn-danger']) }}
                          @else 
                          {{ Form::submit('Yes', ['class' =>'btn btn-success']) }}
                      @endif
                    {{Form::close()}}
                  </td>
                    <td>
                      @permission(['Post Add', 'All'])
                    <a href="{{route('admin.permission.edit', $post->id)}}" class="btn btn-sm btn-info">Edit</a>
                    @endpermission
                    <form action="{{route('admin.permission.delete', $post->id)}}" style="display:inline" method="POST">
                      @csrf
                      @method('DELETE')
                      @permission(['Post Add', 'All'])
                    <button type="submit" style="display:inline" class="btn btn-danger btn-sm">Delete</button>
                    @endpermission
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