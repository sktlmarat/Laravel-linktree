<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        return view('users.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'background_color' => 'required|size:7|starts-with:#',
            'text_color' => 'required|size:7|starts-with:#'

        ]);
        Auth::user()->update($request->only(['background_color', 'text_color']));
        return redirect()->back();
    }

    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);

    }
}
