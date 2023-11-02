@extends('template.admin')

@section('admin-breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-nav">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">New Contact</li>
    </ol>
</nav>
@endsection

@section('admin-content')
    <form action="#" method="POST">
        @csrf
        @include('admin.post.form')
    </form>
@endsection