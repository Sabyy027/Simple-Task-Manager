@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Task List</h2>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    
                    <td>
                        @if($task->status == 'completed')
                            <span class="badge bg-success">Completed</span>
                        @else
                            <span class="badge bg-warning">Pending</span>
                        @endif
                    </td>
            
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal" data-task-id="{{ $task->id }}">
                            Delete
                            </button>
                        </form>

                
                    <script>
                    $(document).ready(function () {
                        let deleteForm = $("#deleteForm");

                        $(".delete-btn").click(function () {
                            let taskId = $(this).data("task-id");
                            deleteForm.attr("action", "/tasks/" + taskId);
                        });
                    });
                    </script>

                

                </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add New Task</a>

    <!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this task?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- All Tasks Modal -->
<div class="modal fade" id="allTasksModal" tabindex="-1" aria-labelledby="allTasksModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="allTasksModalLabel">All Tasks</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Completed Tasks Section -->
                <h5 class="text-success">✅ Completed Tasks</h5>
                <ul class="list-group mb-3">
                    @foreach ($tasks as $task)
                        @if ($task->status == 'completed')
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $task->title }}
                                <span class="badge bg-success">Completed</span>
                            </li>
                        @endif
                    @endforeach
                </ul>

                <!-- Pending Tasks Section -->
                <h5 class="text-warning">⚠️ Pending Tasks</h5>
                <ul class="list-group">
                    @foreach ($tasks as $task)
                        @if ($task->status == 'pending')
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $task->title }}
                                <span class="badge bg-warning text-dark">Pending</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>


</div>
@endsection      
