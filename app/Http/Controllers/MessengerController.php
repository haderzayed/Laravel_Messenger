<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessengerController extends Controller
{
     public function index($id=null){

         $user=Auth::user();
         $friends=User::where('id','<>',$user->id)
                  ->orderBy('name')
                  ->get();

         $chats=$user->conversations()->with([
             'lastMessage',
             'participants'=>function($builder)use($user){
                $builder->where('id','<>',$user->id);
             }
         ])->get();

         $messages=[];
         $active_chat=new Conversation();
         if($id){
             $active_chat=$chats->where('id',$id)->first();
             $messages=$active_chat->messages()->with('user')->get();
         }
         return view('messenger',compact('friends','chats','messages','active_chat'));
     }
    public function friends($id=null){

        $user=Auth::user();
        $friends=User::where('id','<>',$user->id)
            ->orderBy('name')
            ->get();
        return $friends;
    }
}
