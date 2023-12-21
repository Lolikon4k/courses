<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // Страница авторизации
    public function sign_in()
    {
        return view('login');
    }

    //Страница регистрации
    public function sign_up()
    {
        return view('register');
    }

    // Проверка при отправки форма авторизации
    public function sign_in_check(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        $user = $request->only("email", "password");
        if (
            Auth::attempt([
                "email" => $user["email"],
                "password" => $user["password"]
            ])
        ) {
            return redirect("/")->with("success", "");
        } else {
            return redirect()->back()->with("error", "Неверный логин или пароль!");
        }
    }

    // Проверка отправки формы при регистрации
    public function sign_up_check(Request $request)
    {
        $request->validate([
            "email" => "required|unique:users|email",
            "name" => "required",
            "password" => "required",
            "confirm_password" => "required|same:password"
        ]);
        $userInfo = $request->all();
        $user_create = User::create([
            "email" => $userInfo["email"],
            "name" => $userInfo["name"],
            "password" => Hash::make($userInfo["password"]),
            "role" => 2
        ]);
        if ($user_create) {
            return redirect("/")->with("success", "");
        } else {
            return redirect()->back()->with("error");
        }
    }

    // Выход из учетной записи
    function signout()
    {
        Session::flush();
        Auth::logout();
        return redirect("/");
    }

}
