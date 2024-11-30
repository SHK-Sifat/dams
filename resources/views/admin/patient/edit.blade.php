@extends('layouts.admin')
@section('content')
  <div class="row">
      <div class="col-md-12 ">
          <form method="post" action="{{url('dashboard/patient/update')}}" enctype="multipart/form-data">
            @csrf
              <div class="card mb-3">
                <div class="card-header">
                  <div class="row">
                      <div class="col-md-8 card_title_part">
                          <i class="fab fa-gg-circle"></i>Doctor Registration
                      </div>
                      <div class="col-md-4 card_button_part">
                          <a href="{{url('dashboard/patient')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Patient</a>
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
                      <label class="col-sm-3 col-form-label col_form_label">Patient Name<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="name" value="{{$data->patient_name}}">
                        <input type="hidden" name="id" value="{{$data->patient_id}}">
                        <input type="hidden" name="slug" value="{{$data->patient_slug}}">
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label">Patient Phone:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="phone" value="{{$data->patient_phone}}">
                      </div>
                    </div>
                    <div class="row mb-3 {{$errors->has('email') ? ' has-error' : '' }}">
                      <label class="col-sm-3 col-form-label col_form_label">Patient Email<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="email" class="form-control form_control" id="" name="email" value="{{$data->patient_email}}">
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <div class="row mb-3 {{ $errors->has('address') ? ' has-error' : '' }}">
                      <label class="col-sm-3 col-form-label col_form_label">Patient Address<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="address" value="{{$data->patient_address}}">
                        @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label">Patient Remarks:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="remarks" value="{{$data->patient_remarks}}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label col_form_label">Patient Image:</label>
                      <div class="col-sm-4">
                        <input type="file" class="form-control form_control" id="" name="pic">
                      </div>
                      <div class="col-md-2">
                        @if($data->patient_image!='')
                        <img class="img100" src="{{asset('uploads/patient/'.$data->patient_image)}}">
                        @else
                        <img class="img100" src="{{asset('contents/admin/images/')}}/avatar.png">
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-center">
                  <button type="submit" class="btn btn-sm btn-dark">UPDATE</button>
                </div>
              </div>
          </form>
      </div>
  </div>
@endsection
