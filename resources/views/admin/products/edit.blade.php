@extends('admin.layouts.app')

@section('content')
<h2>Edit Product</h2>

@if($errors->any())
    <div style="background:#ffdede; color:#900; padding:10px; margin-bottom:15px;">
        <ul style="margin:0;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
    @csrf

    <div style="margin-bottom:15px;">
        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name', $product->name) }}" style="width:400px; padding:8px;">
    </div>

    <div style="margin-bottom:15px;">
        <label>Type</label><br>
        <select name="type" style="width:400px; padding:8px;">
            <option value="coffee" {{ old('type', $product->type) == 'coffee' ? 'selected' : '' }}>Coffee</option>
            <option value="drink" {{ old('type', $product->type) == 'drink' ? 'selected' : '' }}>Drink</option>
            <option value="dessert" {{ old('type', $product->type) == 'dessert' ? 'selected' : '' }}>Dessert</option>
            <option value="starter" {{ old('type', $product->type) == 'starter' ? 'selected' : '' }}>Starter</option>
            <option value="main dish" {{ old('type', $product->type) == 'main dish' ? 'selected' : '' }}>Main Dish</option>
        </select>
    </div>

    <div style="margin-bottom:15px;">
        <label>Price</label><br>
        <input type="text" name="price" value="{{ old('price', $product->price) }}" style="width:400px; padding:8px;">
    </div>

    <div style="margin-bottom:15px;">
        <label>Status</label><br>
        <select name="status" style="width:400px; padding:8px;">
            <option value="active" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <div style="margin-bottom:15px;">
        <label>Description</label><br>
        <textarea name="description" rows="5" style="width:400px; padding:8px;">{{ old('description', $product->description) }}</textarea>
    </div>

    <div style="margin-bottom:15px;">
        <label>Current Image</label><br>
        @if(!empty($product->image))
            <img src="{{ asset('images/' . $product->image) }}" alt="" width="120" style="margin-bottom:10px;"><br>
        @else
            <span>No image</span><br>
        @endif

        <label>Change Image</label><br>
        <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp">
    </div>

    <button type="submit">Update Product</button>
    <a href="{{ route('admin.products.index') }}">Back</a>
</form>
@endsection