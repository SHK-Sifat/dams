<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Carbon\Carbon;
use Session;
use Auth;
use Image;

class DoctorsController extends Controller{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $all=Doctor::where('doctor_status',1)->orderBy('doctor_id','DESC')->get();
      return view('admin.doctor.all',compact('all'));
    }

    public function add(){
      return view('admin.doctor.add');
    }

    public function edit($slug){
      $data=Doctor::where('doctor_status',1)->where('doctor_slug',$slug)->firstOrFail();
      return view('admin.doctor.edit',compact('data'));
    }

    public function view($slug){
      $data=Doctor::where('doctor_status',1)->where('doctor_slug',$slug)->firstOrFail();
      return view('admin.doctor.view',compact('data'));
    }

    public function insert(Request $request){
      $this->validate($request,[
        'name'=>'required|max:100',
        'email'=>'required|max:40',
        'specialist'=>'required',
        'degree'=>'required',
        'remarks'=>'required',
      ],[
        'name.required'=>'please enter name',
        'email.required'=>'please enter email',
        'name.required'=>'please enter speciality',
        'degree.required'=>'please enter degree',
        'remarks.required'=>'please enter remarks',
      ]);

      $slug='D'.uniqid(02);
      $creator=Auth::user()->id;

      $insert=Doctor::insertGetId([
        'doctor_name'=>$request['name'],
        'doctor_phone'=>$request['phone'],
        'doctor_email'=>$request['email'],
        'doctor_specialist'=>$request['specialist'],
        'doctor_degree'=>$request['degree'],
        'doctor_remarks'=>$request['remarks'],
        'doctor_slug'=>$slug,
        'doctor_creator'=>$creator,
        'created_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($request->hasFile('pic')){
        $image=$request->file('pic');
        $imageName=$insert.time().'.'.$image->getClientOriginalExtension();
        Image::read($image)->resize(200,200)->save(base_path('public/uploads/doctor/'.$imageName));

        Doctor::where('doctor_id',$insert)->update([
          'doctor_image'=>$imageName,
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
      }

      if($insert){
        Session::flash('success','successfully add doctor information.');
        return redirect('dashboard/doctor/add');

      }else{
        Session::flash('error','Please try again.');
        return redirect('dashboard/doctor/add');
      }
    }

    public function update(Request $request){
      $this->validate($request,[
        'name'=>'required|max:100',
        'email'=>'required|max:40',
        'specialist'=>'required',
        'degree'=>'required',
        'remarks'=>'required',
      ],[
        'name.required'=>'please enter name',
        'email.required'=>'please enter email',
        'name.required'=>'please enter speciality',
        'degree.required'=>'please enter degree',
        'remarks.required'=>'please enter remarks',
      ]);

      $id=$request['id'];
      $slug=$request['slug'];
      $editor=Auth::user()->id;

      $update=Doctor::where('doctor_status',1)->where('doctor_id',$id)->update([
        'doctor_name'=>$request['name'],
        'doctor_phone'=>$request['phone'],
        'doctor_email'=>$request['email'],
        'doctor_specialist'=>$request['specialist'],
        'doctor_degree'=>$request['degree'],
        'doctor_remarks'=>$request['remarks'],
        'doctor_editor'=>$editor,
        'created_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($request->hasFile('pic')){
         $image=$request->file('pic');
         $imageName=$id.time().'.'.$image->getClientOriginalExtension();
         Image::read($image)->resize(200,200)->save(base_path('public/uploads/doctor/'.$imageName));

         Doctor::where('doctor_id',$id)->update([
           'doctor_image'=>$imageName,
           'updated_at'=>Carbon::now()->toDateTimeString(),
         ]);
       }

      if($update){
        Session::flash('success','successfully add user information.');
        return redirect('dashboard/doctor/view/'.$slug);
      }else{
        Session::flash('error','Please try again.');
        return redirect('dashboard/doctor/add/'.$slug);
      }
    }

    public function softdelete(){

    }

    public function restore(){

    }

    public function delete(){

    }
}
