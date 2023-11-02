@extends('template.default')

@section('content')
<div class="container">
    @if(session()->has('success_message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('success_message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session()->has('error_message'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('error_message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row row-cols-1 row-cols-md-5 g-4 mb-3">
        @foreach ($pages as $item)
        <div class="col">
            <div class="card shadow">
                <a href="{{ route('main.view', $item->getKey()) }}">
                    <div class="thumb-post-blur"></div>
                    <img class="card-img-top thumb-post" src="{{ $item->img_url }}" />
                </a>
                <div class="card-body">
                    <h5 class="card-title"><a class="link-dark text-decoration-none" href="">{{ $item->title }}</a></h5>
                    <p class="card-text">{{ Str::limit($item->description, 20, '...') }}</p>
                </div>
                <div class="card-footer">
                    <p class="card-text"><small class="text-muted">{{ $item->formattedCreatedDate() }}</small></p>
                </div>    
            </div>
        </div>
        @endforeach
    </div>
    <div class="pagination justify-content-center">
        {{ $pages->links() }}
    </div>
</div>
@endsection
