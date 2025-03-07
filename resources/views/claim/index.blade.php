@extends('_layouts.master')

@section('body')
    <h3 class="text-gray-700 text-3xl font-medium">Главная</h3>
    <div class="mt-4">

        @if(session('success'))
            <div class="bg-green-500 text-white w-1/2 p-4 border-md border-gray-800 rounded-xl mb-4">
                <p>{{session('success')}}</p>
            </div>
        @endif
        <div class="flex flex-wrap -mx-6">
            <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                    <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
{{--                        <svg class="h-8 w-8 text-white" viewBox="0 0 28 30" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <path d="M18.2 9.08889C18.2 11.5373 16.3196 13.5222 14 13.5222C11.6804 13.5222 9.79999 11.5373 9.79999 9.08889C9.79999 6.64043 11.6804 4.65556 14 4.65556C16.3196 4.65556 18.2 6.64043 18.2 9.08889Z" fill="currentColor"/>--}}
{{--                            <path d="M25.2 12.0444C25.2 13.6768 23.9464 15 22.4 15C20.8536 15 19.6 13.6768 19.6 12.0444C19.6 10.4121 20.8536 9.08889 22.4 9.08889C23.9464 9.08889 25.2 10.4121 25.2 12.0444Z" fill="currentColor"/>--}}
{{--                            <path d="M19.6 22.3889C19.6 19.1243 17.0927 16.4778 14 16.4778C10.9072 16.4778 8.39999 19.1243 8.39999 22.3889V26.8222H19.6V22.3889Z" fill="currentColor"/>--}}
{{--                            <path d="M8.39999 12.0444C8.39999 13.6768 7.14639 15 5.59999 15C4.05359 15 2.79999 13.6768 2.79999 12.0444C2.79999 10.4121 4.05359 9.08889 5.59999 9.08889C7.14639 9.08889 8.39999 10.4121 8.39999 12.0444Z" fill="currentColor"/>--}}
{{--                            <path d="M22.4 26.8222V22.3889C22.4 20.8312 22.0195 19.3671 21.351 18.0949C21.6863 18.0039 22.0378 17.9556 22.4 17.9556C24.7197 17.9556 26.6 19.9404 26.6 22.3889V26.8222H22.4Z" fill="currentColor"/>--}}
{{--                            <path d="M6.64896 18.0949C5.98058 19.3671 5.59999 20.8312 5.59999 22.3889V26.8222H1.39999V22.3889C1.39999 19.9404 3.2804 17.9556 5.59999 17.9556C5.96219 17.9556 6.31367 18.0039 6.64896 18.0949Z" fill="currentColor"/>--}}
{{--                        </svg>--}}

                        <svg class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                            <path d="M7 14H17M7 10H17M6.2 18H17.8C18.9201 18 19.4802 18 19.908 17.782C20.2843 17.5903 20.5903 17.2843 20.782 16.908C21 16.4802 21 15.9201 21 14.8V9.2C21 8.07989 21 7.51984 20.782 7.09202C20.5903 6.71569 20.2843 6.40973 19.908 6.21799C19.4802 6 18.9201 6 17.8 6H6.2C5.0799 6 4.51984 6 4.09202 6.21799C3.71569 6.40973 3.40973 6.71569 3.21799 7.09202C3 7.51984 3 8.07989 3 9.2V14.8C3 15.9201 3 16.4802 3.21799 16.908C3.40973 17.2843 3.71569 17.5903 4.09202 17.782C4.51984 18 5.07989 18 6.2 18Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>

                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{$newClaims}}</h4>
                        <div class="text-gray-500">Новых Заявлений</div>
                    </div>
                </div>
            </div>

            <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                    <div class="p-3 rounded-full bg-orange-600 bg-opacity-75">
                        <svg class="h-8 w-8 text-white" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.19999 1.4C3.4268 1.4 2.79999 2.02681 2.79999 2.8C2.79999 3.57319 3.4268 4.2 4.19999 4.2H5.9069L6.33468 5.91114C6.33917 5.93092 6.34409 5.95055 6.34941 5.97001L8.24953 13.5705L6.99992 14.8201C5.23602 16.584 6.48528 19.6 8.97981 19.6H21C21.7731 19.6 22.4 18.9732 22.4 18.2C22.4 17.4268 21.7731 16.8 21 16.8H8.97983L10.3798 15.4H19.6C20.1303 15.4 20.615 15.1004 20.8521 14.6261L25.0521 6.22609C25.2691 5.79212 25.246 5.27673 24.991 4.86398C24.7357 4.45123 24.2852 4.2 23.8 4.2H8.79308L8.35818 2.46044C8.20238 1.83722 7.64241 1.4 6.99999 1.4H4.19999Z" fill="currentColor"/>
                            <path d="M22.4 23.1C22.4 24.2598 21.4598 25.2 20.3 25.2C19.1403 25.2 18.2 24.2598 18.2 23.1C18.2 21.9402 19.1403 21 20.3 21C21.4598 21 22.4 21.9402 22.4 23.1Z" fill="currentColor"/>
                            <path d="M9.1 25.2C10.2598 25.2 11.2 24.2598 11.2 23.1C11.2 21.9402 10.2598 21 9.1 21C7.9402 21 7 21.9402 7 23.1C7 24.2598 7.9402 25.2 9.1 25.2Z" fill="currentColor"/>
                        </svg>
                    </div>

                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{ $claims->total() }}</h4>
                        <div class="text-gray-500">Всего Заявлений</div>
                    </div>
                </div>
            </div>

            <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                    <div class="p-3 rounded-full bg-pink-600 bg-opacity-75">
                        <svg class="h-8 w-8 text-white" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.99998 11.2H21L22.4 23.8H5.59998L6.99998 11.2Z" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                            <path d="M9.79999 8.4C9.79999 6.08041 11.6804 4.2 14 4.2C16.3196 4.2 18.2 6.08041 18.2 8.4V12.6C18.2 14.9197 16.3196 16.8 14 16.8C11.6804 16.8 9.79999 14.9197 9.79999 12.6V8.4Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>

                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{$closedClaims}}</h4>
                        <div class="text-gray-500">Закрытых Зявок</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8">

    </div>

    <div class="flex flex-col mt-8">
        <div class="mt-6">
            <h2 class="text-xl font-semibold text-gray-700 leading-tight">Последние 10 заявок</h2>

