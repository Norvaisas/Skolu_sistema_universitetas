@extends('layout')
@section('content')
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Prisijungimas</h2>
        <p class="mb-4">Prisijunkite prie savo paskyros, kad galėtumėte naudoti skolų tvarkymosi sistema</p>
    </header>

    <div class="max-w-md mx-auto bg-zinc-500 p-10 rounded">
        <form method="POST" action="/users/authenticate">
            @csrf

            <div class="mb-6">
                <label for="vidko" class="inline-block text-lg mb-2"> Vidinis universiteto kodas </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="vidko" value="{{old('vidko')}}" />

                @error('vidko')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2"> Slaptažodis </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" value="{{old('password')}}" />

                @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"> Prisijungti </button>
            </div>

            <div class="mt-8">
                <p>
                    Dar neturite paskyros? <a href="/register" class="text-laravel">Registruotis</a>
                </p>
            </div>
        </form>
    </div>
@endsection
