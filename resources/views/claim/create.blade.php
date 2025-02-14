@extends('_layouts.master')

@section('body')
    <h3 class="text-gray-700 text-3xl font-semibold">Создание заявления</h3>

    <div class="mt-8">
        <div class="mt-4">
            <div class="p-6 bg-white rounded-md shadow-md">
                <h2 class="text-lg text-gray-700 font-semibold capitalize">Заполните заявление</h2>

                @if ($errors->any())
                    <div class="bg-red-500 text-white w-1/2 p-4 border-md border-gray-800 rounded-xl">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('claim.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-6 mt-4">
                        <div>
                            <label class="text-gray-700" for="full_name">Ф.И.О абонента или наименования объекта</label>
                            <input name="full_name" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" value="{{old('full_name')}}">
                        </div>

                        <div>
                            <label class="text-gray-700" for="address">Адрес и моего расположения объекта</label>
                            <input name="address" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" value="{{old('address')}}">
                        </div>

                        <div>
                            <label class="text-gray-700" for="phone">Контакт</label>
                            <input name="phone" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" value="{{old('phone')}}">
                        </div>

                        <div>
                            <label class="text-gray-700" for="power">Мощность</label>
                            <input name="power" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" value="{{old('power')}}">
                        </div>
                        <div>
                            <label class="text-gray-700" for="con_point">Точка подключения ПС - ВЛ - КЛ - КТП - 10/0,4кВ</label>
                            <input name="con_point" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" value="{{old('con_point')}}">
                        </div>
                        <div>
                            <label class="text-gray-700" for="claim">Заявление</label>
                            <input name="claim" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="file" value="{{old('claim')}}">
                        </div>
                        <div>
                            <label class="text-gray-700" for="questionnaire">Опросной лист от абонента</label>
                            <input name="questionnaire" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="file" value="{{old('questionnaire')}}">
                        </div>
                        <div>
                            <label class="text-gray-700" for="cal_power">Расчёт заявленной мощности</label>
                            <input name="cal_power" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="file" value="{{old('cal_power')}}">
                        </div>
                        <div>
                            <label class="text-gray-700" for="CTD">Копии правоустанавливающих документов</label>
                            <input name="CTD" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="file" value="{{old('CTD')}}">
                        </div>
                    </div>

                    <div class="flex justify-end mt-4">
                        <button class="px-4 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
