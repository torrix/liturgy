<?php

namespace App\Http\Controllers;

use App\Models\Prayer;
use Illuminate\Http\Request;

class PrayerController extends Controller
{
    public function index()
    {
        $prayers = Prayer::all();

        return view('prayers.index', [
            'prayers' => $prayers,
        ]);
    }

    public function create()
    {
        return view('prayers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'day'    => 'required',
            'prayer' => 'required',
        ]);

        $prayer = new Prayer;

        $prayer->day    = $validatedData['day'];
        $prayer->prayer = $validatedData['prayer'];

        $prayer->save();

        return redirect(action([__CLASS__, 'index']));
    }

    public function show($id)
    {
        $prayer = Prayer::find($id);

        return view('prayers.show', [
            'prayer' => $prayer,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'day'    => 'required',
            'prayer' => 'required',
        ]);

        $prayer = Prayer::find($id);

        $prayer->day    = $validatedData['day'];
        $prayer->prayer = $validatedData['prayer'];

        $prayer->save();

        return redirect(action([__CLASS__, 'index']));
    }

    public function destroy($id)
    {
        $prayer = Prayer::find($id);
        $prayer->delete();

        return redirect(action([__CLASS__, 'index']));
    }
}
