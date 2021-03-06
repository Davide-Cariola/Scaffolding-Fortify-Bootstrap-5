<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider(){
        return Socialite::driver('google')->stateless()->redirect();
    }
    

    public function handleProviderCallback(){
        try{
            $user = Socialite::driver('google')->user();
        
            $finduser = User::where('google_id', $user->id)->first();
    
            if($finduser){
    
                Auth::login($finduser);

                return redirect('/');
    
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);

                Auth::login($newUser);
    
                return redirect('/');
            }

            } catch (Exception $e) {
                dd($e->getMessage());
            }
        }
}

    

