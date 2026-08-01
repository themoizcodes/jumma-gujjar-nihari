@csrf
@if($menuItem->exists) @method('PATCH') @endif

<div class="mb-4">
    <label class="field-label" for="category_id">Category</label>
    <select name="category_id" id="category_id" required class="input-field">
        @foreach($categories as $category)
        <option value="{{ $category->id }}" @selected(old('category_id', $menuItem->category_id) == $category->id)>{{ $category->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <label class="field-label" for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name', $menuItem->name) }}" required class="input-field">
</div>

<div class="mb-4">
    <label class="field-label" for="description">Description</label>
    <textarea name="description" id="description" rows="3" class="input-field">{{ old('description', $menuItem->description) }}</textarea>
</div>

<div class="mb-4">
    <label class="field-label" for="price">Price (Rs.)</label>
    <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $menuItem->price) }}" required class="input-field">
</div>

<div class="mb-4">
    <label class="field-label" for="image_file">Food Image</label>
    <input type="file" name="image_file" id="image_file" accept="image/*"
           class="w-full bg-bg-dark border border-gold/30 text-cream px-3 py-2 text-sm file:mr-4 file:py-1.5 file:px-3 file:border-0 file:bg-gold file:text-bg-dark file:text-xs file:uppercase file:font-semibold file:cursor-pointer cursor-pointer">
    @if($menuItem->exists && $menuItem->image)
    <img src="{{ $menuItem->image }}" class="w-20 h-20 object-cover mt-3" alt="current image">
    <p class="text-cream/40 text-xs mt-1">Current image — upload a new file only if you want to replace it.</p>
    @else
    <p class="text-cream/40 text-xs mt-1">Leave empty to auto-generate a branded placeholder image.</p>
    @endif
</div>

<div class="flex items-center gap-6 mb-6">
    <label class="flex items-center gap-2 text-sm text-cream/70 cursor-pointer">
        <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $menuItem->is_featured)) class="accent-[color:var(--color-gold)] h-4 w-4">
        Featured on Home Page
    </label>
    <label class="flex items-center gap-2 text-sm text-cream/70 cursor-pointer">
        <input type="checkbox" name="is_available" value="1" @checked(old('is_available', $menuItem->exists ? $menuItem->is_available : true)) class="accent-[color:var(--color-gold)] h-4 w-4">
        Available
    </label>
</div>

<button type="submit" class="btn-gold">
    {{ $menuItem->exists ? 'Update Item' : 'Add Item' }}
</button>
