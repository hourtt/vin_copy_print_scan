<x-admin-layout>
    <x-slot name="header">Customer Profile</x-slot>

    <div class="space-y-5">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.customers.index') }}" class="text-sm text-gray-500 hover:text-gray-700">← Customers</a>
            <span class="text-gray-300">/</span>
            <span class="text-sm text-gray-700 font-medium">{{ $user->first_name }} {{ $user->last_name }}</span>
        </div>

        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg text-sm">{{ session('success') }}</div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- LEFT: Profile & Actions --}}
            <div class="space-y-5">
                <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm text-center">
                    <div class="w-16 h-16 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-xl mx-auto mb-3">
                        {{ strtoupper(substr($user->first_name, 0, 1) . substr($user->last_name, 0, 1)) }}
                    </div>
                    <h2 class="text-lg font-bold text-gray-900">{{ $user->first_name }} {{ $user->last_name }}</h2>
                    <p class="text-sm text-gray-500">{{ $user->email }}</p>

                    <div class="mt-4 flex items-center justify-center gap-2">
                        @if ($user->is_banned)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-700">Banned Account</span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-50 text-green-700">Active Account</span>
                        @endif
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm space-y-3">
                    <h3 class="text-sm font-semibold text-gray-700">Contact Details</h3>
                    <div class="text-sm space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-500">Phone</span>
                            <span class="text-gray-900">{{ $user->phone_number ?? '—' }}</span>
                        </div>
                        <div class="flex flex-col gap-1">
                            <span class="text-gray-500">Address</span>
                            <span class="text-gray-900 text-right whitespace-pre-wrap">{{ $user->address ?? '—' }}</span>
                        </div>
                        <div class="flex justify-between border-t border-gray-100 pt-2">
                            <span class="text-gray-500">Joined</span>
                            <span class="text-gray-900">{{ $user->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm space-y-4">
                    <h3 class="text-sm font-semibold text-gray-700">Account Actions</h3>
                    <form method="POST" action="{{ route('admin.customers.toggle-status', $user) }}"
                          x-data @submit.prevent="if(confirm('{{ $user->is_banned ? 'Unban this user? They will be able to log in again.' : 'Ban this user? They will be immediately logged out and prevented from accessing their account.' }}')) $el.submit()">
                        @csrf @method('PATCH')
                        @if ($user->is_banned)
                            <button type="submit" class="w-full px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg hover:bg-green-700 transition-colors">
                                Restore Account Access
                            </button>
                        @else
                            <button type="submit" class="w-full px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors">
                                Ban Account
                            </button>
                        @endif
                    </form>
                </div>
            </div>

            {{-- RIGHT: Order History --}}
            <div class="lg:col-span-2 space-y-5">

                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Total Orders</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{ $totalOrders }}</p>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-sm">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Lifetime Spend</p>
                        <p class="text-2xl font-bold text-green-600 mt-1">${{ number_format($lifetimeSpend, 2) }}</p>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                    <div class="px-5 py-4 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="text-sm font-semibold text-gray-700">Order History</h3>
                    </div>

                    @if ($orders->isEmpty())
                        <div class="px-5 py-8 text-center text-gray-400 text-sm">
                            This customer hasn't placed any orders yet.
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Order</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Date</th>
                                        <th class="px-4 py-2 text-center text-xs font-medium text-gray-500">Status</th>
                                        <th class="px-4 py-2 text-right text-xs font-medium text-gray-500">Total</th>
                                        <th class="px-4 py-2"></th>
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
                                            <td class="px-4 py-3 font-mono text-xs">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                                            <td class="px-4 py-3 text-gray-600">{{ $order->created_at->format('d M Y') }}</td>
                                            <td class="px-4 py-3 text-center">
                                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium {{ $badgeClass }}">
                                                    {{ $order->status_label }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 text-right font-medium">${{ number_format($order->total, 2) }}</td>
                                            <td class="px-4 py-3 text-right">
                                                <a href="{{ route('admin.sales.show', $order) }}" class="text-indigo-600 hover:text-indigo-800 text-xs font-medium">View</a>
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
        </div>
    </div>
</x-admin-layout>
