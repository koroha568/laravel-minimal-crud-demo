<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laravel CRUD Demo')</title>
    <style>
        body {
            margin: 0;
            font-family: "Segoe UI", sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        .container {
            max-width: 920px;
            margin: 40px auto;
            padding: 0 20px 40px;
        }

        .card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 18px 48px rgba(15, 23, 42, 0.08);
            padding: 24px;
        }

        .stack > * + * {
            margin-top: 16px;
        }

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .button,
        button {
            border: 0;
            border-radius: 999px;
            padding: 10px 18px;
            background: #0f766e;
            color: #ffffff;
            cursor: pointer;
            text-decoration: none;
            font: inherit;
        }

        .button.subtle,
        button.subtle {
            background: #e5e7eb;
            color: #111827;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            box-sizing: border-box;
        }

        .field + .field {
            margin-top: 16px;
        }

        .error {
            color: #b91c1c;
            font-size: 0.92rem;
            margin-top: 6px;
        }

        .status {
            background: #ecfdf5;
            color: #065f46;
            border-radius: 12px;
            padding: 12px 16px;
        }
    </style>
</head>
<body>
    <div class="container stack">
        @if (session('status'))
            <p class="status">{{ session('status') }}</p>
        @endif

        @yield('content')
    </div>
</body>
</html>
