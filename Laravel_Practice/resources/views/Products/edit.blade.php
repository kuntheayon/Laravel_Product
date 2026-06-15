@extends('layout.app')

@section('page_title', 'Update Product')

@section('content')
<div class="border-b border-gray-100 px-6 py-4 flex justify-between items-center bg-gray-50/50">
    <h2 class="text-xl font-bold text-gray-700">Edit Product</h2>
    <a href="{{ route('categories.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm px-4 py-2 rounded-md transition duration-150 shadow-sm">
        Back
    </a>
</div>

<form action="{{ route('api.products.update', $product->id) }}" method="POST" class="p-6 space-y-5" data-api-form data-redirect="{{ route('categories.index') }}">
    @csrf
    @method('PUT')
    
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1" for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" class="w-full px-3 py-2 border @error('name') border-red-500 ring-1 ring-red-100 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('name')
            <p class="mt-1 text-xs text-red-600 font-medium" data-error-for="name">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1" for="description">Description</label>
        <textarea id="description" name="description" rows="4" class="w-full px-3 py-2 border @error('description') border-red-500 ring-1 ring-red-100 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $category->description) }}</textarea>
        @error('description')
            <p class="mt-1 text-xs text-red-600 font-medium" data-error-for="description">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center">
        <label class="inline-flex items-center cursor-pointer text-sm font-semibold text-gray-700 select-none">
            Is Active
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $category->is_active) ? 'checked' : '' }} class="ml-2 w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
        </label>
    </div>

    <div class="pt-2">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-5 py-2.5 rounded-md transition duration-150 shadow-sm cursor-pointer">
            Update
        </button>
    </div>
</form>
@endsection