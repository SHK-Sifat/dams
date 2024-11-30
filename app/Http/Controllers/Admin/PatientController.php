<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use Carbon\Carbon;
use Session;
use Auth;
use Image;

class PatientController extends Controller{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $all=Patient::where('patient_status',1)->orderBy('patient_id','DESC')->get();
      return view('admin.patient.all',compact('all'));
    }

      public function add(){
      return view('admin.patient.add');
    }

    public function edit($slug){
      $data=Patient::where('patient_status',1)->where('patient_slug',$slug)->firstOrFail();
      return view('admin.patient.edit',compact('data'));
    }

    public function view($slug){
      $data=Patient::where('patient_status',1)->where('patient_slug',$slug)->firstOrFail();
      return view('admin.patient.view',compact('data'));
    }

    public function insert(Request $request){
      $this->validate($request,[
        'name'=>'required|max:100',
        'email'=>'required|max:40',
        'address'=>'required',
      ],[
        'name.required'=>'please enter name',
        'email.required'=>'please enter email',
        'address.required'=>'please enter address',
      ]);

      $slug='P'.uniqid(30);
      $creator=Auth::user()->id;

      $insert=Patient::insertGetId([
        'patient_name'=>$request['name'],
        'patient_phone'=>$request['phone'],
        'patient_email'=>$request['email'],
        'patient_address'=>$request['address'],
        'patient_remarks'=>$request['remarks'],
        'patient_slug'=>$slug,
        'patient_creator'=>$creator,
        'created_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($request->hasFile('pic')){
        $image=$request->file('pic');
        $imageName=$insert.time().'.'.$image->getClientOriginalExtension();
        Image::read($image)->resize(200,200)->save(base_path('public/uploads/patient/'.$imageName));

        Patient::where('patient_id',$insert)->update([
          'patient_image'=>$imageName,
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
      }

      if($insert){
        Session::flash('success','successfully add doctor information.');
        return redirect('dashboard/patient/add');

      }else{
        Session::flash('error','Please try again.');
        return redirect('dashboard/patient/add');
      }
    }

    public function update(Request $request){
      $this->validate($request,[
        'name'=>'required|max:100',
        'email'=>'required|max:40',
        'address'=>'required',
      ],[
        'name.required'=>'please enter name',
        'email.required'=>'please enter email',
        'address.required'=>'please enter address',
      ]);

      $id=$request['id'];
      $slug=$request['slug'];
      $editor=Auth::user()->id;

      $update=Patient::where('patient_status',1)->where('patient_id',$id)->update([
        'patient_name'=>$request['name'],
        'patient_phone'=>$request['phone'],
        'patient_email'=>$request['email'],
        'patient_address'=>$request['address'],
        'patient_remarks'=>$request['remarks'],
        'patient_editor'=>$editor,
        'created_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($request->hasFile('pic')){
         $image=$request->file('pic');
         $imageName=$id.time().'.'.$image->getClientOriginalExtension();
         Image::read($image)->resize(200,200)->save(base_path('public/uploads/patient/'.$imageName));

         Patient::where('patient_id',$id)->update([
           'patient_image'=>$imageName,
           'updated_at'=>Carbon::now()->toDateTimeString(),
         ]);
       }

      if($update){
        Session::flash('success','successfully add user information.');
        return redirect('dashboard/patient/view/'.$slug);
      }else{
        Session::flash('error','Please try again.');
        return redirect('dashboard/patient/add/'.$slug);
      }

    }

    public function softdelete(){

    }

    public function restore(){

    }

    public function delete(){

    }

}
