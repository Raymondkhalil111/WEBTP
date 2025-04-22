<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Show the signup form
    public function showForm()
    {
        return view('signup'); // Make sure resources/views/signup.blade.php exists
    }

    // Handle user registration
    public function register(Request $request)
    {
        // Validate input
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6',
        ]);

        // Create a new user
        $user = new User();
        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Hash the password
        $user->save();

        return "Welcome " . $user->full_name . "!"; // Use the full_name accessor
    }

    // Show user list (with optional search)
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('first_name', 'like', "%$search%")
                  ->orWhere('last_name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
        }

        $users = $query->get();
        return view('users.index', compact('users')); // Make sure this Blade view exists
    }

    // Show a single user by ID
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user')); // Make sure this Blade view exists
    }
}