{{--            <div class="mt-3 flex flex-col sm:flex-row">--}}
{{--                <div class="flex">--}}
{{--                    <div class="relative">--}}
{{--                        <select class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">--}}
{{--                            <option>5</option>--}}
{{--                            <option>10</option>--}}
{{--                            <option>20</option>--}}
{{--                        </select>--}}

{{--                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">--}}
{{--                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
{{--                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="relative">--}}
{{--                        <select class="appearance-none h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">--}}
{{--                            <option>All</option>--}}
{{--                            <option>Active</option>--}}
{{--                            <option>Inactive</option>--}}
{{--                        </select>--}}

{{--                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">--}}
{{--                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
{{--                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="block relative mt-2 sm:mt-0">--}}
{{--                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">--}}
{{--                        <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">--}}
{{--                            <path d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z"></path>--}}
{{--                        </svg>--}}
{{--                    </span>--}}

{{--                    <input placeholder="Search" class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ФИО абонента / Наименования объекта</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Адрес / Расположение объекта</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Контакт</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Мощность</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Точка подключения</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Район</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Статус</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Дней в работе</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 min-w-[10%]"></th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-100 min-w-[10%]"></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($claims as $claim)
                        <tr @if($claim->type === 1) class="fiz-lic" @endif>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm leading-5 font-medium text-gray-900">{{ $claim->full_name }}
                                        <span class="text-[10px] block text-gray-400">{{$claim->created_at->format('d.m.y H:i:s')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{ $claim->address }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold ">{{ $claim->phone }}</span>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold">{{ round($claim->power, 1) }} квт.ч</td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold">
                                @if($claim->connection)
                                {{$claim->connection->pc}} - {{$claim->connection->vl}} - {{$claim->connection->tp}}
                                @else
                                    Нету данных
                                @endif
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold">{{ $claim->user->region->name }}</td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 text-center p-2">{{ $claim->step->name }}</span>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm
                            leading-5 font-semibold text-center bg-green-100
                            @if($claim->getWorkingDays() <= 3 && $claim->status !== 4) bg-green-100 text-green-800
                            @elseif($claim->getWorkingDays() <=5 && $claim->status !== 4) bg-yellow-100 text-yellow-800
                            @elseif($claim->getWorkingDays() > 5 && $claim->status !== 4) bg-red-100 text-red-800 @endif">
                                {{ $claim->getWorkingDays() }}
                            </td>
                            <td class="px-1 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                @if((Auth::user()->region_id===12 && $claim->status === 3 && $claim->type != 1) || (Auth::user()->id === $claim->user_id && $claim->status === 3 && $claim->type === 1))
                                    <a href="{{route('claim.stepThree', $claim->id)}}"
                                       class="bg-green-800 p-2 border border-gray-700 rounded-lg text-white
                                       hover:bg-green-600 text-center transition-all flex justify-center">Шаг 3</a>
                                @elseif(Auth::user()->id === $claim->user_id && $claim->status === 1)
                                    <a href="{{route('claim.stepOne', $claim->id)}}" class="bg-red-800 p-2 border border-gray-700 rounded-lg text-white
                                       hover:bg-red-600 text-center transition-all flex justify-center">Доработать</a>
                                @endif
                            </td>
                            <td class="px-1 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                <a href="{{route('claim.show', $claim->id)}}" class="bg-green-800 p-2 border border-gray-700 rounded-lg text-white
                                       hover:bg-green-600 text-center transition-all flex justify-center">Просмотреть</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
{{--                        <span class="text-xs xs:text-sm text-gray-900">Showing 1 to 4 of 50 Entries</span>--}}

{{--                        <div class="inline-flex mt-2 xs:mt-0">--}}
{{--                            <button class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l">Prev</button>--}}
{{--                            <button class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">Next</button>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
