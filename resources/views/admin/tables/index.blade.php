@extends('admin.layout')

@section('title', 'Table Management')

@section('content')

<h1 class="font-serif text-3xl text-cream mb-8">Table Management</h1>

{{-- Add Table --}}
<div class="card p-6 mb-10 max-w-xl reveal">
    <h2 class="font-serif text-lg text-gold mb-4">Add New Table</h2>
    <form method="POST" action="{{ route('admin.tables.store') }}" class="flex flex-wrap gap-4 items-end">
        @csrf
        <div>
            <label class="field-label" for="table_number">Table Number</label>
            <input type="text" name="table_number" id="table_number" required placeholder="T-13" class="input-field !w-36">
        </div>
        <div>
            <label class="field-label" for="capacity">Capacity</label>
            <input type="number" name="capacity" id="capacity" min="1" max="50" required class="input-field !w-24">
        </div>
        <button type="submit" class="btn-xs-outline">Add Table</button>
    </form>
</div>

{{-- Table List --}}
<div class="overflow-x-auto border border-gold/20 reveal">
    <table class="w-full text-sm">
        <thead class="bg-bg-dark-2 text-cream/60 uppercase text-xs tracking-widest">
            <tr>
                <th class="text-left px-4 py-3">Table #</th>
                <th class="text-left px-4 py-3">Capacity</th>
                <th class="text-left px-4 py-3">Status</th>
                <th class="text-left px-4 py-3">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gold/10">
            @forelse($tables as $table)
            <tr class="table-row-hover">
                <td class="px-4 py-3">
                    <form method="POST" action="{{ route('admin.tables.update', $table) }}" class="flex items-center gap-2">
                        @csrf
                        @method('PATCH')
                        <input type="text" name="table_number" value="{{ $table->table_number }}"
                               class="bg-bg-dark border border-gold/20 text-cream px-2 py-1 text-sm w-20 focus:outline-none focus:border-gold">
                </td>
                <td class="px-4 py-3">
                        <input type="number" name="capacity" value="{{ $table->capacity }}" min="1" max="50"
                               class="bg-bg-dark border border-gold/20 text-cream px-2 py-1 text-sm w-16 focus:outline-none focus:border-gold">
                </td>
                <td class="px-4 py-3">
                    <span @class([
                        'badge-status',
                        'border-green-500/40 text-green-400' => $table->is_active,
                        'border-red-500/40 text-red-400' => ! $table->is_active,
                    ])>{{ $table->is_active ? 'Active' : 'Inactive' }}</span>
                </td>
                <td class="px-4 py-3">
                    <div class="flex items-center gap-3">
                        <button type="submit" class="text-gold hover:underline text-xs uppercase tracking-widest">Save</button>
                    </div>
                    </form>
                    <form method="POST" action="{{ route('admin.tables.toggle-status', $table) }}" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="text-cream/60 hover:text-gold text-xs uppercase tracking-widest mt-2">
                            {{ $table->is_active ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>
                    <form method="POST" action="{{ route('admin.tables.destroy', $table) }}" class="inline" onsubmit="return confirm('Delete table {{ $table->table_number }}?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-300 text-xs uppercase tracking-widest mt-2 ml-3">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="px-4 py-6 text-center text-cream/40">No tables yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
