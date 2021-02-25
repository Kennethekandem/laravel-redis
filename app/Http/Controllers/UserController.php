<?php

namespace App\Http\Controllers;

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

    public function update(Request $request, $id) {

        $update = User::findOrFail($id)->update($request->all());

//        $users = User::all();
//        Redis::set('users', $users);

//        Redis::publish('test-channel', '');

        Redis::publish('test-channel', json_encode([
            'name' => 'Adam Wathan'
        ]));

        return response()->json([
            'status_code' => 201,
            'message' => 'User updated',
            'data' => $update,
        ]);
    }

    public function delete($id) {
        User::findOrFail($id)->delete();

        $users = User::all();
        Redis::set('users', $users);

        return response()->json([
            'status_code' => 201,
            'message' => 'User deleted',
            'data' => $users,
        ]);
    }
}
