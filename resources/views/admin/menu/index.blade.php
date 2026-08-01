@extends('admin.layout')

@section('title', 'Menu Management')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <h1 class="font-serif text-3xl text-cream">Menu Management</h1>
    <a href="{{ route('admin.menu.create') }}" class="btn-gold !px-5 !py-2.5 text-xs">+ Add Food Item</a>
</div>

{{-- Categories --}}
<div class="card p-6 mb-10 reveal">
    <h2 class="font-serif text-lg text-gold mb-4">Categories</h2>

    <div class="flex flex-wrap gap-2 mb-5">
        @foreach($categories as $category)
        <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" onsubmit="return confirm('Delete category {{ $category->name }}?');">
            @csrf
            @method('DELETE')
            <span class="inline-flex items-center gap-2 border border-gold/30 px-3 py-1.5 text-sm">
                {{ $category->name }}
                <button type="submit" class="text-red-400 hover:text-red-300 text-xs">&times;</button>
            </span>
        </form>
        @endforeach
    </div>

    <form method="POST" action="{{ route('admin.categories.store') }}" class="flex flex-wrap gap-3 items-end">
        @csrf
        <div>
            <label class="field-label">New Category</label>
            <input type="text" name="name" required placeholder="e.g. BBQ" class="input-field !w-auto">
        </div>
        <button type="submit" class="btn-xs-outline">Add Category</button>
    </form>
</div>

{{-- Menu Items --}}
<div class="overflow-x-auto border border-gold/20 reveal">
    <table class="w-full text-sm">
        <thead class="bg-bg-dark-2 text-cream/60 uppercase text-xs tracking-widest">
            <tr>
                <th class="text-left px-4 py-3">Image</th>
                <th class="text-left px-4 py-3">Name</th>
                <th class="text-left px-4 py-3">Category</th>
                <th class="text-left px-4 py-3">Price</th>
                <th class="text-left px-4 py-3">Featured</th>
                <th class="text-left px-4 py-3">Available</th>
                <th class="text-left px-4 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gold/10">
            @forelse($menuItems as $item)
            <tr class="table-row-hover">
                <td class="px-4 py-3"><img src="{{ $item->image }}" class="w-14 h-14 object-cover" alt="{{ $item->name }}"></td>
                <td class="px-4 py-3">{{ $item->name }}</td>
                <td class="px-4 py-3">{{ $item->category->name ?? '-' }}</td>
                <td class="px-4 py-3">Rs. {{ number_format($item->price) }}</td>
                <td class="px-4 py-3">
                    <span @class(['badge-status', 'border-gold/50 text-gold' => $item->is_featured, 'border-cream/20 text-cream/40' => ! $item->is_featured])>{{ $item->is_featured ? 'Yes' : 'No' }}</span>
                </td>
                <td class="px-4 py-3">
                    <span @class(['badge-status', 'border-green-500/40 text-green-400' => $item->is_available, 'border-red-500/40 text-red-400' => ! $item->is_available])>{{ $item->is_available ? 'Yes' : 'No' }}</span>
                </td>
                <td class="px-4 py-3">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.menu.edit', $item) }}" class="text-gold hover:underline text-xs uppercase tracking-widest">Edit</a>
                        <form method="POST" action="{{ route('admin.menu.destroy', $item) }}" onsubmit="return confirm('Delete {{ $item->name }}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-300 text-xs uppercase tracking-widest">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="px-4 py-6 text-center text-cream/40">No menu items yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
