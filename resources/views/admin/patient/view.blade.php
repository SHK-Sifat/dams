@extends('layouts.admin')
@section('content')
  <div class="row">
      <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_title_part">
                      <i class="fab fa-gg-circle"></i>View Patient Information
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
                      <table class="table table-bordered table-striped table-hover custom_view_table">
                        <tr>
                          <td>Name</td>
                          <td>:</td>
                          <td>{{$data->patient_name}}</td>
                        </tr>
                        <tr>
                          <td>Phone</td>
                          <td>:</td>
                          <td>{{$data->patient_phone}}</td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td>:</td>
                          <td>{{$data->patient_email}}</td>
                        </tr>
                        <tr>
                          <td>Address</td>
                          <td>:</td>
                          <td>{{$data->patient_address}}</td>
                        </tr>
                        <tr>
                          <td>Remarks</td>
                          <td>:</td>
                          <td>{{$data->patient_remarks}}</td>
                        </tr>
                        <tr>
                          <tr>
                          <td>Photo</td>
                          <td>:</td>
                          <td>
                            @if($data->patient_image!='')
                            <img height="150" src="{{asset('uploads/patient/'.$data->patient_image)}}">
                            @else
                            <img height="150" src="{{asset('contents/admin/images/')}}/avatar.png">
                            @endif
                          </td>
                        </tr>
                        <tr>
                          <td>Created_at</td>
                          <td>:</td>
                          <td>{{$data->created_at}}</td>
                        </tr>
                      </table>
                  </div>
                  <div class="col-md-2"></div>
              </div>
            </div>
            <div class="card-footer">
              <div class="btn-group" role="group" aria-label="Button group">
                <button type="button" class="btn btn-sm btn-dark">Print</button>
                <button type="button" class="btn btn-sm btn-secondary">PDF</button>
                <button type="button" class="btn btn-sm btn-dark">Excel</button>
              </div>
            </div>
          </div>
      </div>
  </div>
@endsection
