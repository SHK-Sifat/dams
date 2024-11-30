@extends('layouts.admin')
@section('content')
  <div class="row">
      <div class="col-md-12 ">
          <form method="post" action="{{url('dashboard/doctor/submit')}}" enctype="multipart/form-data">
            @csrf
              <div class="card mb-3">
                <div class="card-header">
                  <div class="row">
                      <div class="col-md-8 card_title_part">
                          <i class="fab fa-gg-circle"></i>Doctor Registration
                      </div>
                      <div class="col-md-4 card_button_part">
                          <a href="{{url('dashboard/doctor')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Doctor</a>
                      </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                      @if(Session::has('success'))
                        <div class="alert alert-success alert_success" role="alert">
                           <strong>Success!</strong> {{Session::get('success')}}
                        </div>
                      @endif
                      @if(Session::has('error'))
                        <div class="alert alert-danger alert_error" role="alert">
                           <strong>Opps!</strong> {{Session::get('error')}}
                        </div>
                      @endif
                    </div>
                    <div class="col-md-2"></div>
                  </div>
                    <div class="row mb-3 {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label class="col-sm-3 col-form-label col_form_label">Doctor Name<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="name" value="{{old('name')}}">
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label">Doctor Phone:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="phone" value="{{old('phone')}}">
                      </div>
                    </div>
                    <div class="row mb-3 {{$errors->has('email') ? ' has-error' : '' }}">
                      <label class="col-sm-3 col-form-label col_form_label">Doctor Email<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="email" class="form-control form_control" id="" name="email" value="{{old('email')}}">
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <div class="row mb-3 {{ $errors->has('specialist') ? ' has-error' : '' }}">
                      <label class="col-sm-3 col-form-label col_form_label">Doctor Specialist<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="specialist" value="{{old('specialist')}}">
                        @if ($errors->has('specialist'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('specialist') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <div class="row mb-3 {{ $errors->has('degree') ? ' has-error' : '' }}">
                      <label class="col-sm-3 col-form-label col_form_label">Doctor Degree<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="degree" value="{{old('degree')}}">
                        @if ($errors->has('degree'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('degree') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <div class="row mb-3 {{ $errors->has('remarks') ? ' has-error' : '' }}">
                      <label class="col-sm-3 col-form-label col_form_label">Doctor Remarks<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="remarks" value="{{old('remarks')}}">
                        @if ($errors->has('remarks'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('remarks') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label">Doctor Image:</label>
                      <div class="col-sm-4">
                        <input type="file" class="form-control form_control" id="" name="pic">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-center">
                  <button type="submit" class="btn btn-sm btn-dark">REGISTRATION</button>
                </div>
              </div>
          </form>
      </div>
  </div>
@endsection
