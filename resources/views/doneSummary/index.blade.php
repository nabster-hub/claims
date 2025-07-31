@extends('_layouts.master')
@section('body')
    <h2 class="text-gray-700 text-3xl font-medium">Сводный отчёт по подключенным</h2>
    <div class="flex flex-col mt-8 rounded-lg bg-white min-h-[700px] p-8">
        <h3 class="text-gray-700 text-2xl font-medium mb-4">Выберите параметры отчёта:</h3>
        @if ($errors->any())
            <div class="bg-red-500 text-white w-1/2 p-4 border-md border-gray-800 rounded-xl">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        <div class="p-4">
            <form action="{{ route('report.createDoneSummary') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-6 mt-4">
                    <span class="block text-xl font-medium text-gray-700 mb-4 border-b border-gray-700">Период</span>
                    <div>
                        <label class="text-gray-700" for="sday">С</label>
                        <input name="sday" required class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="date" value="{{old('sday')}}">
                    </div>
                    <div class="border-b pb-4 border-gray-700">
                        <label class="text-gray-700" for="eday">До</label>
                        <input name="eday" required class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="date" value="{{old('eday')}}">
                    </div>
                    @if(Auth::user()->region_id != 12)
                        <div>
                            <label class="text-gray-700" for="type">По району</label>
                            <input type="hidden" name="region" value="{{Auth::user()->region_id}}">
                            <span class="block form-input w-full mt-2 rounded-md focus:border-indigo-600">{{$regions->firstWhere('id', Auth::user()->region_id)->name}}</span>
                        </div>
                    @else
                    <div>
                        <label class="text-gray-700" for="type">По районам</label>
                        <select name="region" class="form-input w-full mt-2 rounded-md focus:border-indigo-600">
                            <option value="" selected>Все</option>
                            @foreach($regions as $region)
                                @if($region->id != 12)
                                    <option value="{{$region->id}}">{{$region->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div>
                        <label for=type" class="text-gray-700">По типу заявителя</label>
                        <select name="type" class="form-input w-full mt-2 rounded-md focus:border-indigo-600">
                            <option value="0" selected>Все</option>
                            <option value="1">Физ. лица</option>
                            <option value="2">Юр. лица</option>

                        </select>
                    </div>
                    <span class="block text-xl font-medium text-gray-700 mb-4 border-b border-gray-700">По мощности</span>
                    <div>
                        <label class="text-gray-700" for="powerMin">С</label>
                        <input name="powerMin" required class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="number" value="{{old('powerMin')}}">
                    </div>
                    <div class="border-b pb-4 border-gray-700">
                        <label class="text-gray-700" for="powerMax">До</label>
                        <input name="powerMax" required class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="number" value="{{old('powerMax')}}">
                    </div>
                    <input name="step" type="hidden" value="3">
{{--                    <div>--}}
{{--                        <label for="power" class="text-gray-700">По мощности более</label>--}}
{{--                        <input name="power" type="number" value="0" class="form-input w-full mt-2 rounded-md focus:border-indigo-600"/>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <label for="step" class="text-gray-700">По статусу</label>--}}
{{--                        <select name="step" class="form-input w-full mt-2 rounded-md focus:border-indigo-600">--}}
{{--                            <option value="0" selected>Все</option>--}}
{{--                            <option value="1">Завершенные</option>--}}
{{--                            <option value="2">В работе</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
                    <div class="flex justify-end mt-4">
                        <button class="px-4 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700"
                                onclick="this.disabled = true; this.innerText='Создаётся...'; this.form.submit();"
                        >Создать</button>
                    </div>
                </div>


            </form>
        </div>

    </div>
@endsection
