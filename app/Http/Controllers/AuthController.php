<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        //fazer logout
        session()->forget('user');
        return redirect()->to('/login');
    }

    public function loginSubmit(Request $request)
    {
        // Validacoes
        $request->validate(
            //regras
            [
                'username' => 'required|email',
                'password' => 'required|min:6|max:16'
            ],
            //mensagens
            [
                'username.required' => 'O username é obrigatório',
                'username.email' => 'O username deve ser um email válido',
                'password.required' => 'A senha é obrigatória',
                'password.min' => 'A password deve ter no mínimo :min caracteres',
                'password.max' => 'A password deve ter no máximo :max caracteres'
            ]

        );

        $username = $request->input('username');
        $password = $request->input('password');

        // CHECK IF USER EXISTS

        $user = User::where('username', $username)
            ->where('deleted_at', null)
            ->first();
        ;
        if (!$user) {
            return redirect()->back()->withInput()->with('loginError', 'Username ou password incorretos');
        }

        // CHECK IF PASSWORD IS CORRECT
        if (!password_verify($password, $user->password)) {
            return redirect()->back()->withInput()->with('loginError', 'Username ou password incorretos');
        }

        // LOGIN
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        // Login Session
        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username

            ]
        ]);

        return redirect()->to('/');
  

    }
}
