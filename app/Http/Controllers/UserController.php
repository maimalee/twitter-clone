<?php

namespace App\Http\Controllers;

use App\Models\Followers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function follow($id)
    {
       $exist =  Followers::query()
            ->where('user_id', Auth::id())
            ->where('follower_id', $id)
            ->exists();
        if (!$exist){
            Followers::query()->create([
                'user_id' => Auth::id(),
                'follower_id' => $id,
                'status' => 'follow',
            ]);
            return redirect()->back();
        }
        else{
            return response()->json('you are already following this user');
        }

    }
    public function destroy($id)
    {
        $user = User::query()->find($id);
        Auth::logout($user);
        return to_route('home');
    }
}
