<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(): View {
        return view('user.login.index');
    }

    public function login(Request $request): RedirectResponse {
        $options = [
            'name' => $request->get('name'),
            'password' => $request->get('password')
        ];
        if(Auth::attempt($options)) {
            $request->session()->regenerate();
            return redirect()->route('main.index')->with('success_message', 'Login bem-sucedido!');
        } else {
            return redirect()->route('users.login.index')->with('error_message', 'Falha ao autenticar!');
        }
    }

    public function logout(Request $request): RedirectResponse {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('main.index');
    }
}
