<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class UserController extends Controller
{
 public function login(){
    return view(admin_vw().'.login');
 }
 public function getUsers(){
   return view(admin_user_vw().'.view');
}
 public function logout()
 {
    Auth::logout();
     return redirect()->back();
 }
 public function userData(){
    $num=1;
  return datatables(User::all())
  ->addColumn('num',function() use($num){
     return $num++;
  })
  ->addColumn('action',function($user){

   return '<a href=""
   class="btn btn-outline btn-circle btn-sm purple">
   <i class="fa fa-edit"></i> 
   Edit </a>';
})
  ->toJson(); }
}
