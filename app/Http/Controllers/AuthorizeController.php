<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorisationFormRequest;
use App\Models\Logs;
use Illuminate\Support\Facades\Auth;

class AuthorizeController extends Controller
{
    public function authorize_form()
    {
        return view('authorize_form');
    }

    public function action_authorization(AuthorisationFormRequest $request)
    {
        $validated = $request->validated();

        $credentials =
            [
                'email' => $validated['email'],
                'password' => $validated['password']
            ];

        if (Auth::attempt($credentials, true)) {

            $log =
                [
                    'action' => 'authorization',
                    'response' => 'Успех',
                    'ip' => $request->ip()
                ];

            Logs::insert($log);
            $request->session()->regenerate();
            return redirect()->intended('home_page');
        }

        return view('authorize_form', ['error' => 'Неверный логин или пароль']);
    }
}
