<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Media;

class Message extends Model
{
    public function media(){
        return $this->hasOne(Media::class,'id','media_id');
    }
    public function Sender(){
        return $this->hasOne(User::class,'id','Sender_id');
    }
    public function Recever(){
        return $this->hasOne(User::class,'id','Recever_id');
    }
    protected $guarded=[

    ];
}
