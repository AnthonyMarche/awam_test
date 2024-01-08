<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="bg-gray-200 w-screen h-screen">
    @include('components.flash-message')
    {{ $content }}
</div>
<script src="https://kit.fontawesome.com/cbfe0c4198.js" crossorigin="anonymous"></script>
</body>
</html>

