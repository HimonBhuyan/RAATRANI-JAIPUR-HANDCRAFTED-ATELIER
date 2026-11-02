<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminInquiryController extends Controller
{
    /**
     * List all customer and gifting inquiries.
     */
    public function index(): View
    {
        $inquiries = ContactMessage::latest()->paginate(15);

        return view('admin.inquiries.index', compact('inquiries'));
    }

    /**
     * Toggle read/unread state.
     */
    public function toggleRead(ContactMessage $inquiry): RedirectResponse
    {
        $inquiry->update(['is_read' => ! $inquiry->is_read]);

        return redirect()->back()->with('success', 'Inquiry marked as '.($inquiry->is_read ? 'read' : 'unread').'.');
    }

    /**
     * Delete inquiry.
     */
    public function destroy(ContactMessage $inquiry): RedirectResponse
    {
        $inquiry->delete();

        return redirect()->back()->with('success', 'Inquiry deleted.');
    }
}
