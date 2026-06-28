<x-admin-layout>
    <x-slot name="header">Vouchers</x-slot>

    <div class="space-y-5">
        <div class="flex items-center justify-between">
            <p class="text-sm text-gray-500">Manage store vouchers and discounts</p>
            <a href="{{ route('admin.vouchers.create') }}"
               class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition-colors shadow-sm">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                Create Voucher
            </a>
        </div>

        @if (session('success'))
            <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            @if ($vouchers->isEmpty())
                <div class="flex flex-col items-center justify-center py-16 text-gray-400">
                    <p class="text-sm font-medium">No vouchers created yet.</p>
                </div>
            @else
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Code</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Value</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Scope</th>
                            <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wide">Usage</th>
                            <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wide">Status</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wide">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($vouchers as $voucher)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-mono font-bold bg-gray-100 text-gray-800 border border-gray-200">
                                        {{ $voucher->code }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 font-medium text-indigo-600">
                                    {{ $voucher->discount_type === 'percentage' ? $voucher->discount_value . '%' : '$' . number_format($voucher->discount_value, 2) }}
                                </td>
                                <td class="px-4 py-3">
                                    @if ($voucher->scope === 'site_wide')
                                        <span class="text-gray-600 text-xs">Site-wide</span>
                                    @elseif ($voucher->scope === 'categories')
                                        <span class="text-blue-600 text-xs" title="{{ $voucher->categories->pluck('name')->join(', ') }}">Specific Categories ({{ $voucher->categories->count() }})</span>
                                    @elseif ($voucher->scope === 'products')
                                        <span class="text-green-600 text-xs">Specific Products ({{ $voucher->products_count }})</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-center text-gray-600 text-xs">
                                    {{ $voucher->used_count }} / {{ $voucher->usage_limit ?? '∞' }}
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <div x-data="{ active: {{ $voucher->is_active ? 'true' : 'false' }}, loading: false }">
                                        <button @click="
                                            loading = true;
                                            fetch('{{ route('admin.vouchers.toggle', $voucher) }}', {
                                                method: 'PATCH',
                                                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' }
                                            }).then(r => r.json()).then(d => { active = d.is_active; loading = false; });
                                        "
                                        :class="active ? 'bg-green-500' : 'bg-gray-200'"
                                        :disabled="loading"
                                        class="relative inline-flex h-5 w-9 items-center rounded-full transition-colors cursor-pointer">
                                            <span :class="active ? 'translate-x-5' : 'translate-x-1'" class="inline-block h-3 w-3 transform rounded-full bg-white transition-transform"></span>
                                        </button>
                                    </div>
                                    @if ($voucher->expires_at && $voucher->expires_at->isPast())
                                        <div class="text-[10px] text-red-500 mt-1 uppercase font-bold tracking-wider">Expired</div>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.vouchers.edit', $voucher) }}"
                                           class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('admin.vouchers.destroy', $voucher) }}"
                                              x-data @submit.prevent="if(confirm('Delete voucher \'{{ $voucher->code }}\'?')) $el.submit()">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-600 bg-white border border-red-200 rounded-lg hover:bg-red-50 transition-colors">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($vouchers->hasPages())
                    <div class="px-4 py-3 border-t border-gray-100">{{ $vouchers->links() }}</div>
                @endif
            @endif
        </div>
    </div>
</x-admin-layout>
