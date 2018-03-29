<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        //защита от прямого входа на админ панель
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        //показываем форму входа админа
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        //Валидация формы
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ]);

        //Попытка входа пользователя
        if (Auth::guard('admin')->attempt(['email' => $request->email,
            'password' => $request->password], $request->remember)) {
            //Если успешно, то редирект на админку
            return redirect()->intended(route('admin.dashboard'));
        }

        //Если не успешно, то редирект снова на форму
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }

}
