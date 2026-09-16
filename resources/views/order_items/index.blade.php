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

    <h1 style="color: #dc3545; text-align: center; margin-bottom: 20px;">Manage Order Items</h1>

    
    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 25px; border: 1px solid #ddd;">
        <h3 style="margin-top:0;">+ Add New Order Item</h3>
        <form action="{{ route('order-items.store') }}" method="POST" style="display: flex; gap: 10px; flex-wrap: wrap;">
            @csrf
            
            <select name="order_id" required style="padding: 8px; flex: 1;">
                <option value="">Select Order</option>
                @foreach($orders as $order)
                    <option value="{{ $order->id }}">Order #{{ $order->id }} ({{ $order->user->name ?? 'User N/A' }})</option>
                @endforeach
            </select>

           
            <select name="product_id" required style="padding: 8px; flex: 1;">
                <option value="">Select Product</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} (${{ $product->price }})</option>
                @endforeach
            </select>

            
            <input type="number" name="quantity" placeholder="Qty" value="1" min="1" required style="padding: 8px; width: 80px;">
            <input type="number" step="0.01" name="price" placeholder="Price (Optional)" style="padding: 8px; width: 130px;">

            <button type="submit" class="btn btn-create">Store Item</button>
        </form>
    </div>

    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Order ID</th>
                <th>Product</th>
                <th>Price Unit</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th style="text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderItems as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>Order #{{ $item->order_id }}</td>
                <td>{{ $item->product->name ?? 'N/A' }}</td>
                <td>${{ number_format($item->price, 2) }}</td>
                <td>{{ $item->quantity }}</td>
                <td><strong>${{ number_format($item->price * $item->quantity, 2) }}</strong></td>
                <td>
                    <div class="action-btns">
                        <!-- SHOW (VIEW) BUTTON -->
                        <button class="btn btn-view" onclick="alert('Item Details:\nID: {{ $item->id }}\nOrder: #{{ $item->order_id }}\nProduct: {{ $item->product->name ?? 'N/A' }}\nPrice: ${{ $item->price }}\nQuantity: {{ $item->quantity }}\nSubtotal: ${{ $item->price * $item->quantity }}')">
                            View
                        </button>

                        <!-- EDIT BUTTON -->
                        <button class="btn btn-edit" onclick="toggleForm('edit-item-{{ $item->id }}')">
                            Edit
                        </button>

                        <!-- DESTROY BUTTON -->
                        <form action="{{ route('order-items.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('تأكيد الحذف؟')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>

            <!-- 3. INLINE EDIT FORM (UPDATE) -->
            <tr id="edit-item-{{ $item->id }}" style="display: none; background: #eef9ff;">
                <td colspan="7" style="padding: 15px;">
                    <form action="{{ route('order-items.update', $item->id) }}" method="POST" style="display: flex; gap: 10px; flex-wrap: wrap;">
                        @csrf
                        @method('PUT')
                        
                        <select name="order_id" required style="padding: 6px; flex: 1;">
                            @foreach($orders as $order)
                                <option value="{{ $order->id }}" {{ $item->order_id == $order->id ? 'selected' : '' }}>
                                    Order #{{ $order->id }} ({{ $order->user->name ?? 'User N/A' }})
                                </option>
                            @endforeach
                        </select>

                        <select name="product_id" required style="padding: 6px; flex: 1;">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ $item->product_id == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>

                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" required style="padding: 6px; width: 70px;">
                        <input type="number" step="0.01" name="price" value="{{ $item->price }}" required style="padding: 6px; width: 100px;">

                        <button type="submit" class="btn btn-edit">Update</button>
                        <button type="button" class="btn" style="background:#6c757d; color:#fff;" onclick="toggleForm('edit-item-{{ $item->id }}')">Cancel</button>
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
                   
        </div>
    </div>

</body>
</html>
