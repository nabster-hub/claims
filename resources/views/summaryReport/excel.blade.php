<h3 class="text-center font-medium text-2xl mb-4">С {{\Carbon\Carbon::parse($validated['sday'])->format('d.m.Y')}} ПО {{\Carbon\Carbon::parse($validated['eday'])->format('d.m.Y')}}</h3>
<table class="border-2 border-solid border-black">
    <thead class="border border-solid border-black">
    <tr>
        <td class="border border-solid border-black font-semibold text-center">№</td>
        <td class="border border-solid border-black font-semibold text-center">ФИО Наименование организации</td>
        <td class="border border-solid border-black font-semibold text-center">Адрес объекта</td>
        <td class="border border-solid border-black font-semibold text-center">Дата выдачи тех. условия</td>
        <td class="border border-solid border-black font-semibold text-center">№ тех. условия</td>
        <td class="border border-solid border-black font-semibold text-center">Телефон Контакты</td>
        <td class="border border-solid border-black font-semibold text-center">Мощность кВт</td>
        <td class="border border-solid border-black font-semibold text-center">Точка подключения</td>
    </tr>
    </thead>
    <tbody>
    @php $i=1; @endphp
    @foreach($claims as $claim)
        <tr>
            <td class="border border-solid border-black text-center">{{$i}}</td>
            <td class="border border-solid border-black pl-1">{{$claim->full_name}}</td>
            <td class="border border-solid border-black pl-1">{{$claim->address}}</td>
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
