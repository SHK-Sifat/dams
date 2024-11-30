@extends('layouts.admin')
@section('content')
  <div class="row">
      <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_title_part">
                      <i class="fab fa-gg-circle"></i>All Doctor Information
                  </div>
                  <div class="col-md-4 card_button_part">
                      <a href="{{url('dashboard/doctor/add')}}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Doctor</a>
                  </div>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped table-hover custom_table">
                <thead class="table-dark">
                  <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Specialist</th>
                    <th>Degree</th>
                    <th>Photo</th>
                    <th>Manage</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($all as $data)
                  <tr>
                    <td>{{$data->doctor_name}}</td>
                    <td>{{$data->doctor_phone}}</td>
                    <td>{{$data->doctor_email}}</td>
                    <td>{{$data->doctor_specialist}}</td>
                    <td>{{$data->doctor_degree}}</td>
                    <td>
                      @if($data->doctor_image!='')
                      <img height="50" src="{{asset('uploads/doctor/'.$data->doctor_image)}}">
                      @else
                      <img height="50" src="{{asset('contents/admin/images/')}}/avatar.png">
                      @endif
                    </td>
                    <td>
                        <div class="btn-group btn_group_manage" role="group">
                          <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('dashboard/doctor/view/'.$data->doctor_slug)}}">View</a></li>
                            <li><a class="dropdown-item" href="{{url('dashboard/doctor/edit/'.$data->doctor_slug)}}">Edit</a></li>
                            <li><a class="dropdown-item" href="#">Delete</a></li>
                          </ul>
                        </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
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
