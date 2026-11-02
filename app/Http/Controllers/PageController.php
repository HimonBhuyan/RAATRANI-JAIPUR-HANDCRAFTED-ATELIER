<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Show About Raatrani page.
     */
    public function about(): View
    {
        return view('pages.about');
    }

    /**
     * Show The Craft of Hand Block Printing page.
     */
    public function craft(): View
    {
        return view('pages.craft');
    }

    /**
     * Show Contact Us & Studio page.
     */
    public function contact(): View
    {
        return view('pages.contact');
    }

    /**
     * Show Corporate & Custom Gifting page.
     */
    public function gifting(): View
    {
        return view('pages.gifting');
    }

    /**
     * Handle Contact / Custom Order form submission.
     */
    public function submitContact(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'subject' => ['nullable', 'string', 'max:255'],
            'inquiry_type' => ['required', 'in:general,custom_order,corporate_gifting,wholesale'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        ContactMessage::create($validated);

        return redirect()->back()->with('success', 'Thank you! Your message has been received. Our team will contact you within 24 hours or via WhatsApp.');
    }
}
