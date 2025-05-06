<?php

namespace App\Http\Controllers;

use App\Models\RTG;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::with('rtg')->get();
        return view('admin.dashboard', compact('users'));
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|in:rtg,supervisor,admin',
            'name_code' => 'required|string|size:3|unique:rtgs',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make(Str::random(16)),
        ]);

        if ($request->role === 'rtg') {
            RTG::create([
                'user_id' => $user->id,
                'name_code' => $request->name_code
            ]);
        }

        return redirect()->route('admin.dashboard')->with('success', 'User created successfully');
    }

    public function resetPassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Password reset successfully');
    }
}
