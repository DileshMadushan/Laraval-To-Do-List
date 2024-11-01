<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Send Messages for Users') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm my-4 sm:rounded-lg">
                <div class="font-bold text-xl">{{$message->title}}</div>
                <div class="font-bold text-2m">{{$message->description}}</div>
                <div>{{$message->created_at}}</div>
                <div>{{ $message->admin->name }}</div>
            </div>           
        </div>
    </div>
</x-app-layout>