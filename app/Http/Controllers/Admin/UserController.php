<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Auth;
use Image;

class UserController extends Controller{
  public function __construct(){
    $this->middleware('auth');
  }


  public function index(){
    $all_user=User::orderBy('id','DESC')->get();
    return view('admin.user.all',compact('all_user'));
  }

  public function add(){
    return view('admin.user.add');
  }

  public function edit($slug){
    $data=User::where('status',1)->where('slug',$slug)->firstOrFail();
    return view('admin.user.edit',compact('data'));
  }

  public function view($slug){
    $data=User::where('status',1)->where('slug',$slug)->firstOrFail();
    return view('admin.user.view',compact('data'));
  }

  public function insert(Request $request){
     $this->validate($request,[
       'name'=>'required|max:50',
       'email'=>'required|max:40|unique:users,email',
       'username'=>'required',
       'password'=>'required|min:8',
       'password_confirmation'=>'required_with:password|same:password|min:8',
       'role'=>'required',
     ],[
       'name.required'=>'Please enter name',
       'email.required'=>'Please enter email',
       'username.required'=>'Please enter username',
       'role.required'=>'Please select your role',
     ]);

     $slug='U'.uniqid(30);
     $insert=User::insertGetId([
       'name'=>$request['name'],
       'phone'=>$request['remarks'],
       'email'=>$request['email'],
       'username'=>$request['username'],
       'password'=>Hash::make($request['password']),
       'slug'=>$slug,
       'created_at'=>Carbon::now()->toDateTimeString(),
     ]);

     if($request->hasFile('pic')){
        $image=$request->file('pic');
        $imageName=$insert.time().'.'.$image->getClientOriginalExtension();
        Image::read($image)->resize(200,200)->save(base_path('public/uploads/user/'.$imageName));

        User::where('id',$insert)->update([
          'photo'=>$imageName,
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
      }

     if($insert){
       Session::flash('success','successfully add user information.');
       return redirect('dashboard/user/add');

     }else{
       Session::flash('error','Please try again.');
       return redirect('dashboard/user/add');
     }
  }

  public function update(Request $request){
    $this->validate($request,[
      'name'=>'required|max:50',
      'email'=>'required|max:40',
      'username'=>'required',
      'role'=>'required',
    ],[
      'name.required'=>'Please enter name',
      'email.required'=>'Please enter email',
      'username.required'=>'Please enter username',
      'role.required'=>'Please select your role',
    ]);

    $id=$request['id'];
    $slug=$request['slug'];

    $update=User::where('status',1)->where('id',$id)->update([
      'name'=>$request['name'],
      'phone'=>$request['phone'],
      'email'=>$request['email'],
      'username'=>$request['username'],
      'created_at'=>Carbon::now()->toDateTimeString(),
    ]);

    if($request->hasFile('pic')){
       $image=$request->file('pic');
       $imageName=$id.time().'.'.$image->getClientOriginalExtension();
       Image::read($image)->resize(200,200)->save(base_path('public/uploads/user/'.$imageName));

       User::where('id',$id)->update([
         'photo'=>$imageName,
         'updated_at'=>Carbon::now()->toDateTimeString(),
       ]);
     }

    if($update){
      Session::flash('success','successfully add user information.');
      return redirect('dashboard/user/view/'.$slug);
    }else{
      Session::flash('error','Please try again.');
      return redirect('dashboard/user/add/'.$slug);
    }
  }

  public function softdelete($id){
    $soft=User::where('status',1)->where('id',$id)->update([
      'status'=>0,
    ]);
    if($soft){
      Session::flash('success','successfully add user information.');
      return redirect('dashboard/user');

    }else{
      Session::flash('error','Please try again.');
      return redirect('dashboard/user');
    }
  }

  public function restore(){

  }

  public function delete(){

  }

}
