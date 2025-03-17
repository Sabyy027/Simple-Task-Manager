@extends('layouts.app')

@section('content')
<div class="container mt-5">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <h2>Create New Task</h2>

    <form id="taskForm" action="{{ route('tasks.store') }}" method="POST" class="p-4 border rounded bg-light">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Task Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
            <span id="titleError" class="text-danger"></span>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Create Task</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
$(document).ready(function () {
    $("#taskForm").submit(function (event) {
        let isValid = true;
        let title = $("#title").val().trim();

        if (title === "") {
            $("#titleError").text("Title is required.");
            isValid = false;
        } else {
            $("#titleError").text("");
        }

        if (!isValid) {
            event.preventDefault(); // Stop form submission
        }
    });
});
</script>

@endsection
