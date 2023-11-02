<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(): View {
        $pages = Contact::orderBy('created_at', 'DESC')->paginate(10);
        return view('pages.home', compact('pages'));
    }

    public function view(Contact $view): View {
        return view('pages.view', compact('view'));
    }

    public function store(Request $request, Contact $contact) {
        $contact->create($request->all());
        return redirect()->route('users.index')->with('success_message', 'Novo contato criado!');
    }

    public function update(Request $request, Contact $contact) {
        $contact->update($request->all());
        return redirect()->route('users.index')->with('success_message', 'Contato editado com sucesso!');
    }

    public function edit(Contact $contact) {
        return view('admin.post.edit', compact('contact'));
    }
    
    public function destroy(Contact $contact) {
        $contact->delete();
        return redirect()->route('admin.index')->with('success_message', 'Contato deletado com sucesso!');
    }
}
