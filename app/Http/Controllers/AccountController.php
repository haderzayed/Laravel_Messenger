<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

   public function update(Request $request){
       $user=Auth::user();
       $user->update($request->all());
       toastr()->success('Account updated succssuffly');
       return redirect()->back();
   }
    public function changePassword(Request $request)
    {

      $request->validate([
           'current_password' => ['required', new MatchOldPassword],
            'password' => ['required'],
            'password_confirmation' => ['required'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password)]);

        toastr()->success('Password change successfully.');
        return redirect()->back();
    }
}
