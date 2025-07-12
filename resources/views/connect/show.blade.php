@extends('_layouts.master')

@section('body')
    <h3 class="text-gray-700 text-3xl font-medium">Заявка #{{$claim->id}} ({{$claim->full_name}})</h3>
    <div class="mt-8">
        <div class="mt-4">
            <div class="p-6 bg-white rounded-md shadow-md">
                <h2 class="text-lg text-gray-700 font-semibold capitalize">Данные заявление</h2>
                <div class="grid grid-cols-1 gap-6 mt-4">

                    @if ($errors->any())
                        <div class="bg-red-500 text-white w-1/2 p-4 border-md border-gray-800 rounded-xl">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        @if(!$claim->connect)
                        <div class="mb-4"><input type="checkbox" id="lics" /> <span class="mb-4">Подключился</span></div>

                        <form action="{{route('connect.store', $claim->id)}}" method="POST" id="form" class="hidden flex flex-col gap-4">
                            @csrf
                            @method('POST')
                            <label class="text-gray-700" for="clientNo">Лицевой счёт</label>
                            <input name="clientNo" type="text" placeholder="Введите лицевой счёт" class=" mt-2 py-2 border-gray-700 border-b border-t focus:border-indigo-600" />
                            @if($claim->type === 2)
                             <label class="text-gray-700" for="act_date">Дата выдачи акта</label>
                             <input name="act_date" type="date" placeholder="Выберите дату выдачи акта"/>
                             <label class="text-gray-700" for="act_number">Номер акта</label>
                             <input name="act_number" type="number" placeholder="Введите номер акта"/>
                             <label class="text-gray-700" for="receipt_number">Номер квитанции оплаты</label>
                             <input name="receipt_number" type="number" placeholder="Введите номер квитанции оплаты"/>
                             <label class="text-gray-700" for="receipt_sum">Сумма оплаты по квитанции</label>
                             <input name="receipt_sum" type="number" placeholder="Введите сумму оплаты"/>
                             <label class="text-gray-700" for="SMR">СМР проектной организации</label>
                             <input name="SMR" type="text" placeholder="Введите СМР проектной организации"/>
                             <label class="text-gray-700" for="distance_solder">Растояние в метрах до места пайки</label>
                             <input name="distance_solder" type="number" placeholder="Введите растояние в метрах до места пайки"/>

                            @endif
                            <button type="submit" class="px-6 py-3 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Сохранить</button>
                        </form>
                        @else
                        <div class="mb-4">Подключён Номер Клиента - <span class="bg-green-600">{{$claim->connect->client}}</span> </div>
                        @endif
                    </div>
                    <div>
                        <label class="text-gray-700">Дней в работе</label>
                        <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600">{{$claim->getWorkingDays()}}</div>
                    </div>
                    <div>
                        <label class="text-gray-700">Дата создания</label>
                        <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600">{{$claim->created_at->format('d.m.y H:i:s')}}</div>
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
                        <label class="text-gray-700" for="address">Адрес и моего расположения объекта</label>
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
                                {{$claim->connection->pc}} - {{$claim->connection->vl}} - {{$claim->connection->tp}}
                        @else
                            Нету данных
                        @endif
                        </div>
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
                    <div>
                         <label class="text-gray-700" for="tech_offer">Техническое предложение</label>
                         <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600"><a href="{{$claim->docs->tech_offer}}"  target="_blank"><button class="px-6 py-3 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Показать</button></a></div>
                    </div>
                    <div>
                        <label class="text-gray-700" for="OCD">Схема подключения объекта</label>
                        <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600"><a href="{{$claim->docs->OCD}}"  target="_blank"><button class="px-6 py-3 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Показать</button></a></div>
                    </div>
                    <div>
                        <label class="text-gray-700" for="tech_condition">Техническое условие</label>
                        <div class="w-full mt-2 py-2  border-gray-700 border-b border-t focus:border-indigo-600"><a href="{{$claim->docs->tech_condition}}"  target="_blank"><button class="px-6 py-3 bg-gray-600 rounded-md text-white font-medium tracking-wide hover:bg-gray-500">Показать</button></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
           var checkbox = document.querySelector("#lics");
           var form = document.querySelector("#form");

           if(checkbox && form){
               checkbox.addEventListener("change", function(){
                  if(checkbox.checked){
                      form.classList.remove("hidden");
                  }else{
                      form.classList.add("hidden");
                  }
               });
           }
           console.log(e)
        });
    </script>

@endsection
