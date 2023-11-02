@extends('template.default')

@section('content')
<div class="container shadow p-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-nav">
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
            <li class="breadcrumb-item active">New Contact</li>
        </ol>
    </nav>
    <form action="{{ route('users.contact.store') }}" method="POST">
        @csrf
        @include('pages.new-contact.form')
    </form>
</div>

@endsection