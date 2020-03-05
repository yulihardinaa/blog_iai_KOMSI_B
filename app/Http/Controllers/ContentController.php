<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Content;

class ContentController extends Controller
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
        $result = Content::create([
            'title'=> $request->title,
            'text'=>$request->text
        ]);
        if($result){
            $data['code']=200;
            $data['result']=$result;
        }else{
            $data['code']=500;
            $data['result']='Error';
        }
        return response($data);
    }

    public function index(){
        $result = Content::all();

        if($result){
            $data['code'] = 200;//artinya sukses
            $data['result']=$result;
        }else{
            $data['code']=500;
            $data['result']='error';

        }
        return response()->json($data);
        
    }

    public function show($id){
        // $result = content::find($id);
        $result = content::where('id_content',$id)->first();
        
        if($result){
            $data['code'] = 200;//artinya sukses
            $data['result']=$result;
        }else{
            $data['code']=500;
            $data['result']='error';

        }
        return response()->json($data);//membuat nampilin lagi pada get

    }
    public function update(Request $request,$id){
        $result = content::where('id_content',$id)->first();

        $result->title = $request->title;
        $result->text = $request->text;

        if($result->save()){
            $data['code'] = 200;//artinya sukses
            $data['result']=$result;
        }else{
            $data['code']=500;
            $data['result']='error';

        }
        return response($data);
        
    }
    public function destroy($id){
        $result = content::find($id);
        if($result->delete()){
            $data['code'] = 200;
            $data['result']='Content has been deleted.';
        }else{
            $data['code']= 500;
            $data['result']='Error';
        }
        return response()->json($data);
    }

    //
}
