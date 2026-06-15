@extends('layout.app')

@section('page_title', 'List Category')

@section('content')
<div class="border-b border-gray-100 px-6 py-4 flex justify-between items-center bg-gray-50/50">
    <h2 class="text-xl font-bold text-gray-700">Categories</h2>
    <a href="{{ route('categories.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm px-4 py-2 rounded-md transition duration-150 shadow-sm">
        Add Category
    </a>
</div>

<div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-50 border-b border-gray-200">
                <th class="px-6 py-3 text-xs font-bold uppercase tracking-wider text-gray-600 w-16">ID</th>
                <th class="px-6 py-3 text-xs font-bold uppercase tracking-wider text-gray-600">Name</th>
                <th class="px-6 py-3 text-xs font-bold uppercase tracking-wider text-gray-600">Description</th>
                <th class="px-6 py-3 text-xs font-bold uppercase tracking-wider text-gray-600 w-32">Is Active</th>
          
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
            @foreach($categories as $category)
            <tr class="hover:bg-slate-50/80 transition duration-100">
                <td class="px-6 py-4 font-medium text-gray-500">{{ $category->id }}</td>
                <td class="px-6 py-4 font-semibold text-gray-900">{{ $category->name }}</td>
                <td class="px-6 py-4 text-gray-500 max-w-xs truncate">{{ $category->description }}</td>
                <td class="px-6 py-4">
                    @if($category->is_active)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">Active</span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-700">In-Active</span>
                    @endif
                </td>
                <td class="px-6 py-4 space-x-2 flex items-center">
                    <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-600 hover:text-blue-800 font-medium underline">Edit</a>
                    
                    <form action="{{ route('api.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');" class="inline" data-api-form data-redirect="{{ route('categories.index') }}">
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