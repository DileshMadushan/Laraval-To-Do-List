<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div>
        <a href = "{{route('task')}}" class="cursor-default bg-transparent mx-4 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Add Task</a>
    </div>
    <div>
        <a href = "{{route('tasklist')}}" class="cursor-default bg-transparent mx-4 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">View Task</a>
    </div>
    @if (Auth::user()->user_role=="Admin")
    <div>
        <a href = "{{route('adminmessage')}}" class="cursor-default bg-transparent mx-4 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Send Masseage</a>
    </div>
    @endif

    <a href="{{ route('show_msgs') }}"
                class="cursor-default bg-transparent mx-4 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Admin Messages <span class="bg-red-400 text-white px-2 py-1 rounded">{{ $message_count }}</span>
            </a>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
