@extends('template.default')

@section('content')
<div class="container">
    @if(session()->has('success_message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('success_message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Timestamp</th>
            </tr>
        </thead>
        @foreach ($pages as $post)

        <tbody>
            <tr>
                <td>{{ $post->name }}</td>
                <td>{{ $post->contact }}</td>
                <td>{{ $post->email }}</td>
                @if(isset(Auth::user()->name) && Auth::user()->name == $post->owner)
                    <td>
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('users.contact.edit', $post->getKey()) }}"><i class="nf nf-md-pen"></i></a>
                        <a class="btn btn-outline-danger btn-sm" onclick="if (confirm('Tem certeza que deseja deletar esse post?')) document.getElementById('delete-post-{{ $post->getKey() }}').submit();">
                            <i class="nf nf-fa-trash"></i>
                        </a>
                        <form id="delete-post-{{ $post->getKey() }}" action="{{ route('users.contact.destroy', $post->getKey()) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                @endif
            </tr>
        </tbody>
        @endforeach
    </table>
    <div class="pagination justify-content-center">
        {{ $pages->links() }}
    </div>
@endsection
