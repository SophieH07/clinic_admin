<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendelő Admin</title>
    <style>
        /* Basic styling for readability */
        body {
            font-family: sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        nav {
            background: #f4f4f4;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .alert-success {
            padding: 1rem;
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            margin-bottom: 1rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th,
        td {
            padding: 0.75rem;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: .5rem;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: .5rem;
        }

        button {
            padding: 0.7rem 1.2rem;
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .actions-cell form {
            display: inline-block;
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <header>
        <nav>
            <a href="{{ route('patients.index') }}">Betegek</a>
            <a href="{{ route('statistics.index') }}">Statisztika</a>
        </nav>
    </header>

    <main>
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </main>
</body>

</html>
