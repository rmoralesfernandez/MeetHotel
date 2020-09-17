<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class user extends Model
{
    protected $table = 'users';
    protected $fillable = ['id','name','password','email', 'photo','description', 'age', 'gender'];

    public function create($request){
        $user = new User;
        $user->gender = $request->gender;
        //storage
        $check_photo = ($request->photo);
        $user->age = $request->age;
        $user->email = $request->email;
        $user->password = encrypt($request->password);
        $user->description = $request->description;
        $user->name = $request->nume;

        
        /*
        if(isset($check_photo)){
            //storage
            $user->photo = ($request->photo);
        }else{ 
             $user->photo = "fotoprueba.png";        
        }
        */
       // var_dump($request->photo);exit;
        if ($check_photo != NULL)
            {
                    //putFileAs(carpeta donde se guarda, la foto, nombre con el que se guarda)
                $photo = Storage::putFileAs('public/Users', new File($request->photo), "$user->email.jpg");
                $user->photo = $photo;
            }
        $user->save();
    }

}
