@extends('admin.layout')
@section('title','Projects') 
@section('section','PROJECTS')
@section('content')
<div class="admin-heading admin-heading-row">
    <div>
        <p class="overline">CONTENT MANAGEMENT</p>
        <h1>Projects<span class="purple">.</span></h1>
    </div>
    <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">+ Add project</a>
</div>
<div class="admin-panel">
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Project</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                    <tr>
                        <td>
                            <strong>{{ $project->title }}</strong>
                            <small>{{ $project->slug }}</small>
                        </td>
                        <td>{{ $project->category }}</td>
                        <td>{{ $project->is_published ? 'Published' : 'Draft' }}</td>
                        <td class="actions">
                            <a href="{{ route('admin.projects.edit',$project) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.projects.destroy',$project) }}" onsubmit="return confirm('Delete this project?')">
                                @csrf 
                                @method('DELETE')
                                <button>Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No projects added yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $projects->links() }}
</div>
@endsection
