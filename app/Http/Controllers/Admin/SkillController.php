<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('category')
            ->orderBy('sort_order')
            ->paginate(20);

        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.form', [
            'skill' => new Skill()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:80',
            'category' => 'required|string|max:80',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')
                ->store('skills', 'public');
        }

        Skill::create($data);

        return redirect()
            ->route('admin.skills.index')
            ->with('success', 'Skill created.');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.form', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $data = $request->validate([
            'name' => 'required|string|max:80',
            'category' => 'required|string|max:80',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('icon')) {

            // Delete old icon
            if ($skill->icon) {
                Storage::disk('public')->delete($skill->icon);
            }

            // Store new icon
            $data['icon'] = $request->file('icon')
                ->store('skills', 'public');
        }

        $skill->update($data);

        return redirect()
            ->route('admin.skills.index')
            ->with('success', 'Skill updated.');
    }

    public function destroy(Skill $skill)
    {
        if ($skill->icon) {
            Storage::disk('public')->delete($skill->icon);
        }

        $skill->delete();

        return back()->with('success', 'Skill deleted.');
    }
}
