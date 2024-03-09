<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use Validator;


class UserController extends Controller
{
    public function index()
    {
        $user = User::all();

        if ($user->isEmpty()) {
            // If no users are found, return a custom response
            $data = [
                'status' => 404,
                'message' => 'No users found',
            ];
        } else {
            // If users are found, return them in the response
            $data = [
                'status' => 200,
                'user' => $user
            ];
        }
        
        // Return JSON response
        return response()->json($data);        
    }

    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if($validator->fails())
        {

            $data=[
                "status" => 422,
                "message"=>$validator->messages()
            ];

            return response()->json($data,422);
        }
        else
        {
            $user = new User;

            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=$request->password;

            $user->save();
            
            $data=[
                'status'=>200,
                'message'=>'Data uploaded successfully'
            ];
            return response()->json($data,200);
        }
    
    }

    public function edit(Request $request, $id)
    {

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if($validator->fails())
        {
    
            $data=[
                "status" => 422,
                "message"=>$validator->messages()
            ];
    
            return response()->json($data,422);
        }
        else
        {
            $user =User::find($id);
    
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=$request->password;
    
            $user->save();
                
            $data=[
                'status'=>200,
                'message'=>'Data updated successfully'
            ];
            return response()->json($data,200);
        }

    }

    public function delete($id)
    {
        $user = User::find($id);
        
        $user->delete();

        $data=[
            'status' => 200,
            'message' => "data deleted successfully"
        ];
        return response()->json($data, 200);        
    }
}
