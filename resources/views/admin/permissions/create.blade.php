@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
            <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Create Permission Page</strong>
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
                                  <h3 class="text-center">Create Permission</h3>
                              </div>
                              <hr>
                            <form action="{{route('admin.permission.store')}}" method="post">
                                @csrf
                              
                                  <div class="form-group">
                                      <label for="name" class="control-label mb-1">Name</label>
                                      <input id="name" name="name" type="text" class="form-control">
                                  </div>

                                  <div class="form-group">
                                    <label for="display_name" class="control-label mb-1">Display Name</label>
                                    <input id="display_name" name="display_name" type="text" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="description" class="control-label mb-1">Description</label>
                                    <textarea id="description" name="description" class="form-control" cols="5" rows="5"></textarea>
                                </div>
                               
                                  <div>
                                      <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                          <i class="fa fa-lock fa-lg"></i>&nbsp;
                                          <span id="payment-button-amount">Create Permission</span>
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