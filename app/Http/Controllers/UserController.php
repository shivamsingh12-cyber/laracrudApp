<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    function index(){
        $users=User::all();
        return view('showdata')->with(compact('users'));
    }
    function getUserForm(){
        return view('create');
    }
    function getUpdateForm($id){
         $user=User::find($id);
        return view('update')->with(compact('user'));
    }
    function deleteUser($id){
            $user=User::findorFail($id);
            $filename=$user->filename;
            $user->delete();
            if($filename){
                Storage::disk('public')->delete('images/'.$filename);
            }
            return redirect('/');
    }
    function storeUserForm(Request $req){
        $validator=Validator::make($req->all(),[
                'fname'=>'required',
                'age'=>'required',
                'gender'=>'required',
                'city'=>'required',
                'course'=>'required',
                'image'=>'required'
        ]);
        if($validator->passes()){
            $user=new User;
            $user->fname=$req->fname;
            $user->age=$req->age;
            $user->city=$req->city;
            $user->gender=$req->gender;
            $user->course=$req->course;

            $image=$req->file('image');
            $image->storeAs('images',$image->getClientOriginalName(),'public');
            $user->filename=$image->getClientOriginalName();
            $user->save();

            return redirect('/');
        }
        else{
            return redirect('addform')->withErrors($validator)->withInput();
        }
    }
    function updateUser($id,Request $req){
        $validator=Validator::make($req->all(),[
                'fname'=>'required',
                'age'=>'required',
                'gender'=>'required',
                'city'=>'required',
                'course'=>'required',
        ]);
        $user=User::find($id);
        if($validator->passes()){
            $user->fname=$req->fname;
            $user->age=$req->age;
            $user->city=$req->city;
            $user->gender=$req->gender;
            $user->course=$req->course;
            $filename=$user->filename;
                if($req->hasFile('image')){
                  $image=$req->file('image');
            $image->storeAs('images',$image->getClientOriginalName(),'public');
            $user->filename=$image->getClientOriginalName();
            if($filename){
                Storage::disk('public')->delete('images/'.$filename);
            }
                }
          
            $user->save();

            return redirect('/');
        }
        else{
            return redirect('update/'.$user->id)->withErrors($validator)->withInput();
        }
    }
}
