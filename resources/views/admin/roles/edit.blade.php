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
<!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
<link rel="stylesheet" href="{{asset('admin/assets/scss/style.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/css/lib/chosen/chosen.min.css')}}">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<div class="row">
    <div class="col-md-12">
            <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Edit Permission Page</strong>
                    </div>
                    <div class="card-body">
                      <!-- Credit Card -->
                      <div id="pay-invoice">
                          <div class="card-body">
                              @if (count($errors) > 0)
                                  <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                  </div>
                              @endif
                              <div class="card-title">
                                  <h3 class="text-center">Edit Permission</h3>
                              </div>
                              <hr>
                              {{ Form::model($role,['route' => ['admin.role.update', $role->id], 'method' => 'put']) }}
                              <div class="form-group">
                                  {{ Form::label('name', 'Name', array('class'=> 'control-label mb1')) }}
                                  {{ Form::text('name', null, ['class'=> 'form-control', 'id' => 'name']) }}
                              </div>

                              <div class="form-group">
                                {{ Form::label('display_name', 'Display Name', array('class'=> 'control-label mb1')) }}
                                {{ Form::text('display_name', null, ['class'=> 'form-control', 'id' => 'display_name']) }}
                              </div>

                              <div class="form-group">
                                {{ Form::label('description', 'Description', array('class'=> 'control-label mb1')) }}
                                {{ Form::textarea('description', null, ['class'=> 'form-control', 'id' => 'description']) }}
                              </div>

                              <div class="form-group">
                                  {{ Form::label('permission', 'Permission', array('class' => 'control-label mb1')) }}
                                  {{ Form::select('permission[]', $permission, $selectedPermission, ['class' => 'form-control standardSelect', 'multiple']) }}
                              </div>

                              <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                    <span id="payment-button-amount">Update</span>
                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                </button>
                            </div>

                            
                            {{ Form::close() }}
                          </div>
                      </div>
            
                    </div>
            </div> <!-- .card -->
    </div>
</div>

<script src="{{asset('admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
<script src="{{asset('admin/assets/js/plugins.js')}}"></script>
<script src="{{asset('admin/assets/js/main.js')}}"></script>
<script src="{{asset('admin/assets/js/lib/chosen/chosen.jquery.min.js')}}"></script>

<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>
@endsection