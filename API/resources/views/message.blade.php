<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Send Messages for Users') }}
        </h2>
    </x-slot>
    <a href="{{ route('all_read') }}"
        class="cursor-default bg-transparent mx-4 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        Mark As All Read
    </a>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($messages as $message)
            <a href="{{ route('show_msg', ['title' => $message->title, 'id' => $message->id]) }}">
                <div class="bg-white overflow-hidden shadow-sm my-4 sm:rounded-lg">
                    @if ($message->is_read == 0)
                    <div class="font-bold text-xl">{{$message->title}}</div>
                    @elseif ($message->is_read == 1)
                    <div class="text-xl">{{$message->title}}</div>
                    @endif
                    <div>{{$message->created_at}}</div>
                    <div>{{ $message->admin->name }}</div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</x-app-layout>