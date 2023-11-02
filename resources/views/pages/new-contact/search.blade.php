@extends('template.default')

@section('admin-breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-nav">
        <li class="breadcrumb-item"><a href="{{ route('users.panel.index') }}">Home</a></li>
        <li class="breadcrumb-item active">Search Result</li>
    </ol>
</nav>
@endsection

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
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Timestamp</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach ($result as $post)
        <tbody>
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->name }}</td>
                <td>{{ $post->contact }}</td>
                <td>{{ $post->email }}</td>
                <td>
                    <a class="btn btn-outline-primary btn-sm" href="{{ route('users.panel.contact.edit', $post->getKey()) }}"><i class="nf nf-md-pen"></i></a>
                    <a class="btn btn-outline-danger btn-sm" onclick="if (confirm('Tem certeza que deseja deletar esse post?')) document.getElementById('delete-post-{{ $post->getKey() }}').submit();">
                        <i class="nf nf-fa-trash"></i>
                    </a>
                    <form id="delete-post-{{ $post->getKey() }}" action="{{ route('users.panel.contact.destroy', $post->getKey()) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <div class="pagination justify-content-center">
        {{ $result->links() }}
    </div>
@endsection