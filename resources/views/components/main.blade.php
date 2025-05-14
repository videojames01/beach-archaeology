<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <title>Beach Archaeology</title>
    @vite(['resources/js/app.js'])

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<button class="hamburger">☰</button>

<header>
    <nav class="sidebar">
        <ul class="nav-links">
            <li><a href="/">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="/login">login</a></li>
        </ul>
    </nav>

    <img src="/img/logo_ba.png" class="logo" alt="Beach Archaeology logo">
</header>

<main>
    {{ $slot }}
    <div class="buttons">
        {{ $buttons }}
    </div>
</main>

<footer>
    <p>No Copyright</p>
</footer>
</body>
</html>
