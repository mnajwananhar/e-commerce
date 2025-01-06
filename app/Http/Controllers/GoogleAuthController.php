<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    // Redirect ke Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback dari Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Cari user berdasarkan Google ID atau email
            $user = User::where('google_id', $googleUser->id)->orWhere('email', $googleUser->email)->first();

            // Jika user tidak ditemukan, buat user baru
            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => bcrypt('default-password'), // Optional, tidak digunakan untuk login Google
                ]);
            }

            // Login user
            Auth::login($user);

            return redirect()->route('dashboard'); // Redirect ke halaman dashboard setelah login
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['error' => 'Gagal login dengan Google.']);
        }
    }
}
