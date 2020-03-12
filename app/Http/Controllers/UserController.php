<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function store(Request $request){
        $result = User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)//agar di encryp
        ]);
        if($result){
            $data['code']=200;
            $data['result']=$result;
        }else{
            $data['code']=500;
            $data['result']='Error';
        }
        return response()->json($data);
    }

    //
}
