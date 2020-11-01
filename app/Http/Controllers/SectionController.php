<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::orderBy('section', 'asc')->get();

        return view('sections.index', [
            'sections' => $sections,
        ]);
    }

    public function create()
    {
        return view('sections.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'section' => 'required',
            'content' => 'required',
        ]);

        $section = new Section;

        $section->section = $validatedData['section'];
        $section->content = $validatedData['content'];

        $section->save();

        return redirect(action([__CLASS__, 'index']));
    }

    public function show($id)
    {
        $section = Section::find($id);

        return view('sections.show', [
            'section' => $section,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'section' => 'required',
            'content' => 'required',
        ]);

        $section = Section::find($id);

        $section->section = $validatedData['section'];
        $section->content = $validatedData['content'];

        $section->save();

        return redirect(action([__CLASS__, 'index']));
    }

    public function destroy($id)
    {
        $section = Section::find($id);
        $section->delete();

        return redirect(action([__CLASS__, 'index']));
    }
}
