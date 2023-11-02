<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{

    public function index(Contact $contact): View {
        return view('pages.new-contact.index', compact('contact'));
    }

    public function view(Contact $contact): View {
        return view('pages.new-contact.view', compact('contact'));
    }

    public function store(Request $request, Contact $contact) {
        $request->validate([
            'name'    => 'required',
            'contact' => 'required',
            'email'   => 'required'
        ]);

        $request['owner'] = Auth::user()->name;
        $contact->create($request->all());
        return redirect()->route('users.index')->with('success_message', 'Novo contato criado!');
    }

    public function update(Request $request, Contact $contact) {
        $contact->update($request->all());
        return redirect()->route('users.index')->with('success_message', 'Contato editado com sucesso!');
    }

    public function edit(Contact $contact) {
        return view('pages.new-contact.edit', compact('contact'));
    }
    
    public function destroy(Contact $contact) {
        $contact->delete();
        return redirect()->route('users.index')->with('success_message', 'Contato deletado com sucesso!');
    }
}
