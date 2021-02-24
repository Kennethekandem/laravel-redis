<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {

        $cachedUsers = Redis::get('users');

        if($cachedUsers > 0) {
//            return view('users')->with(['users' => $cachedUsers]);
//            return response()->json($cachedUsers);
            return response()->json([
                'status_code' => 201,
                'message' => 'Fetched from redis',
                'data' => $cachedUsers,
            ]);
        }else {
            $users = User::all();
            Redis::set('users', $users);

            return response()->json([
                'status_code' => 201,
                'message' => 'Fetched from database',
                'data' => $users,
            ]);
        }
    }
}
