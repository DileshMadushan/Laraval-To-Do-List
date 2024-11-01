<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Send Messages for Users') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form class="max-w-7xl mx-auto sm:px-6 lg:px-8" action="{{ route('send_message') }}" method="POST">
                @csrf
                <div class="mt-4 flex flex-col bg-gray-100 rounded-lg p-4 shadow-sm">
                    <h2 class="text-black font-bold text-lg">Send Messages for Users</h2>

                    <div class="mt-4">
                        <label class="text-black" for="msg_title">Title</label>
                        <input type="text" placeholder="Message Title" name="msg_title" id="msg_title" class="w-full bg-white rounded-md border-gray-300 text-black px-2 py-1" type="text">
                    </div>

                    <div class="mt-4">
                        <label class="text-black" for="msg_description">Discription</label>
                        <textarea type="text" placeholder="Message Discription" name="msg_description" id="msg_description" class="w-full bg-white rounded-md border-gray-300 text-black px-2 py-1" id="address"></textarea>
                    </div>

                    <div class="mt-4">
                        <input type="checkbox" name="is_users"> Is Send All Users
                    </div>

                    <div class="mt-4">
                        <label class="text-black">Select Users</label>
                        @foreach ($users as $user)
                        <div>
                            <input type="checkbox" name="user_ids[]" value="{{ $user->id }}" id="user_{{ $user->id }}">
                            <label for="user_{{ $user->id }}">{{ $user->name }}</label>
                        </div>
                        @endforeach
                    </div>


                    <div class="mt-4 flex justify-end">
                        <button type='submit' class="bg-blue-200 text-black rounded-md px-4 py-1 hover:bg-blue-600 hover:text-gray-900" type="submit">Send Message</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>