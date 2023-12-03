@extends('layout')
@section('content')
    <div class="flex items-center justify-center">
        <table class="border rounded-md mb-10 mt-20">
            <tbody>
                @unless($applications->isEmpty())
                    <tr>
                        <th class="px-4 py-2 border">Modulis</th>
                        <th class="px-4 py-2 border">Atsiskaitomas dalykas</th>
                        <th class="px-4 py-2 border">Atsiskaitymo laikotarpio pradžia</th>
                        <th class="px-4 py-2 border">Atsiskaitymo laikotarpio pabaiga</th>
                        <th class="px-4 py-2 border">Statusas</th>
                    </tr>
                    @foreach($applications as $application)
                        <tr>
                            <td class="px-4 py-2 border">{{$application->evaluation->module->name}}</td>
                            <td class="px-4 py-2 border">{{$application->subject_at_matter}}</td>
                            <td class="px-4 py-2 border">{{$application->evaluation->begin_date}}</td>
                            <td class="px-4 py-2 border">{{$application->evaluation->end_date}}</td>
                            <td class="px-4 py-2 border">
                                @if ($application->status->id == '1')
                                    <span class="bg-yellow-300 text-red-800 rounded px-2">{{ $application->status->status_name }}</span>
                                @elseif ($application->status->id == '2')
                                    <span class="bg-yellow-300 text-red-800 rounded px-2">
                                        <a href="/studentas/{{$application->id}}/pavedimas">
                                            {{$application->status->status_name }}
                                            <i class="fas fa-pencil"></i>
                                        </a>
                                    </span>
                                @elseif ($application->status->id == '3')
                                    <span class="bg-red-300 text-yellow-800 rounded px-2">{{ $application->status->status_name }}</span>
                                    <a href="/studentas/prasymai/{{$application->id}}/israsas">
                                        Atsisiųsti įkeltą banko išrašą
                                    </a>
                                @elseif ($application->status->id == '4')
                                    <span class="bg-green-300 text-yellow-800 rounded px-2">{{ $application->status->status_name }}</span>
                                    <a href="/studentas/prasymai/{{$application->id}}/lapelis">
                                        Atsiųsti skolos lapelį
                                    </a>
                                @else
                                    {{ $application->status->status_name }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
        <a href="/studentas/prasymai/naujas" class="mb-10 bg-blue-500 hover:bg-blue-600 text-white mx-auto font-bold py-2 px-4 flex w-1/3 justify-center rounded-full transition duration-300 ease-in-out">Pateikti naują prašymą</a>
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 border-gray-300 text-3xl font-bold">
                            <p class="text-center">Nėra pateiktų skolų prašymų</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 text-lg text-center">
                            <a href="/studentas/prasymai/naujas" class="mb-10 bg-blue-500 hover:bg-blue-600 text-white mx-auto font-bold py-2 px-4 flex w-1/2 mt-4 justify-center rounded-full transition duration-300 ease-in-out">Pateikti naują prašymą</a>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
@endsection
