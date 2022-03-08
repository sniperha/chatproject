<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Validator;
use Auth;

class UserController extends Controller
{
     public function AddUser(Request $request)
    {
        $input=$request->all();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $new_file=time().$file->getClientOriginalName();
            $path = $request->file('image')->move('storage/user_image', $new_file);
            $input['image']=$new_file;
            
        }
        User::create([
            "id"=>$request->id,
            "name"=>$request->name,
            "email"=>$request->email,
            "number"=>$request->number,
            "password"=>$request->password,
            "birthdate"=>$request->birthdate,
            'image'=>'/storage/user_image/'.$new_file

            


        ]);

        
    }
    public function deleteUser($id){
        User::find($id)->delete();
        

    }
    public function update(Request $request){
        $user=User::find($request->id);
        $user->name=$request->name;
        $user->birthdate=$request->birthdate;
        $user->number=$request->number;
        $user->password=$request->password;
        $user->save();
    }
    public function getalluser()
    {
    return User::all();

    
    
}    
public function login(Request $request){
    $this->validate($request,[
        'email'=>'required|email',
        'password'=>'required|alphaNum|min:3'
    ]);
    $user_data=[
        'email'=>$request->get('email'),
        'password'=>$request->get('password'),
    ];
    
    if(Auth::attempt($user_data)){
        return view("<p>okay</p>");
    }
    // foreach(User::all() as $user1){
    //     if($user->email==$user_data['email']&&$user->password==$user_data['password']){
    //         return "good";
    //     }
    // }

}
    //
}
