<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index() { $certificates = Certificate::latest('issued_at')->paginate(15); return view('admin.certificates.index', compact('certificates')); }
    public function create() { return view('admin.certificates.form', ['certificate' => new Certificate()]); }
    public function store(Request $request)
    {
        $data = $this->validated($request);
        if ($request->hasFile('image')) $data['image'] = $request->file('image')->store('certificates','public');
        Certificate::create($data);
        return redirect()->route('admin.certificates.index')->with('success','Certificate created.');
    }
    public function edit(Certificate $certificate) { return view('admin.certificates.form', compact('certificate')); }
    public function update(Request $request, Certificate $certificate)
    {
        $data = $this->validated($request);
        if ($request->hasFile('image')) { if ($certificate->image) Storage::disk('public')->delete($certificate->image); $data['image'] = $request->file('image')->store('certificates','public'); }
        $certificate->update($data);
        return redirect()->route('admin.certificates.index')->with('success','Certificate updated.');
    }
    public function destroy(Certificate $certificate) { if ($certificate->image) Storage::disk('public')->delete($certificate->image); $certificate->delete(); return back()->with('success','Certificate deleted.'); }
    private function validated(Request $request): array { return $request->validate(['title'=>'required|string|max:150','issuer'=>'required|string|max:150','issued_at'=>'nullable|date','credential_url'=>'nullable|url|max:255','description'=>'nullable|string|max:2000','image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:3072']); }
}
