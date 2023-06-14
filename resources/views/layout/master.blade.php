<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5">
        <a class="navbar-brand" href="/">Restaurant</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="/">Menu <span class="sr-only"></span></a>
            @can('isAdmin')
                <a class="nav-item nav-link active" href="/create-menu">Add Menu <span class="sr-only"></span></a>
            @endcan

            @guest
                <a class="nav-item nav-link active" href="/login">Login <span class="sr-only"></span></a>
                <a class="nav-item nav-link active" href="/register">Register <span class="sr-only"></span></a>
            @endguest

            <a class="nav-item nav-link active" href="/set-cookie">Set Cookie <span class="sr-only"></span></a>

            <form method="POST" class="nav-item nav-link active" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link style="text-decoration: none; color:white; padding: 1rem; background-color: #dc3545; border-radius:15px" :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ ('Log Out')}}
                </x-dropdown-link>
            </form>
        </div>
        </div>
    </nav>
    @yield('content')
</body>
</html>
