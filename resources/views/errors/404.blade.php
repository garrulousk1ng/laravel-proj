@extends('layouts.app')

@section('content')
<div class="error-container">
    <div class="error-box" data-aos="zoom-in">
        <h1 class="error-title">404</h1>
        <p class="error-message">Oops! The page you're looking for doesn't exist.</p>
        <a href="{{ route('home') }}" class="error-button ripple">Go Back Home</a>
    </div>
</div>
@endsection