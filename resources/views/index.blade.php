@extends('layouts.app')

@section('title', 'Todo List')
@section('content')
    <h1 class="mb-4 font-bold text-3xl">Todo List App</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>

    @forelse ($tasks as $task)
        <div class="mb-2 mt-2">
            <div @class(['card shadow-sm', 'bg-slate-200' => $task->completed])>
                <div class="card-body">
                    <a href="{{ route('tasks.show',  ['task' => $task->id])}}" @class(['line-through' => $task->completed])>{{$task->title}}</a>
                </div>
            </div>
        </div>
    @empty
        <div class="card">
            <div class="card-body">
                <p>
                    No tasks
                </p>
            </div>
        </div>
    @endforelse

    @if (count($tasks) > 0)
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection