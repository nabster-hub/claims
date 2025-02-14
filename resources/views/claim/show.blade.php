@extends('_layouts.master')

@section('body')
    <h3 class="text-gray-700 text-3xl font-medium">Заявка #{{$claim->id}} ({{$claim->full_name}})</h3>
    <div class="mt-8">
        <div class="mt-4">
            <div class="p-6 bg-white rounded-md shadow-md">
                <h2 class="text-lg text-gray-700 font-semibold capitalize">Данные заявление</h2>
                    @csrf
                    <div class="grid grid-cols-1 gap-6 mt-4">
                        <div>
                            <label class="text-gray-700">Дней в работе</label>
                            <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600">{{$claim->getWorkingDays()}}</div>
                        </div>
                        <div>
                            <label class="text-gray-700" for="full_name">Ф.И.О абонента или наименования объекта</label>
                            <div class="form-input w-full mt-2 rounded-md focus:border-indigo-600">{{$claim->full_name}}</div>
                        </div>
                        <div>
                            <label class="text-gray-700" for="address">Адрес и моего расположения объекта</label>
                            <div class="form-input w-full mt-2 rounded-md focus:border-indigo-600">{{$claim->address}}</div>
                        </div>

                        <div>
                            <label class="text-gray-700" for="phone">Контакт</label>
                            <div class="form-input w-full mt-2 rounded-md focus:border-indigo-600">{{$claim->phone}}</div>
                        </div>

                        <div>
                            <label class="text-gray-700" for="power">Мощность</label>
                            <div  class="form-input w-full mt-2 rounded-md focus:border-indigo-600">{{$claim->power}}</div>
                        </div>
                        <div>
                            <label class="text-gray-700" for="con_point">Точка подключения ПС - ВЛ - КЛ - КТП - 10/0,4кВ</label>
                            <div class="form-input w-full mt-2 rounded-md focus:border-indigo-600">{{$claim->con_point}}</div>
                        </div>
                        <div>
                            <label class="text-gray-700" for="claim">Заявление</label>
                            <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600"><a href="{{$claim->docs->claim}}"  target="_blank"><button class="px-6 py-3 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Показать</button></a></div>
                        </div>
                        <div>
                            <label class="text-gray-700" for="questionnaire">Опросной лист от абонента</label>
                            <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600"><a href="{{$claim->docs->questionnaire}}"  target="_blank"><button class="px-6 py-3 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Показать</button></a></div>
                        </div>
                        <div>
                            <label class="text-gray-700" for="cal_power">Расчёт заявленной мощности</label>
                            <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600"><a href="{{$claim->docs->cal_power}}"  target="_blank"><button class="px-6 py-3 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Показать</button></a></div>
                        </div>
                        <div>
                            <label class="text-gray-700" for="CTD">Копии правоустанавливающих документов</label>
                            <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600"><a href="{{$claim->docs->CTD}}"  target="_blank"><button class="px-6 py-3 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Показать</button></a></div>
                        </div>

                        @if($claim->status >= 3)
                            <div>
                                <label class="text-gray-700" for="tech_offer">Техническое предложение</label>
                                <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600"><a href="{{$claim->docs->tech_offer}}"  target="_blank"><button class="px-6 py-3 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Показать</button></a></div>
                            </div>
                            <div>
                                <label class="text-gray-700" for="OCD">Схема подключения объекта</label>
                                <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600"><a href="{{$claim->docs->OCD}}"  target="_blank"><button class="px-6 py-3 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Показать</button></a></div>
                            </div>
                        @endif
                            <div>
                                <label class="text-gray-700" for="tech_offer">Техническое предложение</label>
                                <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600"><a href="{{$claim->docs->tech_offer}}"  target="_blank"><button class="px-6 py-3 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Показать</button></a></div>
                            </div>
                        @if($claim->status ==4 )
                            <div>
                                <label class="text-gray-700" for="tech_condition">Техническое условие</label>
                                <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600"><a href="{{$claim->docs->tech_condition}}"  target="_blank"><button class="px-6 py-3 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Показать</button></a></div>
                            </div>
                        @endif
                    </div>

                    <div class="flex justify-end mt-4">
                        @if($claim->status === 1 && Auth::user()->id === $claim->user_id)
                            <button class="px-4 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Изменить</button>
                        @endif

                        @if($claim->status == 2 && Auth::user()->id === $claim->user_id)
                            <a href="{{route('claim.stepTwo', $claim->id)}}" class="px-4 py-2 bg-red-800 text-white rounded-md hover:bg-red-700 focus:outline-none focus:bg-red-700 flex items-center gap-4">
                                    <span>Шаг 2</span>
                                    <svg height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="m0 0h32v32h-32z"/><path d="m9.88528137 7.48578644 1.41421353 1.41421356-6.0994949 6.0997864 25.4426407.0002136v2l-25.4286407-.0002136 6.0854949 6.085495-1.41421353 1.4142135-8.48528137-8.4852813.022-.0214272-.022-.0217186z" fill="#fff" transform="matrix(-1 0 0 -1 32.04264 31.985282)"/></g></svg>
                            </a>
                        @endif
                    </div>
            </div>
        </div>
    </div>

@endsection
