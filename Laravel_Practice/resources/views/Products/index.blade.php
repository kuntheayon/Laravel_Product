@extends('layout.app')

@section('page_title', 'List Product')

@section('content')
<div class="border-b border-gray-100 px-6 py-4 flex justify-between items-center bg-gray-50/50">
    <h2 class="text-xl font-bold text-gray-700">Products</h2>
    <a href="{{ route('products.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm px-4 py-2 rounded-md transition duration-150 shadow-sm">
        Add Product
    </a>
</div>

<div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-50 border-b border-gray-200">
                <th class="px-6 py-3 text-xs font-bold uppercase tracking-wider text-gray-600 w-16">ID</th>
                <th class="px-6 py-3 text-xs font-bold uppercase tracking-wider text-gray-600">Image</th>
                <th class="px-6 py-3 text-xs font-bold uppercase tracking-wider text-gray-600">Name</th>
                <th class="px-6 py-3 text-xs font-bold uppercase tracking-wider text-gray-600">Category</th>
                <th class="px-6 py-3 text-xs font-bold uppercase tracking-wider text-gray-600">Price</th>
                <th class="px-6 py-3 text-xs font-bold uppercase tracking-wider text-gray-600">Stock</th>
                <th class="px-6 py-3 text-xs font-bold uppercase tracking-wider text-gray-600 w-32">Is Active</th>
                <th class="px-6 py-3 text-xs font-bold uppercase tracking-wider text-gray-600 w-40">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
            @foreach($products as $product)
            <tr class="hover:bg-slate-50/80 transition duration-100">
                <td class="px-6 py-4 font-medium text-gray-500">{{ $product->id }}</td>
                <td class="px-6 py-4">
                    @if($product->image)
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="h-12 w-12 rounded object-cover border border-gray-200">
                    @else
                        <span class="text-xs text-gray-400">No image</span>
                    @endif
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900">{{ $product->name }}</td>
                <td class="px-6 py-4 text-gray-500">{{ $product->category->name ?? '-' }}</td>
                <td class="px-6 py-4 text-gray-900">${{ number_format($product->price, 2) }}</td>
                <td class="px-6 py-4 text-gray-500">{{ $product->stock }}</td>
                <td class="px-6 py-4">
                    @if($product->is_active)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">Active</span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-700">In-Active</span>
                    @endif
                </td>
                <td class="px-6 py-4 space-x-2 flex items-center">
                    <a href="{{ route('products.show', $product->id) }}" class="text-blue-600 hover:text-blue-800 font-medium underline">View</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-800 font-medium underline">Edit</a>

                    <form action="{{ route('api.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');" class="inline" data-api-form data-redirect="{{ route('products.index') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-blue-600 hover:text-blue-800 font-medium underline cursor-pointer">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
