<?php

namespace App\Http\Controllers;

use App\Models\Reading;
use Illuminate\Http\Request;

class ReadingController extends Controller
{
    public function index()
    {
        $readings = Reading::orderBy('publish_date', 'desc')->get();

        return view('readings.index', [
            'readings' => $readings,
        ]);
    }

    public function create()
    {
        return view('readings.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'publish_date' => 'required',
            'passage'      => 'required',
        ]);

        $reading = new Reading;

        $reading->publish_date = $validatedData['publish_date'];
        $reading->passage      = $validatedData['passage'];

        $reading->save();

        return redirect(action([__CLASS__, 'index']));
    }

    public function show($id)
    {
        $reading = Reading::find($id);

        return view('readings.show', [
            'reading' => $reading,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'publish_date' => 'required',
            'passage'      => 'required',
        ]);

        $reading = Reading::find($id);

        $reading->publish_date = $validatedData['publish_date'];
        $reading->passage      = $validatedData['passage'];

        $reading->save();

        return redirect(action([__CLASS__, 'index']));
    }

    public function destroy($id)
    {
        $reading = Reading::find($id);
        $reading->delete();

        return redirect(action([__CLASS__, 'index']));
    }
}
