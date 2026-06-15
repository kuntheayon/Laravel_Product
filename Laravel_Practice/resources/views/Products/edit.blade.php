@extends('layout.app')

@section('page_title', 'Update Product')

@section('content')
<div class="border-b border-gray-100 px-6 py-4 flex justify-between items-center bg-gray-50/50">
    <h2 class="text-xl font-bold text-gray-700">Edit Product</h2>
    <a href="{{ route('products.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm px-4 py-2 rounded-md transition duration-150 shadow-sm">
        Back
    </a>
</div>

<form action="{{ route('api.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5" data-api-form data-redirect="{{ route('products.index') }}">
    @csrf
    @method('PUT')

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1" for="category_id">Category</label>
        <select id="category_id" name="category_id" class="w-full px-3 py-2 border @error('category_id') border-red-500 ring-1 ring-red-100 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">Select category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <p class="mt-1 text-xs text-red-600 font-medium" data-error-for="category_id">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1" for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" class="w-full px-3 py-2 border @error('name') border-red-500 ring-1 ring-red-100 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('name')
            <p class="mt-1 text-xs text-red-600 font-medium" data-error-for="name">{{ $message }}</p>
        @enderror
    </div>

    @if($product->image)
        <div>
            <span class="block text-sm font-semibold text-gray-700 mb-2">Current Image</span>
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="max-h-48 rounded-lg border border-gray-200 object-contain bg-gray-50">
        </div>
    @endif

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1" for="image">Replace Image</label>
        <input type="file" id="image" name="image" accept="image/*" class="w-full px-3 py-2 border @error('image') border-red-500 ring-1 ring-red-100 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        <p class="mt-1 text-xs text-gray-500">Leave empty to keep the current image.</p>
        @error('image')
            <p class="mt-1 text-xs text-red-600 font-medium" data-error-for="image">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1" for="price">Price</label>
            <input type="number" id="price" name="price" step="0.01" min="0" value="{{ old('price', $product->price) }}" class="w-full px-3 py-2 border @error('price') border-red-500 ring-1 ring-red-100 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('price')
                <p class="mt-1 text-xs text-red-600 font-medium" data-error-for="price">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1" for="stock">Stock</label>
            <input type="number" id="stock" name="stock" min="0" value="{{ old('stock', $product->stock) }}" class="w-full px-3 py-2 border @error('stock') border-red-500 ring-1 ring-red-100 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('stock')
                <p class="mt-1 text-xs text-red-600 font-medium" data-error-for="stock">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="flex items-center">
        <label class="inline-flex items-center cursor-pointer text-sm font-semibold text-gray-700 select-none">
            Is Active
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }} class="ml-2 w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
        </label>
    </div>

    <div class="pt-2">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-5 py-2.5 rounded-md transition duration-150 shadow-sm cursor-pointer">
            Update
        </button>
    </div>
</form>
@endsection
