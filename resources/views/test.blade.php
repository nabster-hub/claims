@extends('_layouts.master')

@section('body')
    <div x-data="{dataOpen: false}">
        <button @click="console.log(dataOpen); dataOpen = !dataOpen"
            :class="{
                'bg-teal-500': dataOpen,
                'bg-yellow-500': !dataOpen
            }"
            class="p-2 text-white rounded"
                x-text="dataOpen ? 'RED' : 'BLUE'"
        >
        </button>

    </div>

@endsection
