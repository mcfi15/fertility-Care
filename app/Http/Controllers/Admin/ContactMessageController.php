<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

/**
 * Admin ▸ Messages — the audit inbox for every public Contact-form submission.
 */
class ContactMessageController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter') === 'unread' ? 'unread' : 'all';

        $messages = ContactMessage::query()
            ->when($filter === 'unread', fn ($q) => $q->unread())
            ->newest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.message.index', [
            'messages'    => $messages,
            'filter'      => $filter,
            'unreadCount' => ContactMessage::query()->unread()->count(),
        ]);
    }

    public function show(ContactMessage $message)
    {
        if (! $message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('admin.message.show', compact('message'));
    }

    public function toggle(ContactMessage $message)
    {
        $message->update(['is_read' => ! $message->is_read]);

        return back()->with('message', 'Message status updated.');
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index')
            ->with('message', 'Message deleted.');
    }
}
