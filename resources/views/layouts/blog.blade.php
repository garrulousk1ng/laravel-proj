<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Laravel Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Theme persistence (prevents flicker) --}}
    <script>
        const savedTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-theme', savedTheme);
    </script>

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --text-light: #2b2b2b;
            --text-dark: #e0e0e0;
            --bg-light: #ffffff;
            --bg-dark: #1e1e1e;
            --container-light: #f9f9f9;
            --container-dark: #2a2a2a;
            --accent: #4a90e2;
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
            color: var(--accent);
            text-decoration: none;
            transition: all var(--transition);
        }

        h1, h2, h3 {
            margin-bottom: 1rem;
        }

        h1 a, h2 a {
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s ease-in-out;
        }

        h1 a:hover, h2 a:hover {
            text-shadow: 0 0 8px rgba(74, 144, 226, 0.5);
            transform: translateY(-2px);
        }

        .container {
            max-width: 960px;
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
            background: var(--accent);
            color: #fff;
            font-weight: 600;
            font-size: 0.95rem;
            border-radius: 8px;
            transition: all 0.2s ease-in-out;
            text-decoration: none;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.07);
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }

        .action-btn.delete {
            background: #e74c3c;
        }

        .action-btn.delete:hover {
            background: #c0392b;
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
            transition: box-shadow 0.3s ease;
        }

        .post-card:hover {
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
        }

        .post-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .read-more {
            font-weight: 600;
            color: var(--accent);
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

        input[type="text"],
        textarea {
            width: 100%;
            padding: 0.85rem;
            border: 1px solid #ccc;
            border-radius: 10px;
            background: #fff;
            transition: all var(--transition);
            font-size: 1rem;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: var(--accent);
            outline: none;
        }

        textarea {
            resize: vertical;
            min-height: 140px;
        }

        button {
            margin-top: 1.2rem;
            padding: 0.8rem 1.6rem;
            background: var(--accent);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all var(--transition);
        }

        button:hover {
            background: #3378d4;
            transform: scale(1.03);
        }

        .theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 14px;
            font-size: 14px;
            background: transparent;
            border: 2px solid var(--accent);
            border-radius: 8px;
            color: var(--text);
            cursor: pointer;
            transition: all var(--transition);
        }

        .theme-toggle:hover {
            background: var(--accent);
            color: #fff;
        }

        .flash-message {
            margin-bottom: 2rem;
            padding: 1rem 1.25rem;
            background: #e6f7ff;
            border-left: 4px solid var(--accent);
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
    <button class="theme-toggle" onclick="toggleTheme()">Theme</button>

    <div class="container">
        <h1><a href="{{ route('posts.index') }}">Laravel Blog</a></h1>

        @if (session('success'))
            <div class="flash-message">{{ session('success') }}</div>
        @endif

        @yield('content')
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