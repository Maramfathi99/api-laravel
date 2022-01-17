<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use http\Env\Response;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function access_token(Request $request){
      $proxy = Request::create(
        'oauth/token',
        'POST',
      );
      return Route::dispatch($proxy);
    }
    public function refresh_token(Request $request){
        $proxy = Request::create(
            'oauth/token',
            'POST',
        );
        return Route::dispatch($proxy);
    }
    public function getUser($user_id =null)
    {
        if(isset($user_id))
       $user = User::find($user_id);
        else
        $user= auth()->user();
        return Response()->json(['status'=>true,'Message'=>trans('admin.success'),'items'=>$user]);

    }
   public function  postUser(Request $request){

       $val=Validator::make($request->all(),[
           'fname' => 'required',
           'lname' => 'required',
           'phone' => 'required',
           'hire_date' => 'required|date',
           'salary' => 'required|numeric',
           'commission_pct' => 'required|numeric',
           'department_id' => 'required|exists:departments,id',
           'job_id' => 'required|exists:departments,id',
           'email' => 'required|email|unique:users,email',
           'password' => 'required|min:6',

           ]);
       if ($val->fails()){
           return Response()->json(['status'=>false,'Message'=>trans('admin.error'),'items'=>$val->errors()]);
       }

       $user =new User();

       $user->fname=$request->get('fname');
       $user->lname=$request->get('lname');
       $user->phone=$request->get('phone');
       $user->hire_date=$request->get('hire_date');
       $user->salary=$request->get('salary');
       $user->commission_pct=$request->get('commission_pct');
       $user->manager_id=$request->get('manager_id');
       $user->department_id=$request->get('department_id');
       $user->job_id=$request->get('job_id');
       $user->email=$request->get('email');
       $user->password=bcrypt( $request->get('password'));
$user->save();
       return Response()->json(['status'=>true,'Message'=>trans('admin.success'),'items'=>$user]);
    }
    public function  putUser(Request $request){

        $val=Validator::make($request->all(),[
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'hire_date' => 'required|date',
            'salary' => 'required|numeric',
            'commission_pct' => 'required|numeric',
            'department_id' => 'required|exists:departments,id',
            'job_id' => 'required|exists:jobs,id',
            'email' => 'required|email|unique:users,email,'. auth()->user()->id,
            'password' => 'required|min:6',

        ]);
        if ($val->fails()){
            return Response()->json(['status'=>false,'Message'=>trans('admin.error'),'items'=>$val->errors()]);
        }
        $user = User::find(auth()->user()->id);
        $user->fname=$request->get('fname');
        $user->lname=$request->get('lname');
        $user->phone=$request->get('phone');
        $user->hire_date=$request->get('hire_date');
        $user->salary=$request->get('salary');
        $user->commission_pct=$request->get('commission_pct');
        $user->manager_id=$request->get('manager_id');
        $user->department_id=$request->get('department_id');
        $user->job_id=$request->get('job_id');
        $user->email=$request->get('email');
        $user->password=bcrypt( $request->get('password'));
        $user->save();
        return Response()->json(['status'=>true,'Message'=>trans('admin.success'),'items'=>$user]);
    }
    public function  deleteUser(Request $request ){
        $user = User::find($request->get('user_id'));
        if (isset($user)){
            $user->delete();
            return Response()->json(['status'=>true,'Message'=>trans('admin.success')]);
        }
        return Response()->json(['status'=>false,'Message'=>trans('admin.error')]);
    }
}
