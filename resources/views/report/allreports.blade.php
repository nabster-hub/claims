@extends('_layouts.master')
@section('body')
    <h2 class="text-gray-700 text-3xl font-medium">Отчёты</h2>
    <div class="flex flex-col mt-8 rounded-lg bg-white min-h-[700px] p-8">
        <h3 class="text-gray-700 text-2xl font-medium mb-4">Выберите отчёт</h3>
        <div class="p-4 flex flex-col gap-2">
            <a href="{{route('report.summary')}}" class="font-medium text-xl text-blue-700">1. Сводный отчёт</a>
            <a href="{{route('report.doneSummary')}}" class="font-medium text-xl text-blue-700">2. Сводный отчёт по завершенным</a>
        </div>

    </div>
@endsection
