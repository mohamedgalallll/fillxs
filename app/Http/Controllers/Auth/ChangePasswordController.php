<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function updatePassword (Request $request) {
        $this->validate($request,[
            'oldPassword' => 'required|string|min:8',
            'newPassword' => 'required|string|min:8',
        ]);
        $hashPassword = Auth::user()->password;
        if (Hash::check($request->oldPassword,$hashPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->newPassword);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success','Password Is Changed Successfully');
        } else {
            return redirect()->back()->with('error','Current Password Is Invalid');
        }

    }
}
