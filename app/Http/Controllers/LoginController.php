<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $vdfv = [1,2,3];
       
        if (Auth::attempt($credentials)) {
           
           $request->session()->regenerate();

           return redirect()->intended('admin/home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    } 
}

/*
$f= Auth::attempt($credentials);
echo '<script type="text/javascript">
console.log("'.$f.'");
</script>';

*/