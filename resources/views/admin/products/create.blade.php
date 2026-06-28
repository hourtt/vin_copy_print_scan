<x-admin-layout>
    <x-slot name="header">Add Product</x-slot>

    <form method="POST" action="{{ route('admin.products.store') }}"
          enctype="multipart/form-data"
          x-data="{
              previewImages: [],
              specs: {{ old('specifications') ? json_encode(collect(old('specifications'))->map(fn($v,$k) => ['key'=>$k,'value'=>$v])->values()) : '[]' }},
              addSpec() { this.specs.push({ key: '', value: '' }); },
              removeSpec(i) { this.specs.splice(i, 1); },
              handleImages(files) {
                  Array.from(files).forEach(file => {
                      const reader = new FileReader();
                      reader.onload = e => this.previewImages.push({ url: e.target.result, name: file.name });
                      reader.readAsDataURL(file);
                  });
              }
          }"
          class="space-y-6">
        @csrf

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
                <p class="font-medium mb-1">Please fix the following errors:</p>
                <ul class="list-disc list-inside space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- LEFT: Main Info --}}
            <div class="lg:col-span-2 space-y-5">

                {{-- Basic Info --}}
                <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm space-y-4">
                    <h3 class="text-sm font-semibold text-gray-700">Basic Information</h3>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Product Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('name') border-red-300 @enderror"
                               placeholder="e.g. HP LaserJet Toner 85A">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Category <span class="text-red-500">*</span></label>
                            <select name="category_id" required class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('category_id') border-red-300 @enderror">
                                <option value="">Select category…</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}" @selected(old('category_id') == $cat->id)>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Brand</label>
                            <select name="brand_id" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="">No Brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" @selected(old('brand_id') == $brand->id)>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" rows="4"
                                  class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-none"
                                  placeholder="Product description…">{{ old('description') }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Price ($) <span class="text-red-500">*</span></label>
                            <input type="number" name="price" value="{{ old('price') }}" step="0.01" min="0" required
                                   class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('price') border-red-300 @enderror"
                                   placeholder="0.00">
                            @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Stock Quantity <span class="text-red-500">*</span></label>
                            <input type="number" name="stock" value="{{ old('stock', 0) }}" min="0" required
                                   class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('stock') border-red-300 @enderror">
                            @error('stock') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">URL Slug</label>
                        <input type="text" name="slug" value="{{ old('slug') }}"
                               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm font-mono focus:outline-none focus:ring-2 focus:ring-indigo-500"
                               placeholder="auto-generated-if-empty">
                        <p class="text-xs text-gray-400 mt-1">Leave empty to auto-generate from name.</p>
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
                                <input type="text" :name="`specifications[${i}][key]`" x-model="spec.key"
                                       placeholder="Key (e.g. Weight)"
                                       class="flex-1 border border-gray-200 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <input type="text" :name="`specifications[${i}][value]`" x-model="spec.value"
                                       placeholder="Value (e.g. 150g)"
                                       class="flex-1 border border-gray-200 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <button type="button" @click="removeSpec(i)"
                                        class="text-gray-300 hover:text-red-500 transition-colors">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </div>
                        </template>
                        <template x-if="specs.length === 0">
                            <p class="text-xs text-gray-400 py-2">No specifications yet. Click "Add Row" to start.</p>
                        </template>
                    </div>
                </div>

                {{-- Image Gallery Upload --}}
                <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm space-y-3">
                    <h3 class="text-sm font-semibold text-gray-700">Product Images</h3>
                    <p class="text-xs text-gray-400">The first image uploaded will automatically be used as the thumbnail. Up to 5MB per image.</p>

                    <label class="flex flex-col items-center justify-center border-2 border-dashed border-gray-200 rounded-xl p-8 cursor-pointer hover:border-indigo-400 hover:bg-indigo-50/40 transition-colors">
                        <svg class="w-8 h-8 text-gray-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <p class="text-sm font-medium text-gray-500">Click to upload images</p>
                        <p class="text-xs text-gray-400 mt-1">PNG, JPG, WEBP up to 5MB each</p>
                        <input type="file" name="images[]" multiple accept="image/*" class="hidden"
                               @change="handleImages($event.target.files)">
                    </label>

                    {{-- Previews --}}
                    <div x-show="previewImages.length > 0" class="grid grid-cols-2 sm:grid-cols-4 gap-3 mt-3">
                        <template x-for="(img, i) in previewImages" :key="i">
                            <div class="relative group">
                                <img :src="img.url" :alt="img.name" class="w-full h-24 object-cover rounded-lg border border-gray-100">
                                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 rounded-lg transition-colors"></div>
                                <span x-show="i === 0" class="absolute top-1 left-1 bg-indigo-600 text-white text-xs px-1.5 py-0.5 rounded font-medium">Thumbnail</span>
                                <button type="button" @click="previewImages.splice(i, 1)"
                                        class="absolute top-1 right-1 bg-white/90 text-red-500 rounded-full p-0.5 opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-50">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </div>
                        </template>
                    </div>
                </div>

            </div>

            {{-- RIGHT: Meta / Actions --}}
            <div class="space-y-5">

                {{-- Publish Card --}}
                <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm space-y-4">
                    <h3 class="text-sm font-semibold text-gray-700">Publish</h3>

                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-700">Featured Product</p>
                            <p class="text-xs text-gray-400">Show on homepage</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="hidden" name="is_featured" value="0">
                            <input type="checkbox" name="is_featured" value="1" class="sr-only peer" @checked(old('is_featured'))>
                            <div class="w-9 h-5 bg-gray-200 peer-checked:bg-indigo-600 rounded-full peer transition-colors after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-transform peer-checked:after:translate-x-4"></div>
                        </label>
                    </div>

                    <div class="flex gap-2 pt-2 border-t border-gray-100">
                        <button type="submit"
                                class="flex-1 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition-colors">
                            Create Product
                        </button>
                        <a href="{{ route('admin.products.index') }}"
                           class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                            Cancel
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </form>
</x-admin-layout>
