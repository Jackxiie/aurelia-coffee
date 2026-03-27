@extends('admin.layouts.app')

@section('content')
<h2>Add Product</h2>

@if($errors->any())
    <div style="background:#ffdede; color:#900; padding:10px; margin-bottom:15px;">
        <ul style="margin:0;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
    @csrf

    <div style="margin-bottom:15px;">
        <label>Name</label><br>
        <input type="text" name="name" value="{{ old('name') }}" style="width:400px; padding:8px;">
    </div>

    <div style="margin-bottom:15px;">
        <label>Type</label><br>
        <select name="type" style="width:400px; padding:8px;">
            <option value="">-- Select Type --</option>
            <option value="coffee" {{ old('type') == 'coffee' ? 'selected' : '' }}>Coffee</option>
            <option value="drink" {{ old('type') == 'drink' ? 'selected' : '' }}>Drink</option>
            <option value="dessert" {{ old('type') == 'dessert' ? 'selected' : '' }}>Dessert</option>
            <option value="starter" {{ old('type') == 'starter' ? 'selected' : '' }}>Starter</option>
            <option value="main dish" {{ old('type') == 'main dish' ? 'selected' : '' }}>Main Dish</option>
        </select>
    </div>

    <div style="margin-bottom:15px;">
        <label>Price</label><br>
        <input type="text" name="price" value="{{ old('price') }}" style="width:400px; padding:8px;">
    </div>

    <div style="margin-bottom:15px;">
        <label>Status</label><br>
        <select name="status" style="width:400px; padding:8px;">
            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <div style="margin-bottom:15px;">
        <label>Description</label><br>
        <textarea name="description" rows="5" style="width:400px; padding:8px;">{{ old('description') }}</textarea>
    </div>

    <div style="margin-bottom:15px;">
        <label>Image</label><br>
        <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp">
    </div>

    <button type="submit">Add Product</button>
    <a href="{{ route('admin.products.index') }}">Back</a>
</form>
@endsection