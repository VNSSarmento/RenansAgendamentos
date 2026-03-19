<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Painel do Aluno') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body {
            font-family: 'Space Grotesk', sans-serif;
            background: #0e0e10;
            margin: 0;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
            color: #e8e8f0;
        }
    </style>
</head>
<body>
    @include('layouts.navigation')
    <main>{{ $slot }}</main>
</body>
</html>