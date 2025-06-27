<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">


    @php
        $theme = session('theme', 'light');
    @endphp

    <style>
        :root {
        --bg-light: linear-gradient(to bottom right, #f0f4f8, #0077cc);
        --bg-dark: linear-gradient(to bottom right, rgb(6, 40, 104), #1c1f24);
        --text-light: #333;
        --text-dark: #f1f1f1;
        --container-bg-light:rgba(238, 238, 238, 0.8);
        --container-bg-dark:rgb(56, 55, 55);
        --shadow-light: 0 4px 12px rgba(0, 0, 0, 0.05);
        --shadow-dark: 0 4px 12px rgba(255, 255, 255, 0.04);
        }

        nav {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            gap: 30px;
        }

        nav a {
            color: inherit;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        nav a:hover {
            color: #0077cc;
        }

        .theme-toggle {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 0.9rem;
        }

        .theme-toggle a {
            padding: 6px 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            text-decoration: none;
            color: inherit;
            background: transparent;
            transition: background 0.2s;
        }

        .theme-toggle a:hover {
            background: #0077cc22;
        }

        .centered-layout {
            min-height: calc(100vh - 100px);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .noscroll {
            height: 85vh;
            overflow: hidden;
        }

        .ripple {
            position: relative;
            overflow: hidden;
        }

        .ripple-effect {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            animation: ripple-animation 0.6s linear;
            transform: scale(0);
            pointer-events: none;
        }

        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        /* Home Page */
        .profile-image:hover {
            transform: scale(1.05);
            box-shadow: 0 0 18px rgba(100, 100, 255, 0.3); /* soft bluish glow */
        }

        .intro-container {
            max-width: 700px;
        }

        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }

        .skill-badge {
            background: #0077cc10;
            color: #0077cc;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 0.95rem;
            font-weight: 500;
        }

        button, a.button, .link {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        button:hover, a.button:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 12px rgba(0, 0, 0, 0.15);
        }

        button:active, a.button:active {
            transform: scale(0.98);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        /* Project Page */
        .projects {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-top: 20px;
        }

        .project-card {
            background: #f9f9f9;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.04);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.12);
        }

        .project-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .project-body {
            padding: 15px;
        }

        .project-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #222;
            margin-bottom: 8px;
        }

        .project-description {
            font-size: 0.95rem;
            color: #555;
            margin-bottom: 10px;
        }

        .tech-stack {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .tech {
            background: #0077cc15;
            color: #0077cc;
            padding: 5px 10px;
            border-radius: 14px;
            font-size: 0.85rem;
        }

        /* Contact Page Styles */
        .contact-section {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            margin-top: 20px;
        }

        .contact-info, .contact-form {
            flex: 1;
            min-width: 280px;
        }

        .contact-info p {
            margin-bottom: 10px;
            font-size: 1rem;
            color: #444;
        }

        .contact-info a {
            color: #0077cc;
            text-decoration: none;
        }

        .contact-info a:hover {
            text-decoration: underline;
        }

        .contact-form form {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .contact-form input, .contact-form textarea {
            padding: 10px;
            transition: all 0.3s ease;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            resize: none;
        }

        .contact-form input:focus, .contact-form textarea:focus {
            border-color: #6699ff;
            box-shadow: 0 0 5px rgba(102,153,255,0.3);
            outline: none;
        }

        .contact-form button {
            background: #0077cc;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            cursor: not-allowed;
            opacity: 0.6;
        }

        /* Error Page */
        .error-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            text-align: center;
            background: var(--bg-gradient-light);
        }

        .error-box {
            background: var(--container-bg-light);
            color: var(--text-light);
            padding: 40px;
            border-radius: 16px;
            box-shadow: var(--shadow-light);
            transition: all 0.3s ease;
        }

        .error-title {
            font-size: 5rem;
            margin-bottom: 0.5rem;
            color: #2d2d2d;
        }

        .error-message {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }

        .error-button {
            display: inline-block;
            background: #2d2d2d;
            color: #fff;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 500;
            transition: background 0.3s ease, transform 0.2s ease;
            text-decoration: none;
        }

        .error-button:hover {
            transform: scale(1.05);
            background: #0077cc;
        }

        /* Responsive Styles */

        @media (max-width: 600px) {
            .hero {
                flex-direction: column;
                align-items: flex-start;
                text-align: center;
            }

            .hero-text {
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            nav {
                flex-direction: column;
                gap: 10px;
            }

            .container {
                padding: 20px;
            }

            .projects {
                grid-template-columns: 1fr;
            }
        }
    </style>

    @if ($theme === 'dark')
        <style>
            body {
                font-family: 'Segoe UI', sans-serif;
                background: var(--bg-dark);
                color: var(--text-dark);
                line-height: 1.6;
                padding: 20px;
                transition: all 0.3s ease;
            }
            .container {
                max-width: 900px;
                margin: auto;
                padding: 20px;
                background: var(--container-bg-dark);
                border-radius: 12px;
                box-shadow: var(--shadow-dark);
            }

            .home-wrapper {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                min-height: calc(100vh - 100px);
                padding: 20px;
                text-align: center;
                gap: 25px;
            }

            .profile-container img {
                width: 180px;
                height: 180px;
                object-fit: cover;
                border-radius: 50%;
                border: 3px solid transparent;
                box-shadow: 0 0 12px rgba(255, 255, 255, 0.15);
                transition: box-shadow 0.3s ease, border 0.3s ease;
            }

            .profile-container img:hover {
                box-shadow: 0 0 18px rgba(180, 180, 255, 0.3);
            }

            .intro-container h1 {
                font-size: 2rem;
                margin-bottom: 10px;
                color: #f1f1f1;
            }

            .intro-container p {
                color: #d0d0d0;
                font-size: 1rem;
                line-height: 1.6;
                margin-bottom: 20px;
            }

            .skill-badge {
                display: inline-block;
                background: #f1f1f1;
                color: #0077cc;
                padding: 6px 12px;
                border-radius: 20px;
                font-size: 0.85rem;
                margin: 5px;
                box-shadow: 0 0 5px rgba(255, 255, 255, 0.1);
                transition: background 0.3s, color 0.3s;
            }

            .contact-info p, .contact-info a {
                color: #f1f1f1 ;
            }
        </style>
    @else
        <style>
            body {
                font-family: 'Segoe UI', sans-serif;
                background: var(--bg-light);
                color: var(--text-light);
                line-height: 1.6;
                padding: 20px;
                transition: all 0.3s ease;
            }
            .container {
                max-width: 900px;
                margin: auto;
                padding: 20px;
                background: var(--container-bg-light);
                border-radius: 12px;
                box-shadow: var(--shadow-light);
            }

            .home-wrapper {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                min-height: calc(100vh - 100px);
                padding: 20px;
                text-align: center;
                gap: 25px;
            }

            .profile-container img {
                width: 180px;
                height: 180px;
                object-fit: cover;
                border-radius: 50%;
                border: 3px solid transparent;
                box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
                transition: box-shadow 0.3s ease, border 0.3s ease;
            }

            .profile-container img:hover {
                box-shadow: 0 0 18px rgba(32, 32, 207, 0.3);
            }

            .intro-container h1 {
                font-size: 2rem;
                margin-bottom: 10px;
                color: #222;
            }

            .intro-container p {
                color: #333;
                font-size: 1rem;
                line-height: 1.6;
                margin-bottom: 20px;
            }

            .skill-badge {
                display: inline-block;
                background:rgb(225, 225, 225);
                color: #0077cc;
                padding: 6px 12px;
                border-radius: 20px;
                font-size: 0.85rem;
                margin: 5px;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.05);
                transition: background 0.3s, color 0.3s;
            }

            .contact-info p, .contact-info a {
                color: #0077cc;
            }
        </style>
    @endif

</head>
<body>
    <div>
        <nav>
            <a href="{{route('home')}}">Home</a>
            <a href="{{route('projects')}}">Projects</a>
            <a href="{{route('contact')}}">Contact</a>
        </nav>
        @yield('content')
    </div>
    <div class="theme-toggle">
        <a href="{{ route('theme.toggle') }}">
            Switch to {{ $theme === 'light' ? 'Dark' : 'Light' }} Mode
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
        });

        document.querySelectorAll('.ripple').forEach(button => {
            button.addEventListener('click', function (e) {
                const circle = document.createElement('span');
                const diameter = Math.max(button.clientWidth, button.clientHeight);
                const radius = diameter / 2;

                circle.style.width = circle.style.height = `${diameter}px`;
                circle.style.left = `${e.clientX - button.offsetLeft - radius}px`;
                circle.style.top = `${e.clientY - button.offsetTop - radius}px`;
                circle.classList.add('ripple-effect');

                const ripple = button.getElementsByClassName('ripple-effect')[0];
                if (ripple) ripple.remove();
                button.appendChild(circle);
            });
        });
    </script>

</body>