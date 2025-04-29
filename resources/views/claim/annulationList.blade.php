@extends('_layouts.master')

@section('body')
    <h3 class="text-gray-700 text-3xl font-medium">Аннулирование заявки #{{$claim->id}} ({{$claim->full_name}})</h3>
    <div class="mt-8">
        @if ($errors->any())
            <div class="bg-red-500 text-white w-1/2 p-4 border-md border-gray-800 rounded-xl">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mt-4">
            <div class="p-6 bg-white rounded-md shadow-md">
                <h2 class="text-lg text-gray-700 font-semibold capitalize">Данные заявление</h2>
                <form action="{{route('claim.annulated')}}" class="grid grid-cols-1 gap-6 mt-4" method="POST">
                    @csrf
                    <input type="hidden" name="claim" value="{{$claim->id}}">
                    <div>
                        <label class="text-gray-700" for="comment">Коментарий:</label>
                        <textarea class="form-input w-full mt-2 rounded-md focus:border-indigo-600" name="comment" required placeholder="Введите сообщение"></textarea>
                    </div>
                    @if($claim->reg_num)
                        <div>
                            <label class="text-gray-700" for="reg_num">Номер технического условия</label>
                            <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600">
                                {{$claim->reg_num}}
                            </div>
                        </div>
                    @endif
                    @if($claim->reg_date)
                        <div>
                            <label class="text-gray-700" for="reg_date">Номер технического условия</label>
                            <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600">
                                {{ $claim->reg_date->format('d.m.Y') }}
                            </div>
                        </div>
                    @endif
                    <div>
                        <label class="text-gray-700" for="full_name">Ф.И.О абонента или наименования объекта</label>
                        <div class="form-input w-full mt-2 rounded-md focus:border-indigo-600">{{$claim->full_name}}</div>
                    </div>
                    <div>
                        <label class="text-gray-700" for="address">Адрес и место расположения объекта</label>
                        <div class="form-input w-full mt-2 rounded-md focus:border-indigo-600">{{$claim->address}}</div>
                    </div>

                    <div>
                        <label class="text-gray-700" for="phone">Контакт</label>
                        <div class="form-input w-full mt-2 rounded-md focus:border-indigo-600">{{$claim->phone}}</div>
                    </div>

                    <div>
                        <label class="text-gray-700" for="power">Мощность</label>
                        <div  class="form-input w-full mt-2 rounded-md focus:border-indigo-600">{{ round($claim->power, 1) }} квт</div>
                    </div>
                    <div>
                        <label class="text-gray-700" for="con_point">Точка подключения ПС - ВЛ/КЛ - КТП</label>
                        <div class="form-input w-full mt-2 rounded-md focus:border-indigo-600">
                            @if($claim->connection)
                                {{$claim->connection->pc}} - {{$claim->connection->vl}} - {{$claim->connection->tp}}</div>
                        @else
                            Нету данных
                        @endif
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="submit" class="px-4 py-2 bg-red-800 text-gray-200 rounded-md hover:bg-red-700 focus:outline-none focus:bg-red-700">Аннулировать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
