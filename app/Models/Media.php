<?php

namespace App\Models;
use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public function message(){
        return $this->hasOne(Message::class,'media_id','id');
    }
    protected $guarded=[];
}
