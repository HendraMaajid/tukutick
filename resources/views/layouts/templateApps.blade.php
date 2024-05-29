<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title")</title>
     <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .btn-custom-width {
            width: 100px; /* Atur sesuai kebutuhan */
        }
        .navbar-brand {
            font-family: 'Noto Sans', sans-serif;
            font-weight: 800;
            font-size: 1.8rem;
        }
    </style>
  </head>
  <body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <div class="d-flex">
                <a class="navbar-brand" href="">TukuTick</a>
            </div>
            <div class="d-flex gap-5">
                <div class="navbar-nav d-flex flex-row gap-4">
                    <a class="nav-link" href="#">Home</a>
                    <a class="nav-link" href="#">About</a>
                    <a class="nav-link" href="#">Event</a>
                    <a class="nav-link" href="">Contact</a>
                </div>
                <div class="d-flex gap-3">
                    <button class="btn btn-outline-dark btn-custom-width rounded-pill" type="submit">Login</button>
                    <button class="btn btn-outline-primary btn-custom-width rounded-pill" type="submit">Sign Up</button>
                </div>
            </div>
        </div>
    </nav>

    

    <footer class="bg-body-tertiary text-center py-3 mt-5">
        <p>&copy; 2022 TukuTick. All Rights Reserved.</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>