<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Participant extends Pivot
{
    use HasFactory;

    public $timestamps=false;

    protected $casts=[
       'joined_At'=>'datetime',
    ];
    public function conversation(){

        return $this->belongsTo(Conversation::class);
    }
    public function User(){

        return $this->belongsTo(User::class);
    }
}
