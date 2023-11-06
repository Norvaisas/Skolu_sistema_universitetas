@extends('layout')
@section('content')
    <div class="flex justify-center items-center mt-10">
        <div class="space-y-4">
            @unless($modules->isEmpty())
                @foreach($modules as $module)
                    <table class="border border-gray-200 rounded p-4">
                        <tbody>
                        <tr>
                            <td class="text-lg font-semibold">
                                {{$module->name}} ({{$module->module_code}})
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="/administratorius/moduliai/{{$module->id}}/kaina" method="POST" style="display: inline;">
                                    @csrf
                                    <label for="hourly_rate" class="block text-base mb-2 mt-4">Kokia atsiskaitymo kaina? (EUR)</label>
                                    <input type="number" class="border border-gray-200 rounded p-2 w-full" name="hourly_rate" value="{{$module->hourly_rate}}" min="0"/>
                                    @error('hourly_rate' . $module->id)
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                    <button type="submit" class="bg-green-500 text-white rounded-lg mb-4" style="width: 120px; height: 30px;">Patvirtinti</button>
                                </form>
                            </td>
                        </tr>
                        @if(!$module->evaluations->isEmpty())
                            <tr>
                                <td>
                                    Modulio atsiskaitymų datų sąrašas:
                                </td>
                            </tr>
                            @foreach($module->evaluations as $evaluation)
                                <tr>
                                    <td>
                                        Nuo <span class="bg-yellow-500 text-white rounded-lg">{{$evaluation->begin_date}}</span> iki <span class="bg-yellow-500 text-white rounded-lg">{{$evaluation->end_date}}</span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        <tr>
                            <td>
                                <a href="/administratorius/moduliai/{{$module->id}}/atsiskaitymas" class="text-blue-500">Įtraukti naują atsiskaitymą</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                @endforeach
            @else
                <div class="border border-gray-300 text-3xl font-bold p-4 text-center">
                    Sistemoje nėra sukurtų modulių
                </div>
            @endunless
        </div>
    </div>
@endsection
