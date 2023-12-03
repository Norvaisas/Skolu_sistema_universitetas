@extends('layout')
@section('content')
    <div class="max-w-md mx-auto bg-zinc-500 p-10 rounded">
        <form method="POST" action="/studentas/prasymai/naujas">
            @csrf
            <div class="mb-6">
                <label for="module_id" class="inline-block text-lg mb-2">Kokio modulio skolą norite taisytis?</label>
                <select name="module_id" id="firstdropdown" class="border border-gray-200 rounded p-2 w-full">
                    <option value="" disabled selected>--- Pasirinkti modulį ---</option>
                    @foreach($modules as $module)
                        <option value="{{ $module->id }}">{{ $module->name }}</option>
                    @endforeach
                </select>

                @error('module_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="evaluation_id" class="inline-block text-lg mb-2">Kokį skolos taisymo laiką norite pasirinkti?</label>
                <select name="evaluation_id" id="seconddropdown" class="border border-gray-200 rounded p-2 w-full">
                    <option value="" disabled selected>--- Pasirinkti modulį ---</option>
                </select>

                @error('evaluation_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="subject_at_matter" class="inline-block text-lg mb-2">Už kokį dalyką norėsite atsiskaityti?</label>
                <input type="text" name="subject_at_matter" class="border border-gray-200 rounded p-2 w-full">

                @error('subject_at_matter')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover-bg-black"> Užregistruoti prašymą </button>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $("#firstdropdown").change(function () {
                var module_id = $("#firstdropdown").val();
                var url = `/prasymai/${module_id}`;
                $.getJSON(url, function (data) {
                    // Clear the second dropdown before populating it.
                    $("#seconddropdown").empty();
                    if (data.length === 0) {
                        // Add the disabled option when no evaluations are returned.
                        $("#seconddropdown").append($("<option></option>").val("").html("-- Modulis neturi atsiskaitymų --"));
                    } else {
                        // Populate the dropdown with evaluations.
                        $.each(data, function (index, evaluation) {
                            $("#seconddropdown").append($("<option></option>").val(evaluation.id).html(evaluation.begin_date));
                        });
                    }
                });
            });
        });
    </script>
@endsection
