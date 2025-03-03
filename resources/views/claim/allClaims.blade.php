@extends('_layouts.master')

@section('body')
    <h3 class="text-gray-700 text-3xl font-medium">Все заявления</h3>
    <div class="mt-4">

        @if(session('success'))
            <div class="bg-green-500 text-white w-1/2 p-4 border-md border-gray-800 rounded-xl mb-4">
                <p>{{session('success')}}</p>
            </div>
        @endif
    </div>

    <div class="flex flex-col mt-8">
        <div class="mt-6">
            <h2 class="text-xl font-semibold text-gray-700 leading-tight">Последние 10 заявок</h2>
             <div class="mt-3 flex flex-col sm:flex-row">
                 <div class="flex">
                     <div class="relative">
                         <select class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                             <option>5</option>
                             <option>10</option>
                             <option>20</option>
                         </select>

                         <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                             <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                 <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                             </svg>
                         </div>
                     </div>

                     <div class="relative">
                         <select class="appearance-none h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                             <option>All</option>
                             <option>Active</option>
                             <option>Inactive</option>
                         </select>

                         <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                             <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                 <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                             </svg>
                         </div>
                     </div>
                 </div>

                 <div class="block relative mt-2 sm:mt-0">
                     <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                         <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                             <path d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z"></path>
                         </svg>
                     </span>

                     <input placeholder="Search" class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                 </div>
             </div>

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
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm leading-5 font-medium text-gray-900">{{ $claim->full_name }}</div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">{{ $claim->address }}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold ">{{ $claim->phone }}</span>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-semibold">{{ $claim->power }}</td>

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
                            leading-5 font-semibold text-center
                            @if($claim->getWorkingDays() <= 3 && $claim->status !== 4) bg-green-100 text-green-800
                            @elseif($claim->getWorkingDays() <=5 && $claim->status !== 4) bg-yellow-100 text-yellow-800
                            @elseif($claim->getWorkingDays() > 5 && $claim->status !== 4) bg-red-100 text-red-800 @endif">
                                    {{ $claim->getWorkingDays() }}
                                </td>
                                <td class="px-1 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                    @if((Auth::user()->region_id===12 && $claim->status === 3) || (Auth::user()->id === $claim->user_id && $claim->status === 3 && $claim->type === 1))
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
                       <span class="text-xs xs:text-sm text-gray-900">Showing 1 to 4 of 50 Entries</span>

                       <div class="inline-flex mt-2 xs:mt-0">
                           <button class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l">Prev</button>
                           <button class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">Next</button>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
