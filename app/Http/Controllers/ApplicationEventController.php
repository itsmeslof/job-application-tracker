<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationEvent;
use Illuminate\Http\Request;

class ApplicationEventController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Application $application)
    {
        $this->authorize('update', $application);

        return view('applications.events.create', [
            'application' => $application,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Application $application, Request $request)
    {
        $this->authorize('update', $application);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:30000'],
        ]);

        $event = $application->events()->make($validated);
        $event->user_id = $request->user()->id;
        $event->save();

        return to_route('applications.show', $application);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application, ApplicationEvent $event)
    {
        $this->authorize('update', $application);

        return view('applications.events.edit', [
            'application' => $application,
            'event' => $event,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        Application $application,
        ApplicationEvent $event
    ) {
        $this->authorize('update', $application);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:30000'],
        ]);

        $event->update($validated);

        return to_route('applications.show', $application);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application, ApplicationEvent $event)
    {
        $this->authorize('delete', $application);

        if (!$event->editable) {
            return to_route('applications.show', $application);
        }

        $event->delete();

        return to_route('applications.show', $application);
    }
}
