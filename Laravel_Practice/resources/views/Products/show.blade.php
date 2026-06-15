@extends('layout.app')

@section('page_title', 'Category Details')

@section('content')
<div class="border-b border-gray-100 px-6 py-4 flex justify-between items-center bg-gray-50/50">
    <h2 class="text-xl font-bold text-gray-700">View Category #{{ $category->id }}</h2>
    <a href="{{ route('categories.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm px-4 py-2 rounded-md transition duration-150 shadow-sm">
        Back to List
    </a>
</div>

<div class="p-6 space-y-6">
    
    <div class="border-b border-gray-100 pb-4">
        <span class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-1">Category Name</span>
        <div class="text-lg font-semibold text-gray-900 bg-slate-50 border border-slate-100 rounded-md px-3 py-2">
            {{ $category->name }}
        </div>
    </div>

    <div class="border-b border-gray-100 pb-4">
        <span class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-1">Description</span>
        <div class="text-sm text-gray-700 bg-slate-50 border border-slate-100 rounded-md px-3 py-3 whitespace-pre-wrap min-h-[100px]">
            {{ $category->description }}
        </div>
    </div>

    <div class="border-b border-gray-100 pb-4">
        <span class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-2">Operational Status</span>
        <div>
            @if($category->is_active)
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 border border-emerald-200">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    Active
                </span>
            @else
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-700 border border-gray-200">
                    <span class="w-2 h-2 rounded-full bg-gray-400"></span>
                    In-Active
                </span>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
        <div class="bg-slate-50/50 p-3 rounded-lg border border-gray-100">
            <span class="block text-xs font-medium text-gray-400">Date Created</span>
            <span class="text-sm font-semibold text-gray-700">{{ $category->created_at->format('M d, Y \a\t h:i A') }}</span>
        </div>
        <div class="bg-slate-50/50 p-3 rounded-lg border border-gray-100">
            <span class="block text-xs font-medium text-gray-400">Last Updated</span>
            <span class="text-sm font-semibold text-gray-700">{{ $category->updated_at->format('M d, Y \a\t h:i A') }}</span>
        </div>
    </div>

    <div class="pt-4 flex justify-end gap-3 border-t border-gray-100">
        <a href="{{ route('categories.edit', $category->id) }}" class="bg-amber-500 hover:bg-amber-600 text-white font-semibold text-sm px-5 py-2.5 rounded-md transition duration-150 shadow-sm cursor-pointer">
            Modify Record
        </a>
    </div>

</div>
@endsection