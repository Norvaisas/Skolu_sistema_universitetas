@extends('layout')
@section('content')
    <div class="container text-center mt-5" style="padding: 30vh">
        <!-- Page Name in the Middle -->
        <h1 class="display-4">Sveiki atvykę į skolų už mokslą tvarkymosi sistemą!</h1>
        <h3 class="text-md mt-10">Sistema sukurta Roko Norvaišo</h3>

        <!-- Two Links (Register and Login) with added margin -->
        @guest
        <div class="mt-4">
            <a href="/register" class="hover:text-laravel" style="margin-right: 50px;"><i class="fa-solid fa-user-plus"></i>Registruotis</a>
            <a href="/login" class="hover:text-blue"><i class="fa-solid fa-arrow-right-to-bracket"></i>Prisijungti</a>
        </div>
        @endguest
    </div>
@endsection
