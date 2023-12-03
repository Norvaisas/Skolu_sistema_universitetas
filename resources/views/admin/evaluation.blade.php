@extends('layout')
@section('content')
    <div class="max-w-md mx-auto bg-zinc-500 p-10 rounded">
        <form method="POST">
            @csrf
            <div class="mb-6">
                <label for="begin_date" class="inline-block text-lg mb-2">Kokia atsiskaitymo laikotarpio pradžios data?</label>
                <input type="datetime-local" id="begin_date" name="begin_date" value="{{ old('begin_date') }}">
                @error('begin_date')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="end_date" class="inline-block text-lg mb-2">Kokia atsiskaitymo laikotarpio pabaigos data?</label>
                <input type="datetime-local" id="end_date" name="end_date" value="{{ old('end_date') }}">
                @error('end_date')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover-bg-black"> Pridėti naują atsiskaitymo laikotarpį</button>
            </div>
        </form>
    </div>
@endsection
