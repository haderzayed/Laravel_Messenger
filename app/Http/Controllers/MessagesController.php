<?php

namespace App\Http\Controllers;

use App\Events\MessageCreated;
use App\Models\Conversation;
use App\Models\Recipient;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{

    public function index($id)
    {
        $user=Auth::user();
        $conversation=$user->conversations->findOrFail($id);
        $conversation->messages()->paginate();

    }


    public function store(Request $request)
    {
        $request->validate([
           'message'=>['required','string'],
            'conversation_id'=>[
                Rule::requiredIf(function () use ($request) {
                    return !$request->input('user_id');
                }),
                'int',
                'exists:conversations,id'
            ],
            'user_id'=>[
                Rule::requiredIf(function () use ($request) {
                    return !$request->input('conversation_id');
                }),
                'int',
                'exists:users,id'
            ]
        ]);
        $user=User::find(1);//Auth::user();
        $conversation_id=$request->post('conversation_id');
        $user_id=$request->post('user_id');

        DB::beginTransaction();
        try{
            if($conversation_id){
                $conversation=$user->conversations->findOrFail($conversation_id);
                //return conversation that user belong to
            }else{
                //in case peer conversation , return the Auth user and user_id
                $conversation=Conversation::where('type','peer')
                               ->whereHas('participants',function ($builder) use ($user_id,$user){ //whereHas assign condition in relation
                                $builder->join('participants as participants2','participants2.conversation_id','=','participants.conversation_id')
                                   ->where('participants.user_id',$user_id)
                                  ->where('participants2.user_id',$user->id);
                })->first();
                if(!$conversation){
                    $conversation=Conversation::create([
                        'user_id'=>$user->id,
                        'type'=>'peer',
                    ]);
                    $conversation->participants()->attach([
                        $user->id=>['joined_at'=>now()],
                        $user_id=>['joined_at'=>now()],
                    ]);
                }
            }

            $message = $conversation->messages()->create([
                'user_id' => $user->id,
                'body'=>$request->post('message'),
            ]);

            DB::statement('
          INSERT INTO recipients (user_id,message_id)
          SELECT user_id ,? FROM participants
          WHERE conversation_id = ?
       ',[$message->id,$conversation->id]);

            $conversation->update([
               'last_message_id'=>$message->id,
            ]);
            DB::commit();

            broadcast(new MessageCreated($message));

        }catch (Throwable $exception){
            DB::rollBack();
            throw $exception;
        }
        return $message;
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
         Recipient::where([
             'user_id'=>Auth::id(),
             'message_id'=>$id
         ])->delete();
         return[
             'message'=>'message deleted!'
         ];
    }
}
