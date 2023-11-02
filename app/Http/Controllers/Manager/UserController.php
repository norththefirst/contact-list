<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('user.register.index');
    }

    public function create(Request $request, User $users) {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required'
        ]);
        $users->create($request->all());
        return redirect()->route('main.index')->with('success_message', 'Usuário cadastrado com sucesso!');
    }
}
