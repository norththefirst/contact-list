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
}
