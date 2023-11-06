@extends('layout')
@section('content')
    <div class="max-w-md mx-auto bg-zinc-500 p-10 rounded">
        <form method="POST">
            @csrf
            <div class="mb-6">
                <label for="module_id" class="inline-block text-lg mb-2">Kokį modulį norite prisidėti?</label>
                <select name="module_id" id="firstdropdown" class="border border-gray-200 rounded p-2 w-full">
                    <option value="" disabled selected>--- Pasirinkti modulį ---</option>
                    @foreach($modules as $module)
                        @if($module->user == null)
                            <option value="{{ $module->id }}" {{ old('module_id') == $module->id ? 'selected' : '' }}>
                                {{ $module->name }}
                            </option>
                        @endif
                    @endforeach
                </select>

                @error('module_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="evaluation_duration" class="inline-block text-lg mb-2">Kiek akademinių valandų trunka atsiskaitymas?</label>
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="evaluation_duration" value="{{ old('evaluation_duration') }}" min="1" step="1" pattern="\d+" />

                @error('evaluation_duration')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover-bg-black"> Užregistruoti naujai prisiskirtą modulį</button>
            </div>
        </form>
    </div>
@endsection

