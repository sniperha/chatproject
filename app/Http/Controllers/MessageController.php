<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Media;
require_once "vendor/autoload.php";
use Twilio\Rest\Client;

class MessageController extends Controller
{
    public function Message(Request $request)
    {
        $des="";
        if(!$request->media_id)
        {
            Message::create([
                'id'=>$request->id,
                'Sender_id'=>$request->Sender_id,
                'Recever_id'=>$request->Recever_id,
                
                'content'=>$request->content
            ]);
        }
        else{
        $input=$request->all();
        if($request->hasFile('media')){
            $file=$request->file('media');
            $new_file=time().$file->getClientOriginalName();
            switch($request->type){
            case 'video':
                $des='storage/message/video';break;
                case 'image':
                $des='storage/message/image';break;
                case 'voice':
                $des='storage/message/voice';break;
                default:
                break;
            }
            $path = $request->file('media')->move($des, $new_file);
            $input['media']=$new_file;
            
        }
        Message::create([
            'id'=>$request->id,
            'Sender_id'=>$request->Sender_id,
            'Recever_id'=>$request->Recever_id,
            'media_id'=>$request->media_id,
            'content'=>$request->content,
            
        ]);
        Media::create([
            'id'=>$request->media_id,
            'type'=>$request->type,
            'url'=>$des.'/'.$new_file
            


        ]);
    }




    }
    public function DeleteMessage($id){
        Message::find($id)->delete();}
        
        public function EditMessage($id,Request $request){
            $message=Message::find($id);
            $message->message=$request->message;
            $message->save();
        }
        public function getallmessage(){
            $o=[];
            foreach (Message::all() as $key) {
                $o=[$key,$key->Sender,$key->Recever];
                # code...
            }
            return $o;
        }
        public function voicecall(){
           

        }
    //
}
