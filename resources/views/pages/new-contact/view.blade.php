@extends('template.default')

@section('content')
<div class="container shadow p-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-nav">
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Contact Details</li>
        </ol>
    </nav>
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control" value="{{ $contact->name }}" readonly>
    </div>
    <div class="form-group">
        <label for="contact">Contato</label>
        <input type="text" name="name" class="form-control" value="{{ $contact->contact }}" readonly>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="name" class="form-control" value="{{ $contact->email }}" readonly>
    </div>
    <div class="mt-3">
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</div>

@endsection