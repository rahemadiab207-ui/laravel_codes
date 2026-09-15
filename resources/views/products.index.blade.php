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
<div class="container" style="max-width: 900px; margin: auto;">

    
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <h1 style="color: #dc3545; text-align: center;">Manage Products</h1>

    
    <div style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 25px; border: 1px solid #ddd;">
        <h3>Add New Product (Create & Store)</h3>
        <form action="{{ route('products.store') }}" method="POST" style="display: flex; gap: 10px; flex-wrap: wrap;">
            @csrf
            <input type="text" name="name" placeholder="Product Name" required style="padding: 8px; flex: 1;">
            <input type="number" step="0.01" name="price" placeholder="Price" required style="padding: 8px; width: 120px;">
            <input type="number" name="quantity" placeholder="Quantity" required style="padding: 8px; width: 100px;">
            
            <select name="category_id" required style="padding: 8px;">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <button type="submit" style="background: #198754; color: white; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer;">
                + Store
            </button>
        </form>
    </div>

    
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #eee;">
                <th style="padding: 10px; border: 1px solid #ddd;">ID</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Name</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Price</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Category</th>
                <th style="padding: 10px; border: 1px solid #ddd; text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $product->id }}</td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $product->name }}</td>
                <td style="padding: 10px; border: 1px solid #ddd;">${{ $product->price }}</td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $product->category->name ?? 'N/A' }}</td>
                <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">
                    
                   
                    <button onclick="alert('Product Details:\nName: {{ $product->name }}\nPrice: ${{ $product->price }}\nQty: {{ $product->quantity }}')" 
                            style="background: #ffc107; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer;">
                        View
                    </button>

              
                    <button onclick="toggleEditForm({{ $product->id }})" 
                            style="background: #0dcaf0; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer;">
                        Edit
                    </button>

                    
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Confirm Delete?')" 
                                style="background: #dc3545; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer;">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>

           
            <tr id="edit-row-{{ $product->id }}" style="display: none; background: #eef9ff;">
                <td colspan="5" style="padding: 15px;">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" style="display: flex; gap: 10px; flex-wrap: wrap;">
                        @csrf
                        @method('PUT')
                        <input type="text" name="name" value="{{ $product->name }}" required style="padding: 6px; flex: 1;">
                        <input type="number" step="0.01" name="price" value="{{ $product->price }}" required style="padding: 6px; width: 100px;">
                        <input type="number" name="quantity" value="{{ $product->quantity }}" required style="padding: 6px; width: 80px;">
                        
                        <select name="category_id" required style="padding: 6px;">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        <button type="submit" style="background: #0d6efd; color: white; border: none; padding: 6px 12px; border-radius: 3px;">
                            Update
                        </button>
                        <button type="button" onclick="toggleEditForm({{ $product->id }})" style="background: #6c757d; color: white; border: none; padding: 6px 12px; border-radius: 3px;">
                            Cancel
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    // JS بسيط لإظهار وإخفاء صف التعديل الخاص بكل عنصر
    function toggleEditForm(id) {
        var row = document.getElementById('edit-row-' + id);
        if (row.style.display === 'none') {
            row.style.display = 'table-row';
        } else {
            row.style.display = 'none';
        }
    }
</script>
@endsection
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
