@extends('admin.layout') 
@section('title','Skills') 
@section('section','SKILLS')
@section('content')
<div class="admin-heading admin-heading-row">
    <div>
        <p class="overline">CONTENT MANAGEMENT</p>
        <h1>Skills<span class="purple">.</span></h1>
    </div>
    <a class="btn btn-primary" href="{{ route('admin.skills.create') }}">+ Add skill</a>
</div>
<div class="admin-panel table-wrap">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>icon</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($skills as $skill)
            <tr>
                <td>{{ $skill->name }}</td>
                <td>{{ $skill->category }}</td>
                <td>
                    @if ($skill->icon)
                        <img src="{{asset("storage/".$skill->icon) }}" alt="{{ $skill->name }} icon" style="object-fit: contain;" width="50" height="50">
                    @else
                        <span>No icon.</span>
                    @endif
                </td>
                <td class="actions">
                    <a href="{{ route('admin.skills.edit',$skill) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.skills.destroy',$skill) }}" onsubmit="return confirm('Delete skill?')">
                        @csrf 
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">No skills added.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $skills->links() }}
</div>
@endsection
