<x-admin-layout>
    <x-slot name="header">Order #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</x-slot>

    @php
        $statusSteps = ['pending','processing','packed','out_for_delivery','delivered'];
        $currentIndex = array_search($order->status, $statusSteps);
        $isCancelled = $order->status === 'cancelled';

        $badgeClass = match($order->status) {
            'pending'          => 'bg-yellow-50 text-yellow-700 border-yellow-200',
            'processing'       => 'bg-blue-50 text-blue-700 border-blue-200',
            'packed'           => 'bg-indigo-50 text-indigo-700 border-indigo-200',
            'out_for_delivery' => 'bg-purple-50 text-purple-700 border-purple-200',
            'delivered'        => 'bg-green-50 text-green-700 border-green-200',
            'cancelled'        => 'bg-red-50 text-red-700 border-red-200',
            default            => 'bg-gray-100 text-gray-600 border-gray-200',
        };
    @endphp

    <div class="space-y-5">

        {{-- Breadcrumb --}}
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.sales.index') }}" class="text-sm text-gray-500 hover:text-gray-700">← Orders</a>
            <span class="text-gray-300">/</span>
            <span class="text-sm text-gray-700 font-medium">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</span>
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border {{ $badgeClass }}">
                {{ $order->status_label }}
            </span>
        </div>

        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg text-sm">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg text-sm">{{ session('error') }}</div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- LEFT: Order Details --}}
            <div class="lg:col-span-2 space-y-5">

                {{-- Status Pipeline Stepper --}}
                @if (!$isCancelled)
                    <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                        <h3 class="text-sm font-semibold text-gray-700 mb-4">Order Progress</h3>
                        <div class="flex items-center">
                            @foreach ($statusSteps as $i => $step)
                                @php $stepDone = ($currentIndex !== false && $i <= $currentIndex); @endphp
                                <div class="flex items-center {{ $i < count($statusSteps) - 1 ? 'flex-1' : '' }}">
                                    <div class="flex flex-col items-center">
                                        <div class="w-8 h-8 rounded-full flex items-center justify-center border-2 transition-colors
                                            {{ $stepDone ? 'bg-indigo-600 border-indigo-600' : 'bg-white border-gray-300' }}">
                                            @if ($stepDone)
                                                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                            @else
                                                <div class="w-2 h-2 rounded-full bg-gray-300"></div>
                                            @endif
                                        </div>
                                        <p class="text-xs mt-1 text-center {{ $stepDone ? 'text-indigo-600 font-medium' : 'text-gray-400' }} whitespace-nowrap">
                                            {{ $statuses[$step] }}
                                        </p>
                                    </div>
                                    @if ($i < count($statusSteps) - 1)
                                        <div class="flex-1 h-0.5 mx-2 {{ $currentIndex !== false && $i < $currentIndex ? 'bg-indigo-400' : 'bg-gray-200' }}"></div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="bg-red-50 border border-red-200 rounded-xl p-4 text-sm text-red-700">
                        ⚠️ This order has been <strong>cancelled</strong>. No further status changes are allowed.
                    </div>
                @endif

                {{-- Order Items --}}
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                    <div class="px-5 py-4 border-b border-gray-100">
                        <h3 class="text-sm font-semibold text-gray-700">Order Items</h3>
                    </div>
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Product</th>
                                <th class="px-4 py-2 text-center text-xs font-medium text-gray-500">Qty</th>
                                <th class="px-4 py-2 text-right text-xs font-medium text-gray-500">Unit</th>
                                <th class="px-4 py-2 text-right text-xs font-medium text-gray-500">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($order->items as $item)
                                <tr>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-3">
                                            @php $thumb = $item->product?->images->firstWhere('is_primary', true) ?? $item->product?->images->first(); @endphp
                                            @if ($thumb)
                                                <img src="{{ Storage::url($thumb->image_path) }}" class="w-10 h-10 rounded-lg object-cover border border-gray-100 shrink-0">
                                            @else
                                                <div class="w-10 h-10 rounded-lg bg-gray-100 shrink-0"></div>
                                            @endif
                                            <div>
                                                <p class="font-medium text-gray-900">{{ $item->product?->name ?? 'Deleted Product' }}</p>
                                                @if ($item->product_id && !$item->product)
                                                    <p class="text-xs text-red-400">Product removed</p>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-center text-gray-700">{{ $item->quantity }}</td>
                                    <td class="px-4 py-3 text-right text-gray-700">${{ number_format($item->price, 2) }}</td>
                                    <td class="px-4 py-3 text-right font-medium text-gray-900">${{ number_format($item->quantity * $item->price, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- Totals --}}
                    <div class="px-4 py-4 border-t border-gray-100 space-y-1.5 text-sm">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span>
                            <span>${{ number_format($order->subtotal, 2) }}</span>
                        </div>
                        @foreach ($order->vouchers as $voucher)
                            <div class="flex justify-between text-green-600">
                                <span>Voucher: {{ $voucher->code }}</span>
                                <span>-${{ number_format($voucher->pivot->discount_amount, 2) }}</span>
                            </div>
                        @endforeach
                        <div class="flex justify-between text-gray-600">
                            <span>Shipping ({{ $order->shippingMethod?->name ?? '—' }})</span>
                            <span>${{ number_format($order->shipping_fee, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-base font-bold text-gray-900 border-t border-gray-100 pt-2 mt-2">
                            <span>Total</span>
                            <span>${{ number_format($order->total, 2) }}</span>
                        </div>
                    </div>
                </div>

                {{-- Tracking Notes --}}
                <form method="POST" action="{{ route('admin.sales.update-tracking', $order) }}"
                      class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm space-y-4">
                    @csrf @method('PATCH')
                    <h3 class="text-sm font-semibold text-gray-700">Tracking Information</h3>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1">Estimated Delivery Date</label>
                        <input type="date" name="estimated_delivery_date"
                               value="{{ $order->estimated_delivery_date?->format('Y-m-d') }}"
                               class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 mb-1">Tracking Notes</label>
                        <textarea name="tracking_notes" rows="3"
                                  class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-none"
                                  placeholder="Add tracking number, courier info, notes…">{{ $order->tracking_notes }}</textarea>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-gray-800 text-white text-sm font-medium rounded-lg hover:bg-gray-900 transition-colors">
                        Update Tracking
                    </button>
                </form>
            </div>

            {{-- RIGHT: Customer + Status Update --}}
            <div class="space-y-5">

                {{-- Customer Card --}}
                <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm space-y-3">
                    <h3 class="text-sm font-semibold text-gray-700">Customer</h3>
                    <div class="space-y-1.5 text-sm">
                        <p class="font-medium text-gray-900">{{ $order->user?->first_name }} {{ $order->user?->last_name }}</p>
                        <p class="text-gray-500">{{ $order->user?->email }}</p>
                        <p class="text-gray-500">{{ $order->user?->phone_number }}</p>
                    </div>
                    @if ($order->user)
                        <a href="{{ route('admin.customers.show', $order->user) }}"
                           class="block text-xs text-indigo-600 hover:underline">View customer profile →</a>
                    @endif
                </div>

                {{-- Shipping Address --}}
                <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm space-y-2">
                    <h3 class="text-sm font-semibold text-gray-700">Shipping Address</h3>
                    <p class="text-sm text-gray-600 whitespace-pre-wrap">{{ $order->shipping_address ?? '—' }}</p>
                    @if ($order->shippingMethod)
                        <div class="text-xs text-gray-400 border-t border-gray-100 pt-2">
                            <p>{{ $order->shippingMethod->name }}</p>
                            <p>Est. {{ $order->shippingMethod->estimated_days }} day(s)</p>
                        </div>
                    @endif
                </div>

                {{-- Status Update --}}
                @if (!$isCancelled && !empty($transitions))
                    <form method="POST" action="{{ route('admin.sales.update-status', $order) }}"
                          class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm space-y-3">
                        @csrf @method('PATCH')
                        <h3 class="text-sm font-semibold text-gray-700">Update Status</h3>
                        <select name="status" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            @foreach ($transitions as $key)
                                <option value="{{ $key }}">{{ $statuses[$key] }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="w-full px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition-colors">
                            Confirm Status Change
                        </button>
                    </form>
                @endif

                {{-- Order Meta --}}
                <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm space-y-1.5 text-xs text-gray-400">
                    <p>Placed: {{ $order->created_at->format('d M Y, H:i') }}</p>
                    @if ($order->shipped_time)
                        <p>Shipped: {{ $order->shipped_time->format('d M Y, H:i') }}</p>
                    @endif
                    @if ($order->estimated_delivery_date)
                        <p>Est. Delivery: {{ $order->estimated_delivery_date->format('d M Y') }}</p>
                    @endif
                    @if ($order->updatedBy)
                        <p>Last updated by: {{ $order->updatedBy->first_name }}</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
