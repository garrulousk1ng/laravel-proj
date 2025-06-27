@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body auth-confirmation">
                        <div class="confirmation-message">
                            <p class="mb-0">You are logged in!</p>
                        </div>

                        <div class="go-to-blog-wrapper">
                            <a href="{{ route('posts.index') }}" class="go-to-blog-btn">
                                Go to Blog
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
