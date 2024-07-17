<?php

namespace App\Http\Controllers\ApplicationEvent;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationEvent;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function show(
        Request $request,
        Application $application,
        ApplicationEvent $event
    ) {
        $this->authorize('delete', $application);

        if (!$event->editable) {
            return to_route('applications.show', $application);
        }

        return view('applications.events.delete', [
            'application' => $application,
            'event' => $event,
        ]);
    }
}
