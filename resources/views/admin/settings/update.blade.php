@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
            <div class="card">
                @if ($message = Session::get('success'))
                      <div class="alert alert-success">
                        {{$message}}
                      </div>
                  @endif
                    <div class="card-header">
                        <strong class="card-title">Edit Category Page</strong>
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
                                  <h3 class="text-center">Edit Category</h3>
                              </div>
                              <hr>
                      
                              {{ Form::open(['url' => '/back/settings/update', 'method' => 'put', 'enctype'=> 'multupart/form-data']) }}
                              <div class="form-group">
                                {{ Form::label('name','System Name', array('class' => 'cotrol-label mb-1')) }}
                                {{ Form::text('name', $system_name, ['class'=> 'form-control', 'id'=> 'name']) }}
                              </div>

                                <div class="form-group">
                                    {{ Form::label('favicon', 'Favicon', array('class' => 'control-label mb1')) }}
                                    {{ Form::file('favicon', ['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('font_logo', 'Font Logo', array('class' => 'control-label mb1')) }}
                                    {{ Form::file('font_logo', ['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('admin_logo', 'Admin Logo', array('class' => 'control-label mb1')) }}
                                    {{ Form::file('admin_logo', ['class' => 'form-control']) }}
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


@endsection