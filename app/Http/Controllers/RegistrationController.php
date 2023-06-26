<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationFormRequest;
use App\Models\User;
use App\Models\Logs;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function registration_form()
    {
        return view('registration_form');
    }

    public function action_registration(RegistrationFormRequest $request)
    {
        $validated = $request->validated();

        $new_user =
            [
                'lastname' => $validated['lastname'],
                'firstname' => $validated['firstname'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password'])
            ];

        User::create($new_user);

        $log =
            [
                'action' => 'registration',
                'response' => 'Успех',
                'ip' => $request->ip()
            ];

        Logs::insert($log);

        $request->session()->regenerate();
        echo json_encode('success');
        exit;
    }
}
