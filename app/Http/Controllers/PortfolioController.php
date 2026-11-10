<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Certificate;

class PortfolioController extends Controller
{
    public function home()
    {
        $featuredProjects = Project::where('is_published', true)->where('is_featured', true)->orderBy('sort_order')->latest()->take(3)->get();
        return view('pages.home', compact('featuredProjects'));
    }

    public function about() { return view('pages.about'); }

    public function skills()
    {
        $skills = Skill::orderBy('category')->orderBy('sort_order')->get()->groupBy('category');
        return view('pages.skills', compact('skills'));
    }

    public function projects()
    {
        $projects = Project::where('is_published', true)->orderBy('sort_order')->latest()->paginate(9);
        return view('projects.index', compact('projects'));
    }

    public function project(Project $project)
    {
        abort_unless($project->is_published, 404);
        return view('projects.show', compact('project'));
    }

    public function certificates()
    {
        $certificates = Certificate::orderByDesc('issued_at')->get();
        return view('pages.certificates', compact('certificates'));
    }
}
