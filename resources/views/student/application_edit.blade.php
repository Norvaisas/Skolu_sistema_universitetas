@extends('layout')
@section('content')
    <div class="max-w-md mx-auto bg-zinc-500 p-10 rounded">
        <form method="POST" action="/studentas/{{$application->id}}/pavedimas" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="iban" class="inline-block text-lg mb-2"> IBAN sąskaitos numeris </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="iban" value="{{old('iban')}}" />

                @error('iban')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="bank_statement" class="inline-block text-lg mb-2">Pavedimo išrašas</label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="bank_statement"/>

                @error('bank_statement')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"> Pateikti pavedimo informaciją </button>
            </div>
        </form>
@endsection
