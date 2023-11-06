@extends('layout')

@section('content')
    <div class="flex items-center justify-center mt-5">
        <table class="w-full rounded-md mb-10">
            <tbody>
            @php
                $filteredInitial = $applications->filter(function ($application) {
                    return $application->status->id == '1';
                });

                $filteredPay = $applications->filter(function ($application) {
                    return $application->status->id == '3';
                });
            @endphp

            @if (!$filteredInitial->isEmpty())
                <tr>
                    <td colspan="7" class="px-4 text-3xl font-bold">
                        <p class="text-center mb-5">Prašymų pradinės užklausos</p>
                    </td>
                </tr>
                <tr>
                    <th class="px-4 py-2 border">Vardas</th>
                    <th class="px-4 py-2 border">Pavardė</th>
                    <th class="px-4 py-2 border">Vidinis kodas</th>
                    <th class="px-4 py-2 border">Modulis</th>
                    <th class="px-4 py-2 border">Atsiskaitymo laikotarpio pradžia</th>
                    <th class="px-4 py-2 border">Atsiskaitymo laikotarpio pabaiga</th>
                    <th class="px-4 py-2 border">Statusas</th>
                </tr>
                @foreach ($filteredInitial as $application)
                    <tr>
                        <td class="px-4 py-2 border">{{$application->user->name}}</td>
                        <td class="px-4 py-2 border">{{$application->user->surname}}</td>
                        <td class="px-4 py-2 border">{{$application->user->vidko}}</td>
                        <td class="px-4 py-2 border">{{$application->evaluation->module->name}}</td>
                        <td class="px-4 py-2 border">{{$application->evaluation->begin_date}}</td>
                        <td class="px-4 py-2 border">{{$application->evaluation->end_date}}</td>
                        <td class="px-4 py-2 border">
                            <p class="bg-yellow-300 text-red-800 rounded px-2">{{ $application->status->status_name }}</p>
                            <form action="/administratorius/prasymai/{{$application->id}}/tvirtinti" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white rounded-lg">Patvirtinti prašymą</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="border-gray-300">
                    <td class="px-4 border-gray-300 text-3xl font-bold">
                        <p class="text-center">Nėra skolų prašymų, kuriems reiktų pradinio Jūsų patvirtinimo</p>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
    <div class="flex items-center justify-center">
        <table class="w-full rounded-md mb-10">
            <tbody>
    @if (!$filteredPay->isEmpty())
                <tr>
                    <td colspan="9" class="px-4 text-3xl font-bold">
                        <p class="text-center">Apmokėti prašymai, kuriems reikia patvirtinimo ir skolos lapelio</p>
                    </td>
                </tr>
                <tr>
                    <th class="px-4 py-2 border">Vardas</th>
                    <th class="px-4 py-2 border">Pavardė</th>
                    <th class="px-4 py-2 border">Vidinis kodas</th>
                    <th class="px-4 py-2 border">Modulis</th>
                    <th class="px-4 py-2 border">Atsiskaitymo laikotarpio pradžia</th>
                    <th class="px-4 py-2 border">Atsiskaitymo laikotarpio pabaiga</th>
                    <th class="px-4 py-2 border">IBAN</th>
                    <th class="px-4 py-2 border">Banko išrašas</th>
                    <th class="px-4 py-2 border">Statusas</th>
                </tr>
                @foreach ($filteredPay as $application)
                    <tr>
                        <td class="px-4 py-2 border">{{$application->user->name}}</td>
                        <td class="px-4 py-2 border">{{$application->user->surname}}</td>
                        <td class="px-4 py-2 border">{{$application->user->vidko}}</td>
                        <td class="px-4 py-2 border">{{$application->evaluation->module->name}}</td>
                        <td class="px-4 py-2 border">{{$application->evaluation->begin_date}}</td>
                        <td class="px-4 py-2 border">{{$application->evaluation->end_date}}</td>
                        <td class="px-4 py-2 border">
                            {{$application->iban}}
                        </td>
                        <td class="px-4 py-2 border">
                            <a href="/studentas/prasymai/{{$application->id}}/israsas">
                                Atsisiųsti įkeltą banko išrašą
                            </a>
                        </td>
                        <td class="px-4 py-2 border">
                            <p class="bg-yellow-300 text-red-800 rounded px-2">{{ $application->status->status_name }}</p>
                            <form action="/administratorius/prasymai/{{$application->id}}/lapelis" method="POST" style="display: inline;" enctype="multipart/form-data">
                                @csrf
                                <div style="display: flex; align-items: center;">
                                    <input type="file" name="debt_slip" style="margin-right: 10px;"/>
                                    @error('debt_slip')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                    <button type="submit" class="bg-green-500 text-white rounded-lg" style="width: 120px; height: 30px;">Patvirtinti</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
    @else
        <tr class="border-gray-300">
            <td class="px-4 border-gray-300 text-3xl font-bold">
                <p class="text-center">Nėra apmokėtų skolų prašymų, kuriems reiktų Jūsų pakeitimų</p>
            </td>
        </tr>
    @endif
                </tbody>
            </table>
        </div>

@endsection
