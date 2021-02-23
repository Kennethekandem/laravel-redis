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

        if($cachedUsers > 0) {
            return view('users')->with(['users' => $cachedUsers]);
        }else {
            $users = User::all();
            Redis::set('users', $users);

            return view('users')->with(['users' => $users]);
        }
    }
}
