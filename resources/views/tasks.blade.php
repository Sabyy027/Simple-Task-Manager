@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Task Manager</h2>

    <!-- Add Task Form -->
    <form id="taskForm">
        <div class="mb-3">
            <label for="title" class="form-label">Task Title</label>
            <input type="text" class="form-control" id="title" placeholder="Enter task title">
        </div>
        <button type="submit" class="btn btn-primary">Add Task</button>
    </form>

    <!-- Task List -->
    <ul class="list-group mt-4" id="taskList"></ul>
</div>

<!-- jQuery for Task Handling -->
<script>
$(document).ready(function() {
    $("#taskForm").submit(function(e) {
        e.preventDefault();
        let title = $("#title").val().trim();

        if (title === "") {
            alert("Task title cannot be empty!");
            return;
        }

        $("#taskList").append(`<li class="list-group-item d-flex justify-content-between">
            ${title} 
            <button class="btn btn-danger btn-sm delete-task">Delete</button>
        </li>`);
        
        $("#title").val(""); // Clear input field
    });

    $(document).on("click", ".delete-task", function() {
        $(this).parent().remove();
    });
});
</script>
@endsection
