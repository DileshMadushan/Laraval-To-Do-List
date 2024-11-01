<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <div>
            <a href = "{{route('task')}}" class="bg-white">Add Task</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <table class="table-auto">
  <thead>
    <tr>
      <th class="px-4 py-2">Title</th>
      <th class="px-4 py-2">Description</th>
      <th class="px-4 py-2">Status</th>
      <th class="px-4 py-2">Action</th>
    </tr>
  </thead>
  <tbody>
   @foreach ($list as $task)
   <tr>
    <td>{{$task->title}}</td>
    <td>{{$task->description}}</td>
    @if ($task->completed == 0)
    <td>Incomplete</td>
    @elseif ($task->completed == 1)
    <td>complete</td>
    @endif
    <td>
    <a href="{{route('edittask',$task->id)}}" class="bg-yellow-800 text-white font-bold py-2 px-4 rounded">Edit</a>

        <a href="{{route('deletetask',$task->id)}}" class="bg-red-800 text-white font-bold py-2 px-4 rounded">Delete</a>
    </td>
</tr>
@endforeach
  </tbody>
</table>
            </div>
        </div>
    </div>
</x-app-layout>
