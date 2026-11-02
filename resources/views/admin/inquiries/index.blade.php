<x-layouts.admin header="Gifting & Contact Messages">
    <div class="space-y-6">
        <div class="bg-white rounded-xl border border-stone-200 overflow-hidden shadow-xs">
            <div class="p-4 border-b border-stone-200 font-serif font-bold text-sm text-stone-900">
                Customer & Corporate Gifting Inquiries
            </div>

            <div class="divide-y divide-stone-100">
                @forelse($inquiries as $inq)
                    <div class="p-5 {{ $inq->is_read ? 'bg-white' : 'bg-amber-50/40' }} space-y-3">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 text-xs">
                            <div class="flex items-center gap-2">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase {{ $inq->inquiry_type === 'corporate_gifting' ? 'bg-amber-100 text-amber-900' : 'bg-stone-100 text-stone-800' }}">
                                    {{ str_replace('_', ' ', $inq->inquiry_type) }}
                                </span>
                                <strong class="text-stone-900 text-sm">{{ $inq->name }}</strong>
                                <span class="text-stone-400">({{ $inq->created_at->diffForHumans() }})</span>
                            </div>

                            <div class="flex items-center gap-3">
                                @if($inq->phone)
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inq->phone) }}?text={{ urlencode('Hello ' . $inq->name . '! Thank you for your inquiry with Raatrani.') }}" target="_blank" class="px-2.5 py-1 bg-emerald-600 hover:bg-emerald-700 text-white rounded text-[11px] font-semibold transition">
                                        WhatsApp
                                    </a>
                                @endif
                                <form action="{{ route('admin.inquiries.toggle', $inq) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-xs text-stone-600 hover:text-stone-900 underline">
                                        Mark as {{ $inq->is_read ? 'Unread' : 'Read' }}
                                    </button>
                                </form>
                                <form action="{{ route('admin.inquiries.destroy', $inq) }}" method="POST" class="inline" onsubmit="return confirm('Delete message?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs text-rose-600 hover:underline">Delete</button>
                                </form>
                            </div>
                        </div>

                        <div class="text-xs text-stone-600 space-y-1">
                            <p>Email: <a href="mailto:{{ $inq->email }}" class="text-stone-900 font-semibold underline">{{ $inq->email }}</a> • Phone: <strong class="text-stone-900">{{ $inq->phone ?? 'N/A' }}</strong></p>
                            @if($inq->subject)
                                <p class="font-bold text-stone-800">Subject: {{ $inq->subject }}</p>
                            @endif
                            <div class="p-3 bg-stone-50 rounded-lg border border-stone-200/80 text-stone-800 leading-relaxed mt-2">
                                {{ $inq->message }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center text-xs text-stone-500">
                        No inquiries received yet.
                    </div>
                @endforelse
            </div>

            <div class="p-4 border-t border-stone-200">
                {{ $inquiries->links() }}
            </div>
        </div>
    </div>
</x-layouts.admin>

