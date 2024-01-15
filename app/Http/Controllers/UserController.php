<?php

namespace App\Http\Controllers;

use App\Models\User; // Make sure to use your User model.

class UserController extends Controller
{
    public function showUsers()
    {
        $users = User::all(); // Retrieve all users from the database.
        return view('users', ['users' => $users]); // Pass the users to the view.
    }
}
