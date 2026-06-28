<x-admin-layout>
    <x-slot name="header">Sales</x-slot>

    <div class="space-y-5">

        {{-- Summary Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Monthly Revenue</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">${{ number_format($monthlyRevenue, 2) }}</p>
                <p class="text-xs text-gray-400 mt-0.5">This month, delivered orders</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Pending</p>
                <p class="text-2xl font-bold text-amber-600 mt-1">{{ $pendingCount }}</p>
                <p class="text-xs text-gray-400 mt-0.5">Awaiting processing</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Delivered</p>
                <p class="text-2xl font-bold text-green-600 mt-1">{{ $deliveredCount }}</p>
                <p class="text-xs text-gray-400 mt-0.5">Total completed orders</p>
            </div>
        </div>

        @if (session('success'))
            <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="flex items-center gap-3 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg text-sm">
                {{ session('error') }}
            </div>
        @endif

        {{-- Filters --}}
        <form method="GET" action="{{ route('admin.sales.index') }}"
              class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">
                <div class="relative lg:col-span-2">
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Order ID, customer name or email…"
                           class="w-full pl-3 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <select name="status" class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">All Statuses</option>
                    @foreach ($statuses as $key => $label)
                        <option value="{{ $key }}" @selected(request('status') === $key)>{{ $label }}</option>
                    @endforeach
                </select>
                <input type="date" name="date_from" value="{{ request('date_from') }}"
                       class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <div class="flex gap-2">
                    <input type="date" name="date_to" value="{{ request('date_to') }}"
                           class="flex-1 border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition-colors">Filter</button>
                    @if (request()->hasAny(['search','status','date_from','date_to']))
                        <a href="{{ route('admin.sales.index') }}" class="px-3 py-2 text-sm text-gray-500 border border-gray-200 rounded-lg hover:bg-gray-50">✕</a>
                    @endif
                </div>
            </div>
        </form>

        {{-- Orders Table --}}
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            @if ($orders->isEmpty())
                <div class="flex flex-col items-center justify-center py-16 text-gray-400">
                    <p class="text-sm">No orders match your filters.</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Order</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Customer</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Date</th>
                                <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wide">Items</th>
                                <th class="px-4 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wide">Total</th>
                                <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wide">Status</th>
                                <th class="px-4 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wide">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($orders as $order)
                                @php
                                    $badgeClass = match($order->status) {
                                        'pending'          => 'bg-yellow-50 text-yellow-700',
                                        'processing'       => 'bg-blue-50 text-blue-700',
                                        'packed'           => 'bg-indigo-50 text-indigo-700',
                                        'out_for_delivery' => 'bg-purple-50 text-purple-700',
                                        'delivered'        => 'bg-green-50 text-green-700',
                                        'cancelled'        => 'bg-red-50 text-red-700',
                                        default            => 'bg-gray-100 text-gray-600',
                                    };
                                @endphp
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-4 py-3 font-mono text-gray-700 text-xs">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                                    <td class="px-4 py-3">
                                        <p class="font-medium text-gray-900">{{ $order->user?->first_name }} {{ $order->user?->last_name }}</p>
                                        <p class="text-xs text-gray-400">{{ $order->user?->email }}</p>
                                    </td>
                                    <td class="px-4 py-3 text-gray-600 text-xs">{{ $order->created_at->format('d M Y, H:i') }}</td>
                                    <td class="px-4 py-3 text-center text-gray-600">{{ $order->items->count() }}</td>
                                    <td class="px-4 py-3 text-right font-medium text-gray-900">${{ number_format($order->total, 2) }}</td>
                                    <td class="px-4 py-3 text-center">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {{ $badgeClass }}">
                                            {{ $order->status_label }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-right">
                                        <a href="{{ route('admin.sales.show', $order) }}"
                                           class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if ($orders->hasPages())
                    <div class="px-4 py-3 border-t border-gray-100">{{ $orders->links() }}</div>
                @endif
            @endif
        </div>
    </div>
</x-admin-layout>
