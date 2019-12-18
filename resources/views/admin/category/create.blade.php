@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
            <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Create Category Page</strong>
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
                                  <h3 class="text-center">Create Category</h3>
                              </div>
                              <hr>
                            <form action="{{route('admin.category.store')}}" method="post">
                                @csrf
                              
                                  <div class="form-group">
                                      <label for="name" class="control-label mb-1">Name</label>
                                      <input id="name" name="name" type="text" class="form-control">
                                  </div>
    
                                  <div>
                                      <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                          <i class="fa fa-lock fa-lg"></i>&nbsp;
                                          <span id="payment-button-amount">Create Category</span>
                                          <span id="payment-button-sending" style="display:none;">Sending…</span>
                                      </button>
                                  </div>
                              </form>
                          </div>
                      </div>
            
                    </div>
            </div> <!-- .card -->
    </div>
</div>


@endsection