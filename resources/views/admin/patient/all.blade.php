@extends('layouts.admin')
@section('content')
  <div class="row">
      <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-8 card_title_part">
                      <i class="fab fa-gg-circle"></i>All Patient Information
                  </div>
                  <div class="col-md-4 card_button_part">
                      <a href="{{url('dashboard/patient/add')}}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Patient</a>
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
                    <th>Address</th>
                    <th>Remarks</th>
                    <th>Photo</th>
                    <th>Manage</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($all as $data)
                  <tr>
                    <td>{{$data->patient_name}}</td>
                    <td>{{$data->patient_phone}}</td>
                    <td>{{$data->patient_email}}</td>
                    <td>{{$data->patient_address}}</td>
                    <td>{{$data->patient_remarks}}</td>
                    <td>
                      @if($data->patient_image!='')
                      <img height="50" src="{{asset('uploads/patient/'.$data->patient_image)}}">
                      @else
                      <img height="50" src="{{asset('contents/admin/images/')}}/avatar.png">
                      @endif
                    </td>
                    <td>
                        <div class="btn-group btn_group_manage" role="group">
                          <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('dashboard/patient/view/'.$data->patient_slug)}}">View</a></li>
                            <li><a class="dropdown-item" href="{{url('dashboard/patient/edit/'.$data->patient_slug)}}">Edit</a></li>
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
