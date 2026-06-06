<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Könyves adatbázis</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <header>
    <nav class="navbar">

        <div class="nav-container">
            <button class="hamburger" id="hamburger-btn" aria-label="Toggle navigation">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>

            <ul class="nav-menu" id="nav-menu">
                <li><a href="{{ route('books.index') }}">Könyvek</a></li>
                <li><a href="{{ route('categories.index') }}">Kategóriák</a></li>
                <li><a href="{{ route('authors.index') }}">Szerzők</a></li>
                <li><a href="{{ route('publishers.index') }}">Kiadók</a></li>
                <li><a href="{{ route('series.index') }}">Sorozatok</a></li>
            </ul>
        </div>
    </nav>
</header>
    <main>
        @yield('content')
    </main>
    <footer>@ 2026 Agócs Geri</footer>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const hamburger = document.getElementById('hamburger-btn');
        const navMenu = document.getElementById('nav-menu');

        hamburger.addEventListener('click', function () {
            // Toggles between display: none and display: block
            navMenu.classList.toggle('active');
            
            // Optional: Animates the hamburger bars into an X
            hamburger.classList.toggle('toggle');
        });
    });
</script>
</script>
</body>
</html>