@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <h1 style="margin-bottom: 20px;">My Projects</h1>

    <div class="projects">

        <div class="project-card" data-aos="fade-up" data-aos-delay="100">
            <img src="{{ asset('images\project1.jpg') }}" alt="Project 1" class="project-image">
            <div class="project-body">
                <div class="project-title">TaskMaster</div>
                <div class="project-description">
                    A to-do web application with user authentication, project labels, and due dates.
                </div>
                <div class="tech-stack">
                    <span class="tech">Laravel</span>
                    <span class="tech">Blade</span>
                    <span class="tech">SQLite</span>
                </div>
            </div>
        </div>

        <div class="project-card" data-aos="fade-up" data-aos-delay="200">
            <img src="{{ asset('images\project2.jpg') }}" alt="Project 2" class="project-image">
            <div class="project-body">
                <div class="project-title">HealthTrack</div>
                <div class="project-description">
                    A health and wellness tracker app that logs daily metrics like sleep, exercise, and mood.
                </div>
                <div class="tech-stack">
                    <span class="tech">Python</span>
                    <span class="tech">Django</span>
                    <span class="tech">MongoDB</span>
                </div>
            </div>
        </div>

        <div class="project-card" data-aos="fade-up" data-aos-delay="300">
            <img src="{{ asset('images\project3.jpg') }}" alt="Project 3" class="project-image">
            <div class="project-body">
                <div class="project-title">Codefolio</div>
                <div class="project-description">
                    A minimalist personal portfolio website built for fellow developers and freelancers.
                </div>
                <div class="tech-stack">
                    <span class="tech">HTML</span>
                    <span class="tech">CSS</span>
                    <span class="tech">JavaScript</span>
                </div>
            </div>
        </div>

    </div>
@endsection