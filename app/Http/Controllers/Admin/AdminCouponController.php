<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminCouponController extends Controller
{
    /**
     * List all coupons.
     */
    public function index(): View
    {
        $coupons = Coupon::latest()->get();

        return view('admin.coupons.index', compact('coupons'));
    }

    /**
     * Store new coupon.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'max:50', 'unique:coupons'],
            'type' => ['required', 'in:percent,fixed'],
            'value' => ['required', 'numeric', 'min:1'],
            'min_spend' => ['nullable', 'numeric', 'min:0'],
            'expires_at' => ['nullable', 'date'],
        ]);

        $validated['code'] = strtoupper(trim($validated['code']));
        $validated['min_spend'] = $validated['min_spend'] ?? 0;
        $validated['is_active'] = true;

        Coupon::create($validated);

        return redirect()->route('admin.coupons.index')->with('success', 'Coupon created successfully.');
    }

    /**
     * Toggle coupon status.
     */
    public function toggle(Coupon $coupon): RedirectResponse
    {
        $coupon->update(['is_active' => ! $coupon->is_active]);

        return redirect()->back()->with('success', 'Coupon status updated.');
    }

    /**
     * Delete coupon.
     */
    public function destroy(Coupon $coupon): RedirectResponse
    {
        $coupon->delete();

        return redirect()->back()->with('success', 'Coupon deleted.');
    }
}
