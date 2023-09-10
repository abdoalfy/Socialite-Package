<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
class SocialiteController extends Controller
{
    public function login(){
        return Socialite::driver('github')->redirect();
    }
    public function redirect(){
        
        $proivodersocialite = Socialite::driver('github')->user();
        $user=User::updateOrCreate([
            'provider_id' => $proivodersocialite->getId(),
        ],[
            'name' => $proivodersocialite->getName(),
            'email'=> $proivodersocialite->getEmail(),
        ]);
        Auth::login($user,true);
        return to_route('dashboard');
   }

         /////facebook///////

//      public function facebooklogin(){
//        return Socialite::driver('facebook')->redirect();
//      }

//        public function facebookredirect(){ 
//         $proivodersocialite = Socialite::driver('facebook')->user();
//         $user=User::updateOrCreate([
//             'provider_id' => $proivodersocialite->getId(),
//         ],[
//             'name' => $proivodersocialite->getName(),
//             'email'=> $proivodersocialite->getEmail(),
//         ]);
//         Auth::login($user,true);
//         return to_route('dashboard');
//    }

        
}
