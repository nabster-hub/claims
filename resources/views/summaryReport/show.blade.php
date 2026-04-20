@extends('_layouts.master')
@section('body')
    <h2 class="text-gray-700 text-3xl font-medium">Сводный отчёт</h2>
    <div class="flex flex-col mt-8 rounded-lg bg-white min-h-[700px] p-8">
        <h3 class="text-center font-medium text-2xl mb-4">С {{\Carbon\Carbon::parse($validated['sday'])->format('d.m.Y')}} ПО {{\Carbon\Carbon::parse($validated['eday'])->format('d.m.Y')}}</h3>
        <table class="border-2 border-solid border-black">
            <thead class="border border-solid border-black">
            <tr>
                <td class="border border-solid border-black font-semibold text-center">№</td>
                <td class="border border-solid border-black font-semibold text-center">ФИО Наименование организации</td>
                <td class="border border-solid border-black font-semibold text-center">Адрес объекта</td>
                <td class="border border-solid border-black font-semibold text-center">Дата поступления заявки</td>
                <td class="border border-solid border-black font-semibold text-center">Дата выдачи тех. условия</td>
                <td class="border border-solid border-black font-semibold text-center">№ тех. условия</td>
                <td class="border border-solid border-black font-semibold text-center">Телефон Контакты</td>
                <td class="border border-solid border-black font-semibold text-center">Мощность кВт</td>
                <td class="border border-solid border-black font-semibold text-center">Точка подключения</td>
{{--                <td class="border border-solid border-black font-semibold text-center">Л/С</td>--}}
{{--                <td class="border border-solid border-black font-semibold text-center">Дата и номер АКТа разграничения</td>--}}
{{--                <td class="border border-solid border-black font-semibold text-center">Номер квитанции оплаты</td>--}}
{{--                <td class="border border-solid border-black font-semibold text-center">Сумма оплаты</td>--}}
{{--                <td class="border border-solid border-black font-semibold text-center">СМР проектной организации</td>--}}
{{--                <td class="border border-solid border-black font-semibold text-center">Растояние до пайки</td>--}}
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($claims as $claim)
                <tr>
                    <td class="border border-solid border-black text-center">{{$i}}</td>
                    <td class="border border-solid border-black pl-1">{{$claim->full_name}}</td>
                    <td class="border border-solid border-black pl-1">{{$claim->address}}</td>
                    <td class="border border-solid border-black pl-1">{{$claim->created_at->format('d.m.Y')}}</td>

                    <td class="border border-solid border-black pl-1">
                        @if($claim->reg_date)
                        {{\Carbon\Carbon::parse($claim->reg_date)->format('d.m.Y')}}
                        @else
                        Не выдан
                        @endif
                    </td>
                    <td class="border border-solid border-black pl-1">{{$claim->reg_num}}</td>
                    <td class="border border-solid border-black pl-1">{{$claim->phone}}</td>
                    <td class="border border-solid border-black pl-1">{{round($claim->power, 1) }}</td>
                    <td class="border border-solid border-black pl-1">
                        @if($claim->connection)
                        {{$claim->connection->pc}} - {{$claim->connection->vl}} - {{$claim->connection->tp}}
                        @else
                            Нету данных
                        @endif
                    </td>
                </tr>
            @php $i++; @endphp
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" class="pl-1 pr-2 text-right font-semibold">Итого:</td>
                    <td colspan="2" class="pl-1 font-semibold">{{round($powers, 1)}} кВт</td>
                </tr>
            </tfoot>
        </table>

        <div class="mt-6">
            <form action="{{route('report.summaryExport')}}" method="POST">
                @csrf
                @foreach($validated as $key=>$value)
                    <input type="hidden" name="{{$key}}"  value="{{$value}}">
                @endforeach
                <button type="submit" class="font-semibold text-xl text-green-700">📥 Выгрузить в Excel</button>
            </form>
        </div>
    </div>
@endsection
