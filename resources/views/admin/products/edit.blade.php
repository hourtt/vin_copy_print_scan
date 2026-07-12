<x-admin-layout>
    <x-slot name="header">Edit Product</x-slot>

    <form method="POST" action="{{ route('admin.products.update', $product) }}"
          enctype="multipart/form-data"
          x-data="{
              newPreviews: [],
              specs: {{ $product->specifications ? json_encode(collect($product->specifications)->map(fn($v,$k) => ['key'=>$k,'value'=>$v])->values()) : '[]' }},
              addSpec() { this.specs.push({ key: '', value: '' }); },
              removeSpec(i) { this.specs.splice(i, 1); },
              handleNewImages(files) {
                  Array.from(files).forEach(file => {
                      const reader = new FileReader();
                      reader.onload = e => this.newPreviews.push({ url: e.target.result, name: file.name });
                      reader.readAsDataURL(file);
                  });
              },
              setPrimary(productId, imageId, csrfToken) {
                  fetch(`/admin/products/${productId}/images/${imageId}/set-primary`, {
                      method: 'POST',
                      headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' }
                  })
                  .then(r => r.json())
                  .then(() => window.location.reload());
              },
              deleteImage(productId, imageId, csrfToken) {
                  if (!confirm('Delete this image?')) return;
                  fetch(`/admin/products/${productId}/images/${imageId}`, {
                      method: 'DELETE',
                      headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' }
                  })
                  .then(() => window.location.reload());
              }
          }"
          class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm list-none">
                <p class="font-medium mb-1">Please fix the following errors:</p>
                <ul class="list-none list-inside space-y-0.5">
                    @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg text-sm">{{ session('success') }}</div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- LEFT: Main Info --}}
            <div class="lg:col-span-2 space-y-5">

                {{-- Basic Info --}}
                <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm space-y-4">
                    <h3 class="text-sm font-semibold text-gray-700">Basic Information</h3>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Product Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" required
                               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('name') border-red-300 @enderror">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Category <span class="text-red-500">*</span></label>
                            <select name="category_id" required class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="">Select category…</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}" @selected(old('category_id', $product->category_id) == $cat->id)>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Brand</label>
                            <select name="brand_id" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="">No Brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" @selected(old('brand_id', $product->brand_id) == $brand->id)>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" rows="4"
                                  class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-none">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Price ($) <span class="text-red-500">*</span></label>
                            <input type="number" name="price" value="{{ old('price', $product->price) }}" step="0.01" min="0" required
                                   class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('price') border-red-300 @enderror">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Stock Quantity <span class="text-red-500">*</span></label>
                            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" min="0" required
                                   class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">URL Slug</label>
                        <input type="text" name="slug" value="{{ old('slug', $product->slug) }}"
                               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm font-mono focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>

                {{-- Specifications --}}
                <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm space-y-3">
                    <div class="flex items-center justify-between">
                        <h3 class="text-sm font-semibold text-gray-700">Specifications</h3>
                        <button type="button" @click="addSpec()"
                                class="inline-flex items-center gap-1 text-xs font-medium text-indigo-600 hover:text-indigo-800">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                            Add Row
                        </button>
                    </div>
                    <div class="space-y-2">
                        <template x-for="(spec, i) in specs" :key="i">
                            <div class="flex gap-2 items-center">
                                <input type="text" :name="`specifications[${i}][key]`" x-model="spec.key" placeholder="Key"
                                       class="flex-1 border border-gray-200 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <input type="text" :name="`specifications[${i}][value]`" x-model="spec.value" placeholder="Value"
                                       class="flex-1 border border-gray-200 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <button type="button" @click="removeSpec(i)" class="text-gray-300 hover:text-red-500 transition-colors">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </div>
                        </template>
                        <template x-if="specs.length === 0">
                            <p class="text-xs text-gray-400 py-2">No specifications. Click "Add Row" to begin.</p>
                        </template>
                    </div>
                </div>

                {{-- Existing Gallery --}}
                @if ($product->images->isNotEmpty())
                    <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm space-y-3">
                        <h3 class="text-sm font-semibold text-gray-700">Current Gallery</h3>
                        <p class="text-xs text-gray-400">Click "Set as Thumbnail" to make any image the featured one. Delete removes it permanently.</p>

                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                            @foreach ($product->images->sortBy('sort_order') as $image)
                                <div class="relative group">
                                    <img src="{{ Storage::url($image->image_path) }}" alt="Product image"
                                         class="w-full h-24 object-cover rounded-lg border {{ $image->is_primary ? 'border-indigo-400 ring-2 ring-indigo-300' : 'border-gray-100' }}">

                                    @if ($image->is_primary)
                                        <span class="absolute top-1 left-1 bg-indigo-600 text-white text-xs px-1.5 py-0.5 rounded font-medium">Thumbnail</span>
                                    @endif

                                    <div class="absolute inset-x-0 bottom-0 opacity-0 group-hover:opacity-100 transition-opacity flex gap-1 p-1">
                                        @unless ($image->is_primary)
                                            <button type="button"
                                                    @click="setPrimary({{ $product->id }}, {{ $image->id }}, '{{ csrf_token() }}')"
                                                    class="flex-1 text-xs bg-indigo-600 text-white rounded py-1 font-medium hover:bg-indigo-700 transition-colors">
                                                Set Thumb
                                            </button>
                                        @endunless
                                        <button type="button"
                                                @click="deleteImage({{ $product->id }}, {{ $image->id }}, '{{ csrf_token() }}')"
                                                class="px-2 text-xs bg-red-500 text-white rounded py-1 hover:bg-red-600 transition-colors">
                                            ✕
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Upload New Images --}}
                <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm space-y-3">
                    <h3 class="text-sm font-semibold text-gray-700">Add More Images</h3>

                    <label class="flex flex-col items-center justify-center border-2 border-dashed border-gray-200 rounded-xl p-6 cursor-pointer hover:border-indigo-400 hover:bg-indigo-50/40 transition-colors">
                        <svg class="w-7 h-7 text-gray-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <p class="text-sm text-gray-500">Click to upload additional images</p>
                        <input type="file" name="images[]" multiple accept="image/*" class="hidden"
                               @change="handleNewImages($event.target.files)">
                    </label>

                    <div x-show="newPreviews.length > 0" class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                        <template x-for="(img, i) in newPreviews" :key="i">
                            <div class="relative group">
                                <img :src="img.url" class="w-full h-24 object-cover rounded-lg border border-gray-100">
                                <button type="button" @click="newPreviews.splice(i, 1)"
                                        class="absolute top-1 right-1 bg-white/90 text-red-500 rounded-full p-0.5 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </div>
                        </template>
                    </div>
                </div>

            </div>

            {{-- RIGHT: Meta / Actions --}}
            <div class="space-y-5">

                <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm space-y-4">
                    <h3 class="text-sm font-semibold text-gray-700">Publish</h3>

                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-700">Featured Product</p>
                            <p class="text-xs text-gray-400">Show on homepage</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="hidden" name="is_featured" value="0">
                            <input type="checkbox" name="is_featured" value="1" class="sr-only peer" @checked(old('is_featured', $product->is_featured))>
                            <div class="w-9 h-5 bg-gray-200 peer-checked:bg-indigo-600 rounded-full peer transition-colors after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-transform peer-checked:after:translate-x-4"></div>
                        </label>
                    </div>

                    <div class="text-xs text-gray-400 space-y-1 border-t border-gray-100 pt-3">
                        <p>Created: {{ $product->created_at->format('d M Y, H:i') }}</p>
                        <p>Updated: {{ $product->updated_at->format('d M Y, H:i') }}</p>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit"
                                class="flex-1 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition-colors">
                            Save Changes
                        </button>
                        <a href="{{ route('admin.products.index') }}"
                           class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                            Cancel
                        </a>
                    </div>

                    <form method="POST" action="{{ route('admin.products.destroy', $product) }}"
                          x-data @submit.prevent="if(confirm('Archive this product? It will be soft-deleted.')) $el.submit()">
                        @csrf @method('DELETE')
                        <button type="submit"
                                class="w-full px-4 py-2 text-xs font-medium text-red-600 border border-red-200 rounded-lg hover:bg-red-50 transition-colors">
                            Archive Product
                        </button>
                    </form>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                    <a href="{{ route('admin.products.show', $product) }}"
                       class="block text-sm text-center text-indigo-600 hover:text-indigo-800 font-medium">
                        View Product Detail →
                    </a>
                </div>

            </div>
        </div>
    </form>
</x-admin-layout>
