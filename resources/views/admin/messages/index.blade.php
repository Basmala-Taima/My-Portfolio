@extends('admin.layout') 
@section('title','Messages') 
@section('section','MESSAGES')
@section('content')
<div class="admin-heading">
    <p class="overline">INBOX</p>
    <h1>Messages<span class="purple">.</span></h1>
</div>
<div class="admin-panel table-wrap">
    <table>
        <thead>
            <tr>
                <th>From</th>
                <th>Subject / Message</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($messages as $message)
            <tr>
                <td>
                    <strong>{{ $message->name }}</strong>
                    <small>{{ $message->email }}</small>
                </td>
                <td>{{ $message->subject ?: Str::limit($message->message,65) }}
                    <small>{{ Str::limit($message->message,100) }}</small>
                </td>
                <td>{{ $message->is_read ? 'Read' : 'Unread' }}</td>
                <td class="actions">
                    @if(!$message->is_read)
                    <form method="POST" action="{{ route('admin.messages.read',$message) }}">
                        @csrf 
                        @method('PATCH')
                        <button>Mark read</button>
                    </form>
                    @endif
                    <form method="POST" action="{{ route('admin.messages.destroy',$message) }}" onsubmit="return confirm('Delete message?')">
                        @csrf 
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Your inbox is empty.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $messages->links() }}
</div>
@endsection
