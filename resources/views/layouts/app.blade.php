<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- Theme persistence (prevents flicker) --}}
    <script>
        const savedTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-theme', savedTheme);
    </script>

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4a90e2;
            --primary-light: #7bb3f3;
            --primary-dark: #2f6db5;

            --bg-light: #f9f9f9;
            --bg-dark: #1f1f1f;

            --container-light: #ffffff;
            --container-dark: #2a2a2a;

            --text-light: #2a2a2a;
            --text-dark: #e0e0e0;

            --muted: #999999;
            --highlight: #d8ecff;

            --error: #e74c3c;
            --error-dark: #c0392b;

            --transition: 0.3s ease-in-out;
        }

        [data-theme="light"] {
            --bg: var(--bg-light);
            --text: var(--text-light);
            --container: var(--container-light);
        }

        [data-theme="dark"] {
            --bg: var(--bg-dark);
            --text: var(--text-dark);
            --container: var(--container-dark);
        }

        *, *::before, *::after {
            box-sizing: border-box;
        }

        html, body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.7;
            padding: 40px 20px;
            margin: 0;
            transition: background var(--transition), color var(--transition);
            min-height: 100vh;
        }

        a {
            color: var(--primary);
            text-decoration: none;
            transition: all var(--transition);
        }

        h1, h2, h3 {
            margin-bottom: 1rem;
        }

        h1 a, h2 a , .navbar-brand{
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s ease-in-out;
        }

        h1 a:hover, h2 a:hover {
            text-shadow: 0 0 8px rgba(74, 144, 226, 0.5);
            transform: translateY(-2px);
        }

        .auth-confirmation {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 150px;
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .confirmation-message {
            text-align: center;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        .go-to-blog-wrapper {
            display: flex;
            justify-content: center;
        }

        .go-to-blog-btn {
            padding: 10px 18px;
            background-color: var(--primary);
            color: #fff;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
        }

        .go-to-blog-btn:hover {
            background-color: #3378d4;
            transform: translateY(-2px);
        }

        .navbar {
            background: var(--container);
            color: var(--text);
            border-bottom: 1px solid var(--highlight);
        }

        .navbar .navbar-brand {
            font-weight: 700;
            color: var(--text);
            transition: color var(--transition);
            font-size: 1.25rem;
        }

        .navbar .nav-link {
            color: var(--text);
            transition: color var(--transition);
            font-weight: 500;
        }

        .navbar .nav-link:hover {
            color: var(--primary);
            text-shadow: 0 0 6px rgba(74, 144, 226, 0.4);
        }

        .container, .navbar{
            max-width: 1000px;
            margin: 0 auto;
            background: var(--container);
            padding: 3rem;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            transition: background var(--transition), box-shadow var(--transition);
        }

        .header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .action-group {
            display: flex;
            gap: 0.75rem;
            align-items: center;
            margin-top: 1rem;
        }

        .action-btn {
            display: inline-block;
            padding: 0.5rem 0.9rem;
            background: var(--primary);
            color: white;
            font-weight: 600;
            font-size: 0.95rem;
            border-radius: 10px;
            transition: background var(--transition), transform var(--transition);
            text-decoration: none;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.07);
        }

        .action-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .action-btn.delete {
            background: var(--error);
        }

        .action-btn.delete:hover {
            background: var(--error-dark);
        }

        .inline-form {
            display: inline;
        }

        .post-card {
            background: var(--container);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
            transition: background var(--transition), box-shadow var(--transition);
        }

        .post-card:hover {
            box-shadow: 0 8px 24px rgba(74, 144, 226, 0.15);
            background: var(--highlight);
        }

        .post-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .read-more {
            font-weight: 600;
            color: var(--primary);
            transition: all 0.2s ease-in-out;
        }

        .read-more:hover {
            text-shadow: 0 0 6px rgba(74, 144, 226, 0.6);
            transform: translateY(-2px);
        }

        label {
            display: block;
            margin: 1.5rem 0 0.5rem;
            font-weight: 500;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 0.85rem;
            border: 1px solid #ccc;
            border-radius: 10px;
            background: #fff;
            transition: all var(--transition);
            font-size: 1rem;
        }

        input[type="text"]:focus, textarea:focus {
            border-color: var(--primary);
            outline: none;
        }

        textarea {
            resize: vertical;
            min-height: 140px;
        }

        button {
            margin-top: 1.2rem;
            padding: 0.8rem 1.6rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: background var(--transition), transform var(--transition);
        }

        button:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            transform: scale(1.03);
        }

        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 14px;
            font-size: 14px;
            background: transparent;
            border: 2px solid var(--primary);
            border-radius: 8px;
            color: var(--text);
            cursor: pointer;
            transition: all var(--transition);
        }

        .theme-toggle:hover {
            background: var(--primary);
            color: #fff;
        }

        .flash-message {
            margin-bottom: 2rem;
            padding: 1rem 1.25rem;
            background: #e6f7ff;
            border-left: 4px solid var(--primary);
            color: #1c3c5d;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        @media (max-width: 768px) {
            .container {
                padding: 1.5rem;
            }

            h1 {
                font-size: 2rem;
            }

            .theme-toggle {
                top: 10px;
                right: 10px;
            }

            .header-bar {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .navbar {
                padding: 0.4rem 1rem;
            }

            .navbar-brand {
                font-size: 1.1rem;
            }

            .action-group {
                flex-direction: column;
                align-items: flex-end;
                width: 100%;
            }

            button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<body>
    <div id="app">
        @if (!Request::is('404'))
            <button class="theme-toggle" onclick="toggleTheme()">Theme</button>
        @endif

        <nav class="navbar navbar-expand-md shadow-sm" style="background: var(--container); transition: background var(--transition);">
            <div class="container">
                <a class="navbar-brand" href="{{ route('posts.index') }}"
                   style="color: var(--text); font-weight: 700; text-shadow: none; transition: all var(--transition);">
                    Laravel Blog
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!-- Right -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"
                                       style="color: var(--text); transition: color var(--transition);">
                                        {{ __('Login') }}
                                    </a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"
                                       style="color: var(--text); transition: color var(--transition);">
                                        {{ __('Register') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle"
                                   style="color: var(--text); transition: color var(--transition);"
                                   href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end"
                                     style="background: var(--container); color: var(--text);">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                       style="color: var(--text); transition: color var(--transition);">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            @if (session('success'))
                <div class="flash-message">{{ session('success') }}</div>
            @endif
            
            @if (session('error'))
                <div class="flash-message" style="background: #ffecec; color: #a94442; border-left-color: #d9534f;">
                    {{ session('error') }}
                </div>
            @endif

            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        function toggleTheme() {
            const html = document.documentElement;
            const current = html.getAttribute('data-theme') || 'light';
            const next = current === 'light' ? 'dark' : 'light';
            html.setAttribute('data-theme', next);
            localStorage.setItem('theme', next);
        }
    </script>
</body>
</html>