@extends('template.default')

@section('content')
<div class="container form-login-container p-4 mt-5 shadow">
    <h2 class="d-flex justify-content-center">Entrar</h2>
    @if(session()->has('error_message'))
    <div class="alert alert-danger" role="alert">
        {{ session('error_message') }}
    </div>
    @endif
    <form action="{{ route('users.login.login') }}" method="POST">
        @csrf
        <div class="form-outline mb-3">
            <input type="text" name="name" id="loginName" class="form-control" />
            <label class="form-label" for="loginName">Usuário</label>
        </div>
        <div class="form-outline mb-3">
            <input type="password" name="password" id="loginPassword" class="form-control" />
            <label class="form-label" for="loginPassword">Senha</label>
        </div>
        <button type="submit" class="btn btn-success btn-block mb-1">Entrar</button>
        <a href="{{ route('users.register.index') }}"><button type="button" class="btn btn-outline-secondary btn-block mb-1">Cadastre-se</button></a>
    </form>
</div>
@endsection