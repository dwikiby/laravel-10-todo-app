@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
  <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
    @csrf
    @isset($task)
      @method('PUT')
    @endisset
    <div class="mb-3">
      <label for="title" class="form-label">
        Title
      </label>
      <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $task->title ?? old('title') }}" />
      @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ $task->description ?? old('description') }}</textarea>
      @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="long_description" class="form-label">Long Description</label>
      <textarea name="long_description" id="long_description" class="form-control @error('long_description') is-invalid @enderror" rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
      @error('long_description')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="d-flex align-items-center gap-2">
      <button type="submit" class="btn btn-primary">
        @isset($task)
          Update Task
        @else
          Add Task
        @endisset
      </button>
      <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
  </form>
@endsection