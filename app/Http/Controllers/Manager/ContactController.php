<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(): View {
        $pages = Contact::orderBy('created_at', 'DESC')->paginate(10);
        return view('pages.home', compact('pages'));
    }

    public function search(Request $request): View {
        $search = $request->input('search');
        $result = Contact::where('title', 'LIKE', '%'.$search.'%')->paginate(10);
        $result->appends(['search' => $search]);
        return view('pages.search', compact('result'));
    }

    public function view(Contact $view): View {
        return view('pages.view', compact('view'));
    }

    public function store(Request $request, Contact $contact) {
        $contact->create($request->all());
        return redirect()->route('users.panel.index')->with('success_message', 'Novo post criado!');
    }

    public function update(Request $request, Contact $contact) {
        $contact->update($request->all());
        return redirect()->route('users.panel.index')->with('success_message', 'Post editado com sucesso!');
    }

    public function edit(Contact $contact) {
        return view('admin.post.edit', compact('contact'));
    }
    
    public function destroy(Contact $contact) {
        $contact->delete();
        return redirect()->route('admin.panel.index')->with('success_message', 'Post deletado com sucesso!');
    }
}
