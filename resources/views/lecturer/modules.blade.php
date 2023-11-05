@extends('layout')
@section('content')
        @unless($modules->isEmpty())
            @foreach($modules as $module)
                <div class="mb-4">
                    <h1 class="text-2xl font-bold mb-4">{{$module->name}}</h1>
                </div>
                @if(!$module->evaluations->isEmpty())
                @foreach($module->evaluations as $evaluation)
                    <div class="bg-white p-4 mb-4 rounded-lg shadow">
                        <h2 class="text-lg font-bold">Atsiskaitymas</h2>
                        <p class="text-lg font-bold">{{$evaluation->begin_date}} - {{$evaluation->end_date}}</p>
                        @if(!$evaluation->applications()->where('status_id', 4)->get()->isEmpty())
                            <div class="mt-2">
                                @foreach($evaluation->applications()->where('status_id', 4)->get() as $application)
                                    <p class="text-sm">{{$application->user->name}} {{$application->user->surname}} {{$application->user->vidko}} <a href="/studentas/prasymai/{{$application->id}}/lapelis" class="font-bold">Atsisiųsti skolos lapelį</a></p>

                                @endforeach
                            </div>
                        @else
                            <p class="text-sm text-gray-600">Šiame atsiskaityme studentų, turinčių aktyvų skolos lapelį nėra</p>
                        @endif
                    </div>
                @endforeach
                @else
                    <div class="bg-white p-4 mb-4 rounded-lg shadow">
                        <p class="text-lg font-bold">Šis modulis neturi atsiskaitymų, juos pridėti gali studijų administratorius</p>
                    </div>
                @endif
            @endforeach
        <a href="/destytojas/modulis/priskyrimas" class="mb-10 bg-blue-500 hover-bg-blue-600 text-white font-bold py-2 px-4 rounded-full block transition duration-300 ease-in-out">Prisiskirti naują modulį</a>
        @else
            <div class="border-gray-300 text-3xl font-bold">
                <p class="text-center">Jūs neturite kuruojamų modulių</p>
            </div>
            <div class="text-lg text-center">
                <a href="/destytojas/modulis/priskyrimas" class="bg-blue-500 hover-bg-blue-600 text-white font-bold py-2 px-4 rounded-full inline-block transition duration-300 ease-in-out">Prisiskirti naują modulį</a>
            </div>
        @endunless
@endsection
