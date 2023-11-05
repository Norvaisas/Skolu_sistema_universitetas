@extends('layout')
@section('content')
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Registracija</h2>
        <p class="mb-4">Susikurkite paskyrą, kad galėtumėte naudoti skolų tvarkymosi sistema</p>
    </header>

    <div class="max-w-md mx-auto bg-zinc-500 p-10 rounded">
        <form method="POST" action="/users">
            @csrf
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2"> Vardas </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{old('name')}}" />

                @error('name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="surname" class="inline-block text-lg mb-2">Pavardė</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="surname" value="{{old('surname')}}" />

                @error('surname')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="vidko" class="inline-block text-lg mb-2"> Vidinis universiteto kodas </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="vidko" value="{{old('vidko')}}" />

                @error('vidko')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="role_id" class="inline-block text-lg mb-2">Kas jūs esate?</label>
                <select name="role_id" class="border border-gray-200 rounded p-2 w-full">
                    <option value="0">Studentas</option>
                    <option value="1">Dėstytojas</option>
                </select>

                @error('role_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
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
                <label for="password2" class="inline-block text-lg mb-2"> Pakartokite slaptažodį </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" value="{{old('password_confirmation')}}" />

                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"> Registruotis </button>
            </div>

            <div class="mt-8">
                <p>
                    Jau turite paskyrą? <a href="/login" class="text-laravel">Prisijungti</a>
                </p>
            </div>
        </form>
    </div>
@endsection
