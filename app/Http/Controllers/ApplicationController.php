<?php

namespace App\Http\Controllers;

use App\Http\Requests\Applications\StoreApplicationRequest;
use App\Http\Requests\Applications\UpdateApplicationRequest;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        return view('applications.index', [
            'inProgressApplications' => $user->applications()->inProgress()->get(),
            'closedApplications' => $user->applications()->closed()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('applications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationRequest $request)
    {
        $application = $request->user()->applications()->create(
            $request->validated()
        );

        return to_route('applications.show', $application)
            ->with('status', 'Application Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        $this->authorize('view', $application);

        return view('applications.show', [
            'application' => $application,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        $this->authorize('update', $application);

        return view('applications.edit', [
            'application' => $application,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        $this->authorize('update', $application);

        $validated = $request->validated();
        $application->update($validated);

        return to_route('applications.show', $application)
            ->with('status', 'Application Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        $this->authorize('delete', $application);

        $application->delete();

        return to_route('applications.index');
    }
}
