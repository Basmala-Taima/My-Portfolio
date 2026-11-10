<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function index() { $messages = Message::latest()->paginate(20); return view('admin.messages.index', compact('messages')); }
    public function markRead(Message $message) { $message->update(['is_read' => true]); return back()->with('success','Message marked as read.'); }
    public function destroy(Message $message) { $message->delete(); return back()->with('success','Message deleted.'); }
}
