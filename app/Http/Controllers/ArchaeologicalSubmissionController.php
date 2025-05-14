<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArchaeologicalSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $submissions = \App\Models\Submission::all();
        return view('submissions.index', compact('submissions')); // This MUST match the view name and variable
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('submissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::debug('Raw data:', $request->all());

        $validated = $request->validate([
            'category' => 'nullable|string|max:255',
            'gps_location' => 'nullable|string|max:255',
            'picture' => 'nullable|image|max:2048',
            'date_time' => 'required|date',
            'donate' => 'nullable|boolean',
            'extra_remarks' => 'nullable|string',
            'weight' => 'nullable|numeric',
            'measurements' => 'nullable|string|max:255',
            'material' => 'nullable|string|max:255',
            'timeperiod' => 'nullable|string|max:255',
        ]);

        if (!isset($validated['gps_location']) || trim($validated['gps_location']) === '') {
            $validated['gps_location'] = '52.379189,4.90093';
        }

        if (empty($validated['date_time'])) {
            $validated['date_time'] = now();
        }

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('uploads', 'public');
            $validated['picture'] = 'storage/' . $path;
        }


        $validated['donate'] = $request->has('donate');

        Log::info('Creating submission with:', $validated);

        Submission::create($validated);

        return redirect()->route('submissions.index')->with('success', 'Je vondst is opgeslagen!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Submission $submission)
    {
        return view('submissions.show', compact('submission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
