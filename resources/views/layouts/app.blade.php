<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Task Manager</a>
        
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#allTasksModal">
            <i class="fas fa-list"></i> All Tasks
        </button>
    </div>
</nav>



    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

</body>
</html>
