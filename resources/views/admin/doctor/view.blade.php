@extends('layouts.admin')
@section('content')
  <div class="row">
      <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_title_part">
                      <i class="fab fa-gg-circle"></i>View Doctor Information
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
                      <table class="table table-bordered table-striped table-hover custom_view_table">
                        <tr>
                          <td>Name</td>
                          <td>:</td>
                          <td>{{$data->doctor_name}}</td>
                        </tr>
                        <tr>
                          <td>Phone</td>
                          <td>:</td>
                          <td>{{$data->doctor_phone}}</td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td>:</td>
                          <td>{{$data->doctor_email}}</td>
                        </tr>
                        <tr>
                          <td>Specialist</td>
                          <td>:</td>
                          <td>{{$data->doctor_specialist}}</td>
                        </tr>
                        <tr>
                          <td>Degree</td>
                          <td>:</td>
                          <td>{{$data->doctor_degree}}</td>
                        </tr>
                        <tr>
                          <tr>
                            <td>Department-id</td>
                            <td>:</td>
                            <td>{{$data->department_id}}</td>
                          </tr>
                          <tr>
                          <td>Photo</td>
                          <td>:</td>
                          <td>
                            @if($data->doctor_image!='')
                            <img height="150" src="{{asset('uploads/doctor/'.$data->doctor_image)}}">
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
