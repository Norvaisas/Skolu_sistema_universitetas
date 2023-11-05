<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: '#ef3b2d',
                    },
                },
            },
        }
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    @auth
        <div class="flex flex-wrap items-center justify-between bg-slate-800 md:p-0">
            <div id="menu" class="hidden md:block">
                <ul class="items-center w-screen md:w-auto md:flex">
                    @if (auth()->user()->role_id == 0)
                        <li class="p-4 text-gray-500 border-b border-gray-600 md:border-0"><a href="/studentas/prasymai">Skolos taisymo prašymai</a></li>
                    @elseif (auth()->user()->role_id == 1)
                        <li class="p-4 text-gray-500 border-b border-gray-600 hover:text-gray-300 md:border-0"><a href="/destytojas/moduliai">Kuruojami moduliai ir skolų lapeliai</a></li>
                    @elseif (auth()->user()->role_id == 2)
                        <li class="p-4 text-gray-500 border-b border-gray-600 hover:text-gray-300 md:border-0"><a href="/administratorius/prasymai">Aktyvūs skolų taisymo prašymai</a></li>
                        <li class="p-4 text-gray-500 border-b border-gray-600 hover:text-gray-300 md:border-0"><a href="/administratorius/moduliai">Modulių atsiskaitymų informacija</a></li>
                    @endif
                </ul>
            </div>

            <form class="inline" method="POST" action="/logout">
                <p class="inline text-gray-300 pr-10">{{auth()->user()->role->role_name}} {{auth()->user()->name}} {{auth()->user()->surname}}</p>
                @csrf
                <button type="submit" class="text-gray-300 pr-10">
                    <i class=" fa-solid fa-door-closed"></i>Atsijungti
                </button>
            </form>
        </div>
    @endauth
    {{-- VIEW OUTPUT --}}
    @yield('content')
    <x-flash-message/>
</body>
</html>

