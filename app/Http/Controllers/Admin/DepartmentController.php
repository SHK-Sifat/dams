<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Carbon\Carbon;
use Session;
use Auth;

class DepartmentController extends Controller{
      public function __construct(){
        $this->middleware('auth');
      }

      public function index(){
        $all=Department::where('department_status',1)->orderBy('department_id','DESC')->get();
        return view('admin.department.all',compact('all'));
      }

      public function add(){
        return view('admin.department.add');
      }

      public function edit($slug){
        $data=Department::where('department_status',1)->where('department_slug',$slug)->firstOrFail();
        return view('admin.department.edit',compact('data'));
      }

      public function view($slug){
        $data=Department::where('department_status',1)->where('department_slug',$slug)->firstOrFail();
        return view('admin.department.view',compact('data'));
      }

      public function insert(Request $request){
        $this->validate($request,[
          'name'=>'required|max:100'
        ],[
          'name.required'=>'please enter department name'
        ]);

        $slug='D'.uniqid(30);
        $creator=Auth::user()->id;

        $insert=Department::insert([
          'department_name'=>$request['name'],
          'department_remarks'=>$request['remarks'],
          'department_creator'=>$creator,
          'department_slug'=>$slug,
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
          Session::flash('success','successfully add department information.');
          return redirect('dashboard/department/add');

        }else{
          Session::flash('error','Please try again.');
          return redirect('dashboard/department/add');
        }
      }



      public function update(Request $request){
        $this->validate($request,[
          'name'=>'required|max:100'
        ],[
          'name.required'=>'please enter department name'
        ]);

        $id=$request['id'];
        $slug=$request['slug'];
        $editor=Auth::user()->id;

        $update=Department::where('department_status',1)->where('department_id',$id)->update([
          'department_name'=>$request['name'],
          'department_remarks'=>$request['remarks'],
          'department_editor'=>$editor,
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($update){
          Session::flash('success','successfully add department information.');
          return redirect('dashboard/department/add');

        }else{
          Session::flash('error','Please try again.');
          return redirect('dashboard/department/add');
        }

      }

      public function softdelete(){

      }

      public function restore(){

      }

      public function delete(){

      }
}
