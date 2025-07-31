<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employee Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Optional Custom CSS -->
    <link rel="stylesheet" href="/employee-management/assets/css/style.css">
    <link rel="icon" href="/employee-management/assets/images/favicon.png" type="image/png">
</head>

<body class="d-flex flex-column min-vh-100"> <!-- Makes body flex column -->

    <nav class="navbar navbar-expand-lg bg-primary bg-gradient navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/employee-management/index.php">EMS</a>

            <!-- Hamburger button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/employee-management/add.php">
                            <i class="bi bi-plus-circle"></i> Add Employee
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <main class="flex-grow-1"> <!-- Main content starts -->
        <div class="container mt-4">