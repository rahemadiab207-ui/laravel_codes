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

    <h1 style="color: #dc3545; text-align: center; margin-bottom: 20px;">Manage Categories</h1>

    
    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 25px; border: 1px solid #ddd;">
        <h3 style="margin-top:0;">+ Add New Category</h3>
        <form action="{{ route('categories.store') }}" method="POST" style="display: flex; gap: 10px; flex-wrap: wrap;">
            @csrf
            <input type="text" name="name" placeholder="Category Name" required style="padding: 8px; flex: 1;">
            <input type="text" name="description" placeholder="Description (Optional)" style="padding: 8px; flex: 2;">

            <button type="submit" class="btn btn-create">Store Category</button>
        </form>
    </div>

    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th style="text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description ?? 'N/A' }}</td>
                <td>
                    <div class="action-btns">
                        
                        <button class="btn btn-view" onclick="alert('Category Details:\nID: {{ $category->id }}\nName: {{ $category->name }}\nDescription: {{ $category->description }}')">
                            View
                        </button>

                        
                        <button class="btn btn-edit" onclick="toggleForm('edit-cat-{{ $category->id }}')">
                            Edit
                        </button>

                       
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('تأكيد الحذف؟')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>

            
            <tr id="edit-cat-{{ $category->id }}" style="display: none; background: #eef9ff;">
                <td colspan="4" style="padding: 15px;">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST" style="display: flex; gap: 10px; flex-wrap: wrap;">
                        @csrf
                        @method('PUT')
                        <input type="text" name="name" value="{{ $category->name }}" required style="padding: 6px; flex: 1;">
                        <input type="text" name="description" value="{{ $category->description }}" style="padding: 6px; flex: 2;">

                        <button type="submit" class="btn btn-edit">Update</button>
                        <button type="button" class="btn" style="background:#6c757d; color:#fff;" onclick="toggleForm('edit-cat-{{ $category->id }}')">Cancel</button>
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