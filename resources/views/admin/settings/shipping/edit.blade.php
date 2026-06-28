<x-admin-layout>
    <x-slot name="header">Edit Shipping Method</x-slot>

    <div class="max-w-2xl">
        <form method="POST" action="{{ route('admin.settings.shipping.update', $shippingMethod) }}" class="space-y-5">
            @csrf @method('PUT')

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
                    <ul class="list-disc list-inside space-y-0.5">
                        @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Method Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $shippingMethod->name) }}" required
                               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" rows="2"
                                  class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-none">{{ old('description', $shippingMethod->description) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Fee ($) <span class="text-red-500">*</span></label>
                        <input type="number" name="fee" value="{{ old('fee', $shippingMethod->fee) }}" step="0.01" min="0" required
                               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Estimated Days <span class="text-red-500">*</span></label>
                        <input type="number" name="estimated_days" value="{{ old('estimated_days', $shippingMethod->estimated_days) }}" min="1" required
                               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div class="sm:col-span-2 flex items-center gap-2">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1" id="is_active" @checked(old('is_active', $shippingMethod->is_active)) class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="is_active" class="text-sm font-medium text-gray-700">Active (Visible to customers)</label>
                    </div>
                </div>

                <div class="flex gap-2 pt-2 border-t border-gray-100">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition-colors">
                        Save Changes
                    </button>
                    <a href="{{ route('admin.settings.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>
