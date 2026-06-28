<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminSalesController extends Controller
{
    /**
     * Allowed status transitions to prevent invalid state changes.
     */
    private const TRANSITIONS = [
        'pending'          => ['processing', 'cancelled'],
        'processing'       => ['packed', 'cancelled'],
        'packed'           => ['out_for_delivery', 'cancelled'],
        'out_for_delivery' => ['delivered', 'cancelled'],
        'delivered'        => [],
        'cancelled'        => [],
    ];

    public function index(Request $request)
    {
        $query = Order::with('user', 'items', 'vouchers')
            ->latest();

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Date range filter
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Search by order ID or customer name/email
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('id', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($uq) use ($search) {
                      $uq->where('first_name', 'like', "%{$search}%")
                         ->orWhere('last_name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%");
                  });
            });
        }

        $orders = $query->paginate(20)->withQueryString();

        // Revenue summary for the current month
        $now = Carbon::now();
        $monthlyRevenue = Order::where('status', 'delivered')
            ->whereBetween('created_at', [$now->copy()->startOfMonth(), $now->copy()->endOfMonth()])
            ->sum('total');
        $pendingCount   = Order::where('status', 'pending')->count();
        $deliveredCount = Order::where('status', 'delivered')->count();

        $statuses = Order::STATUS_LABELS;

        return view('admin.sales.index', compact(
            'orders', 'statuses', 'monthlyRevenue', 'pendingCount', 'deliveredCount'
        ));
    }

    public function show(Order $order)
    {
        $order->load(
            'user',
            'items.product.images',
            'vouchers',
            'shippingMethod',
            'createdBy',
            'updatedBy'
        );

        $statuses    = Order::STATUS_LABELS;
        $transitions = self::TRANSITIONS[$order->status] ?? [];

        return view('admin.sales.show', compact('order', 'statuses', 'transitions'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => ['required', 'string', 'in:' . implode(',', array_keys(Order::STATUS_LABELS))],
        ]);

        $newStatus = $request->status;
        $allowed   = self::TRANSITIONS[$order->status] ?? [];

        if (!in_array($newStatus, $allowed)) {
            return back()->with('error',
                "Cannot transition from \"{$order->status_label}\" to \"" . Order::STATUS_LABELS[$newStatus] . "\"."
            );
        }

        $update = [
            'status'     => $newStatus,
            'updated_by' => auth()->id(),
        ];

        // Auto-set shipped_time when moving to out_for_delivery
        if ($newStatus === 'out_for_delivery' && !$order->shipped_time) {
            $update['shipped_time'] = now();
        }

        $order->update($update);

        return back()->with('success', 'Order status updated to "' . Order::STATUS_LABELS[$newStatus] . '".');
    }

    public function updateTracking(Request $request, Order $order)
    {
        $request->validate([
            'tracking_notes'          => ['nullable', 'string', 'max:1000'],
            'estimated_delivery_date' => ['nullable', 'date'],
        ]);

        $order->update([
            'tracking_notes'          => $request->tracking_notes,
            'estimated_delivery_date' => $request->estimated_delivery_date,
            'updated_by'              => auth()->id(),
        ]);

        return back()->with('success', 'Tracking information updated.');
    }
}
