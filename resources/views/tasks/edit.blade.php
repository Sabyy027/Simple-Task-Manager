@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Task</h2>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Task Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $task->description }}</textarea>
        </div>

        <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-control" id="status" name="status">
            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
</div>
@endsection
