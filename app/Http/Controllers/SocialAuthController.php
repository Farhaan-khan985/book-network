<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    // Redirect to provider (Google/Facebook)
    public function redirectToProvider($provider)
    {
        try {
            return Socialite::driver($provider)->redirect();
        } catch (\Exception $e) {
            dd("Error: " . $e->getMessage()); // Debugging
        }
    }

     // Handle Provider Callback (Google, Facebook, etc.)
     public function handleProviderCallback($provider)
     {
         try {
             $socialUser = Socialite::driver($provider)->user();
 
             // Check if user already exists
             $user = User::updateOrCreate(
                 ['email' => $socialUser->getEmail()],
                 [
                     'name' => $socialUser->getName(),
                     'password' => bcrypt('randompassword'), // Dummy password
                 ]
             );
 
             Auth::login($user);
             return redirect('/dashboard'); // Redirect to dashboard after login
         } catch (\Exception $e) {
             return redirect('/')->with('error', 'Login failed. Please try again.');
         }
     }
 }
