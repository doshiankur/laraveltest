<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userdetail;
use App\Http\Requests\UserRequest;

class UserConteroller extends Controller
{
	//User save
    function userpost(UserRequest $req){

        $validatedData = $req->validated();
        $user=new Userdetail;

        $fileName = time().'_'.$req->file('avatar')->getClientOriginalName();	
            $filePath = $req->file('avatar')->storeAs('uploads', $fileName, 'public');
            $user->strUserAvatar =$fileName;
            $user->strUserName=$req->username;
            $user->strUserEmail=$req->useremail;
            $user->dtiJoinDate=date('Y-m-d',strtotime($req->join_date));

            if($req->still_working==1){
            	$user->dtiLeavingDate=date('Y-m-d');
            }else{
            	$user->dtiLeavingDate=date('Y-m-d',strtotime($req->leaving_date));
            }            
         // dd($emp);
          $user->save();
          return redirect('userlist');
    }
    //User End here
    //User List
    function userlist(){
    	$user=new Userdetail;
    	$user_list=$user->all();//dd($user_list);
    	return view('userlist',["user_list"=>$user_list]);
    }
    //End here
    //User Delete
    function deleteUserDetail(Request $req){
        //dd($req);
        $user=new Userdetail;
        $emp_data=$user->find($req->id);//dd($emp_data); 
        $emp_data->delete();
        return redirect()->back();
    }
    //End here
}
