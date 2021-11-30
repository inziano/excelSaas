<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Package;

class AuthController extends Controller
{
    // Login
    public function login(Request $request) {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];

        dd($request->all());

        if( Auth::attempt($credentials)) {
            // Session
            $request->session()->regenerate();

            return User::where('email', Auth::user()->email)->first();
        }

        return abort(404, 'User not found');
    }

    // Register
    public function register(Request $request) {
        // Validate
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'package_id' => 'required|integer|numeric'
        ]);

        // Amount
        $amount = Package::where('id',$request->package_id)->get()->pluck('amount');

        dd($amount);

        // Validated
        try {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);

            // Calculate subscription based on package selected, billed for 12 months
            $total = $amount * 12;

            // Create subscription for the user
            $user->subscription()->create([
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addMonths(12),
                'package_id' => $request->package_id,
            ]);

        } catch(\Exception $e){
            throw $e;
        }
    }
}
