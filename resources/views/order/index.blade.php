<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Courses</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

    @extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <h1 style="color: #dc3545; text-align: center; margin-bottom: 20px;">Manage Orders</h1>

    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 25px; border: 1px solid #ddd;">
        <h3 style="margin-top:0;">+ Add New Order</h3>
        <form action="{{ route('orders.store') }}" method="POST" style="display: flex; gap: 10px; flex-wrap: wrap;">
            @csrf
            <select name="user_id" required style="padding: 8px; flex: 1;">
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>

            <select name="product_id" required style="padding: 8px; flex: 1;">
                <option value="">Select Initial Product</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} (${{ $product->price }})</option>
                @endforeach
            </select>

            <input type="number" name="quantity" value="1" placeholder="Qty" required style="padding: 8px; width: 80px;">

            <button type="submit" class="btn btn-create">Store Order</button>
        </form>
    </div>

    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Created At</th>
                <th style="text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name ?? 'N/A' }}</td>
                <td>{{ $order->created_at }}</td>
                <td>
                    <div class="action-btns">
                       
                        <button class="btn btn-view" onclick="alert('Order #{{ $order->id }}\nUser: {{ $order->user->name ?? 'N/A' }}\nDate: {{ $order->created_at }}')">
                            View
                        </button>

                        
                        <button class="btn btn-edit" onclick="toggleForm('edit-order-{{ $order->id }}')">
                            Edit
                        </button>

                        
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('تأكيد الحذف؟')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>

            <!-- EDIT INLINE -->
            <tr id="edit-order-{{ $order->id }}" style="display: none; background: #eef9ff;">
                <td colspan="4" style="padding: 15px;">
                    <form action="{{ route('orders.update', $order->id) }}" method="POST" style="display: flex; gap: 10px; flex-wrap: wrap;">
                        @csrf
                        @method('PUT')
                        <select name="user_id" required style="padding: 6px; flex: 1;">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn btn-edit">Update User Order</button>
                        <button type="button" class="btn" style="background:#6c757d; color:#fff;" onclick="toggleForm('edit-order-{{ $order->id }}')">Cancel</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function toggleForm(id) {
        var row = document.getElementById(id);
        row.style.display = (row.style.display === 'none') ? 'table-row' : 'none';
    }
</script>
@endsection
                </table>
            </div>
        </div>
    </div>

</body>
</html>
