<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create(Request $request) {

        $username = $request->input("username");
        $email = $request->input("email");
        $password = $request->input("password");
        
        if(!empty($username) && !empty($email) && !empty($password)) {
            $user = new User();
            $user->name = $username;
            $user->email = $email;   
            $valiEmail = User::where('email', $email)->first();
            if(!empty($valiEmail['email'])) {
               return view('admin.create', [
                    "information"=> "email exist"
                   ]);  
            }
            $user->password = bcrypt($password);
            $user->save();
            return view('admin.create', [
                "information"=> "added successfully"
               ]);
        }
        return  view('admin.create', [
            "information"=> "I miss some field to fill"
        ]);  
    }
}

//echo '<script type="text/javascript">
//alert( "'.$password.'");
//</script>';
