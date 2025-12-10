<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    use ApiResponse;
    /**
     * Authenticate the user
     */
    public function login(Request $request)
    {
        Log::info("Entrando al login", ["credenciales" => $request->all()]);
      
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required','string'],
        ]);
        
        $user = User::where('email',$request->email)->first();
 
        if (!$user || !Auth::attempt($credentials)) {
               return $this->error("Error en autenticacion");
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return $this->success('autenticacion exitosa',[
            'token' => $token,
            'user' => $user
        ]);


    }



    public function register(
        Request $request)
        {

            $credentials = $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
                'name' => 'required|string'
            ]);

            User::create([
                'email'=> $request->email,
                'password' => $request->password,
                'name' => $request->name
            ]);         

           return $this->success("registro exitoso", [
            
            'email' => $request->email
           ]);
    }

}
