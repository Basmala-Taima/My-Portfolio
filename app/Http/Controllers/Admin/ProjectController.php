<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index() { $projects = Project::latest()->paginate(12); return view('admin.projects.index', compact('projects')); }
    public function create() { return view('admin.projects.form', ['project' => new Project()]); }
    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug($data['title']);
        $data['tech_stack'] = $this->parseTech($request->input('tech_stack'));
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_published'] = $request->boolean('is_published');
        if ($request->hasFile('image')) $data['image'] = $request->file('image')->store('projects', 'public');
        Project::create($data);
        return redirect()->route('admin.projects.index')->with('success', 'Project created.');
    }
    public function edit(Project $project) { return view('admin.projects.form', compact('project')); }
    public function update(Request $request, Project $project)
    {
        $data = $this->validated($request, $project);
        if ($data['title'] !== $project->title) $data['slug'] = $this->uniqueSlug($data['title'], $project->id);
        $data['tech_stack'] = $this->parseTech($request->input('tech_stack'));
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_published'] = $request->boolean('is_published');
        if ($request->hasFile('image')) {
            if ($project->image) Storage::disk('public')->delete($project->image);
            $data['image'] = $request->file('image')->store('projects', 'public');
        }
        $project->update($data);
        return redirect()->route('admin.projects.index')->with('success', 'Project updated.');
    }
    public function destroy(Project $project)
    {
        if ($project->image) Storage::disk('public')->delete($project->image);
        $project->delete();
        return back()->with('success', 'Project deleted.');
    }
    private function validated(Request $request, ?Project $project = null): array
    {
        return $request->validate([
            'title' => ['required','string','max:150'], 'short_description' => ['required','string','max:255'],
            'description' => ['required','string','max:10000'], 'category' => ['required','string','max:80'],
            'tech_stack' => ['nullable','string','max:500'], 'image' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:3072'],
            'github_url' => ['nullable','url','max:255'], 'demo_url' => ['nullable','url','max:255'],
            'sort_order' => ['nullable','integer','min:0','max:9999'],
        ]);
    }
    private function parseTech(?string $value): array { return collect(explode(',', (string) $value))->map(fn($v) => trim($v))->filter()->values()->all(); }
    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title); $slug = $base; $i = 1;
        while (Project::where('slug', $slug)->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))->exists()) $slug = $base.'-'.$i++;
        return $slug;
    }
}
