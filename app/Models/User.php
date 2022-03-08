<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Message;

class User extends Model
{
    public function Sender(){
        return $this->hasMany(Message::class,'Sender_id','id');
    }
    public function Recever(){
        return $this->hasMany(Message::class,'Recever_id','id');
    }
    protected $guarded=[

    ];
}
