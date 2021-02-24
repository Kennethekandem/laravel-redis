<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {

        $cachedUsers = Redis::get('users');

        $users = json_decode($cachedUsers, FALSE);

        if(count($users) > 0) {
            return response()->json([
                'status_code' => 201,
                'message' => 'Fetched from redis',
                'data' => $users,
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
