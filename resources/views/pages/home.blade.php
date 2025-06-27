@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="noscroll">
        <div class="home-wrapper">
            <div class="profile-container" data-aos="fade-up">
                <img src="{{ asset('images/D1Fj2uEU8AEcbnh.jpg') }}" alt="Profile photo">
            </div>

            <div class="intro-container" data-aos="fade-up" data-aos-delay="100">
                <h1>Hi, I'm Charles</h1>
                <p>
                    I'm a passionate Computer Science undergraduate at Bicol University. I enjoy building sleek web applications, automating tasks, and solving logical problems with code. Currently exploring Laravel, API development, and front-end design.
                </p>
                <div class="skills">
                    <div class="skill-badge">C</div>
                    <div class="skill-badge">C++</div>
                    <div class="skill-badge">Java</div>
                    <div class="skill-badge">Python</div>
                    <div class="skill-badge">HTML & CSS</div>
                    <div class="skill-badge">JavaScript</div>
                    <div class="skill-badge">MySQL</div>
                    <div class="skill-badge">SQLite</div>
                    <div class="skill-badge">VS Code</div>
                    <div class="skill-badge">Git & GitHub</div>
                    <div class="skill-badge">Laravel</div>
                    <div class="skill-badge">NetBeans</div>
                </div>
            </div>
        </div>
    </div>
@endsection
