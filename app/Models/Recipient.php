<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipient extends Pivot
{
    use HasFactory ,SoftDeletes;

    public $timestamps=false;

    protected $casts=[
        'joined_At'=>'datetime',
    ];
    public function message(){

        return $this->belongsTo(Message::class);
    }
    public function User(){

        return $this->belongsTo(User::class);
    }
}
