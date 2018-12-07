<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Контроллер пользователей
 */
class UsersController extends Controller
{
    /**
     * Выводит страницу текущего пользователя
     */
    public function me(Request $request)
    {
        return redirect()->to('/users/' . $request->user()->id);
    }

    /**
     * Выводит страницу конкретного поьльзователя
     */
    public function user(\App\User $user)
    {
        return view('user')
                ->withUser($user)
                ->withCurrentUser(Auth::user());
    }

    /**
     * Выводит список пользователей
     */
    public function users(Request $request)
    {
        return view('users')->withUsers(\App\User::all());
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $newUser = new \App\User();
        $newUser->name = $request->input('username');
        $newUser->email = $request->input('email');
        $newUser->password = \Hash::make($request->input('password'));
        $newUser->save();

        return back();
    }

    /**
     * Удаляет пользователя
     */
    public function destroy(\App\User $user)
    {
        $user->delete();

        return back();
    }
}
