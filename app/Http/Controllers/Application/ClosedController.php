<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ClosedController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        return view('applications.index', [
            'applications' => $user->applications()->closed()->get(),
        ]);
    }

    public function create(Request $request, Application $application)
    {
        $this->authorize('update', $application);

        if ($application->is_closed) {
            return to_route('applications.show', $application);
        }
    
        return view('applications.close', [
            'application' => $application,
        ]);
    }

    public function store(Request $request, Application $application)
    {
        $this->authorize('update', $application);
        
        $validated = $request->validate([
            'closed_reason' => ['nullable', 'string', 'max:255'],
        ]);

        if ($application->is_closed) {
            return to_route('applications.show', $application);
        }

        $application->closed_reason = $validated['closed_reason'];
        $application->is_closed = true;
        $application->save();

        return to_route('applications.show', $application);
    }
}
