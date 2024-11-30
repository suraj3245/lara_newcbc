<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('Admin.showLogin');
    }
    public function doLogin(Request $request)
    { 
        $credentials=$request->validate([
            'email'=>   'required | email' ,
            'password' =>'required | min:4 |max:25' ,
        ]);

        if(Auth::attempt($credentials))
        {
            return redirect()->route('admin.dashboard');
        } else {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }
        public function dashboard()
        {     

            $menus=Menu::all();
            
            return view('Admin.dashboard',compact('menus'));
        
        }
        public function logout()
        {
            Auth::logout();
            return redirect()->route('admin.showLogin');
        }
        public function changePassword()
        {
             $user=Auth::user();
             return view('Admin.password-change',compact('user'));
        }
        public function doChangePassword(Request $request)
        {
            // Validate the incoming request data
       
            try {
                // Validate the incoming request data
                $validatedData = $request->validate([
                    'user_id' => 'required', // Ensure user_id is provided and is numeric
                    'password' => 'required|min:8', // Ensure password is provided and confirmed
                ]);
            } catch (ValidationException $e) {
                // Log the validation errors
                Log::error('Validation failed: ' . $e->getMessage());
    
                // Optionally, you can return a response or redirect back with errors
                return redirect()->back()->withErrors($e->errors())->withInput();
            }
    
            // Decrypt the user ID received from the form
            $userId = decrypt($request->user_id);
        
            // Retrieve the user by ID
            $user = User::find($userId);
    
            // Check if the user exists
            if (!$user) {
                return redirect()->back()->with('error', 'User not found.'); // Redirect back with an error message
            }
    
            // Update the user's password
            $user->password = Hash::make($request->password);
            $user->save();
    
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Password changed successfully.');
        }
      
}
