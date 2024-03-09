<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 


class UserController extends Controller
{
    public function index()
    {
        $user = User::all();

        $data = [
            'status' => 200,
            'user' => $user
        ];
        return response()->json($data,200);
    }
}
