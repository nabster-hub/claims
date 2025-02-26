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
                <div class="bg-red-500 text-white w-1/2 p-4 border-md border-gray-800 rounded-xl">
                    <span class="text-white text-2xl block">Комментарий: </span>
                    @foreach($claim->comments as $comment)
                        <p>{{$comment->content}}</p>
                    @endforeach

                </div>

                <form action="{{route('claim.update', $claim->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="step" value="1">
                    <div class="grid grid-cols-1 gap-6 mt-4">
                        <div>
                            <label class="text-gray-700" for="full_name">Ф.И.О абонента или наименования объекта</label>
                            <input name="full_name" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" value="{{$claim->full_name}}">
                        </div>

                        <div>
                            <label class="text-gray-700" for="address">Адрес и моего расположения объекта</label>
                            <input name="address" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" value="{{$claim->address}}">
                        </div>

                        <div>
                            <label class="text-gray-700" for="phone">Контакт</label>
                            <input name="phone" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" value="{{$claim->phone}}">
                        </div>

                        <div>
                            <label class="text-gray-700" for="power">Мощность</label>
                            <input name="power" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" value="{{$claim->power}}">
                        </div>
                        <div class="text-gray-700">
                            <span>Точка подключения: </span>
                        </div>
                        <div class="ml-4">
                            <label class="text-gray-700" for="pc">ПС</label>
                            <input name="pc" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" value="{{$claim->connection->pc}}">
                        </div>
                        <div class="ml-4">
                            <label class="text-gray-700" for="vl">ВЛ/КЛ</label>
                            <input name="vl" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" value="{{$claim->connection->vl}}">
                        </div>
                        <div class="ml-4">
                            <label class="text-gray-700" for="tp">КТП</label>
                            <input name="tp" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="text" value="{{$claim->connection->tp}}">
                        </div>
                        <div>
                            <label class="text-gray-700" for="claim">Заявление</label>
                            <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600"><a href="{{$claim->docs->claim}}"  target="_blank" class="px-6 py-3 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Показать текущий документ</a></div>
                            <input name="claim" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="file" value="{{old('claim')}}">
                        </div>
                        <div>
                            <label class="text-gray-700" for="questionnaire">Опросной лист от абонента</label>
                            <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600"><a href="{{$claim->docs->questionnaire}}"  target="_blank" class="px-6 py-3 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Показать текущий документ</a></div>
                            <input name="questionnaire" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="file" value="{{old('questionnaire')}}">
                        </div>
                        <div>
                            <label class="text-gray-700" for="cal_power">Расчёт заявленной мощности</label>
                            <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600"><a href="{{$claim->docs->cal_power}}"  target="_blank" class="px-6 py-3 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Показать текущий документ</a></div>
                            <input name="cal_power" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="file" value="{{old('cal_power')}}">
                        </div>
                        <div>
                            <label class="text-gray-700" for="CTD">Копии правоустанавливающих документов</label>
                            <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600"><a href="{{$claim->docs->CTD}}"  target="_blank" class="px-6 py-3 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Показать текущий документ</a></div>
                            <input name="CTD" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="file" value="{{old('CTD')}}">
                        </div>
                        @if($claim->docs->tech_offer)
                        <div>
                            <label class="text-gray-700" for="tech_offer">Техническое предложение</label>
                            <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600"><a href="{{$claim->docs->tech_offer}}"  target="_blank" class="px-6 py-3 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Показать текущий документ</a></div>
                            <input name="tech_offer" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="file" value="{{old('tech_offer')}}">
                        </div>
                        @endif
                        @if($claim->docs->OCD)
                        <div>
                            <label class="text-gray-700" for="OCD">Схема подключения объекта</label>
                            <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600"><a href="{{$claim->docs->OCD}}"  target="_blank" class="px-6 py-3 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Показать текущий документ</a></div>
                            <input name="OCD" class="form-input w-full mt-2 rounded-md focus:border-indigo-600" type="file" value="{{old('OCD')}}">
                        </div>
                        @endif
                    </div>

                    <div class="flex justify-end mt-4">
                        <button class="px-4 py-2 bg-red-800 text-gray-200 rounded-md hover:bg-red-700 focus:outline-none focus:bg-red-700">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
