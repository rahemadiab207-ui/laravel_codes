<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management System Dashboard</title>
    
    <!-- CSS STYLES -->
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #f4f6f9;
            color: #333;
            padding-bottom: 40px;
        }

        /* NAVIGATION BAR */
        .navbar {
            background-color: #343a40;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            color: #ffffff;
            font-size: 20px;
            font-weight: bold;
            text-decoration: none;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 15px;
        }

        .nav-links a {
            color: #c2c7d0;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .nav-links a:hover, .nav-links a.active {
            background-color: #dc3545;
            color: #ffffff;
        }

        /* CONTAINER */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
        }

        /* TABLES */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background-color: #ffffff;
        }

        th, td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f8f9fa;
            color: #495057;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #fcfcfc;
        }

        /* BUTTONS */
        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 13px;
            text-decoration: none;
            display: inline-block;
            transition: background 0.2s;
        }

        .btn-create {
            background-color: #28a745;
            color: white;
        }
        .btn-create:hover { background-color: #218838; }

        .btn-view {
            background-color: #17a2b8;
            color: white;
        }
        .btn-view:hover { background-color: #138496; }

        .btn-edit {
            background-color: #ffc107;
            color: #212529;
        }
        .btn-edit:hover { background-color: #e0a800; }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .btn-delete:hover { background-color: #c82333; }

        .action-btns {
            display: flex;
            gap: 5px;
            justify-content: center;
        }

        /* FORM INPUTS */
        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="password"],
        select {
            border: 1px solid #ced4da;
            border-radius: 4px;
            outline: none;
        }

        input:focus, select:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a class="navbar-brand" href="#">Dashboard System</a>
        <ul class="nav-links">
            <li><a href="{{ route('categories.index') }}">Categories</a></li>
            <li><a href="{{ route('products.index') }}">Products</a></li>
            <li><a href="{{ route('users.index') }}">Users</a></li>
            <li><a href="{{ route('orders.index') }}">Orders</a></li>
            <li><a href="{{ route('order-items.index') }}">Order Items</a></li>
        </ul>
    </nav>

    
    <main>
        @yield('content')
    </main>

</body>
</html>