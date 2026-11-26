<form class="max-w-3xl border border-border bg-white p-5 sm:p-8" action="{{ $action }}" method="POST">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    <div class="space-y-5">
        <div>
            <label class="block text-xs font-medium" for="name">Category name <span class="text-danger">*</span></label>
            <input class="mt-2 min-h-12 w-full border border-border bg-white px-4 text-sm outline-none transition focus:border-charcoal focus:ring-1 focus:ring-charcoal" id="name" name="name" type="text" value="{{ old('name', $category?->name) }}" maxlength="100" required>
            @error('name')<p class="mt-2 text-xs text-danger">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-xs font-medium" for="slug">Slug <span class="text-danger">*</span></label>
            <input class="mt-2 min-h-12 w-full border border-border bg-white px-4 text-sm outline-none transition focus:border-charcoal focus:ring-1 focus:ring-charcoal" id="slug" name="slug" type="text" value="{{ old('slug', $category?->slug) }}" maxlength="120" required>
            <p class="mt-2 text-xs text-muted">Use lowercase words separated by hyphens.</p>
            @error('slug')<p class="mt-2 text-xs text-danger">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-xs font-medium" for="description">Description</label>
            <textarea class="mt-2 min-h-32 w-full resize-y border border-border bg-white px-4 py-3 text-sm leading-6 outline-none transition focus:border-charcoal focus:ring-1 focus:ring-charcoal" id="description" name="description" rows="4">{{ old('description', $category?->description) }}</textarea>
            @error('description')<p class="mt-2 text-xs text-danger">{{ $message }}</p>@enderror
        </div>
    </div>

    <div class="mt-8 flex flex-col-reverse gap-3 border-t border-border pt-6 sm:flex-row sm:justify-end">
        <a class="inline-flex min-h-11 items-center justify-center border border-border px-5 text-xs font-medium transition-colors hover:bg-ivory" href="{{ route('admin.categories.index') }}">Cancel</a>
        <button class="inline-flex min-h-11 items-center justify-center bg-charcoal px-5 text-xs font-medium uppercase tracking-[0.13em] text-white transition-colors hover:bg-olive" type="submit">{{ $submitLabel }}</button>
    </div>
</form>
