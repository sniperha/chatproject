<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Message;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasApiTokens;
    public function Sender(){
        return $this->hasMany(Message::class,'Sender_id','id');
    }
    public function Recever(){
        return $this->hasMany(Message::class,'Recever_id','id');
    }
    protected $guarded=[

    ];
}
