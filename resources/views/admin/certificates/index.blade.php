@extends('admin.layout') 
@section('title','Certificates') 
@section('section','CERTIFICATES')
@section('content')
<div class="admin-heading admin-heading-row">
    <div>
        <p class="overline">CONTENT MANAGEMENT</p>
        <h1>Certificates<span class="purple">.</span></h1>
    </div>
    <a class="btn btn-primary" href="{{ route('admin.certificates.create') }}">+ Add certificate</a>
</div>
<div class="admin-panel table-wrap">
    <table>
        <thead>
            <tr>
                <th>Certificate</th>
                <th>Issuer</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($certificates as $certificate)
            <tr>
                <td>{{ $certificate->title }}</td>
                <td>{{ $certificate->issuer }}</td>
                <td>{{ $certificate->issued_at?->format('M Y') }}</td>
                <td class="actions">
                    <a href="{{ route('admin.certificates.edit',$certificate) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.certificates.destroy',$certificate) }}" onsubmit="return confirm('Delete certificate?')">
                        @csrf 
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">No certificates added.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $certificates->links() }}
</div>
@endsection
