<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class InProgressController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        return view('applications.index', [
            'applications' => $user->applications()->inProgress()->get(),
        ]);
    }

    public function create(Request $request, Application $application)
    {
        $this->authorize('update', $application);

        if (!$application->is_closed) {
            return to_route('applications.show', $application);
        }

        return view('applications.open', [
            'application' => $application,
        ]);
    }

    public function store(Request $request, Application $application)
    {
        $this->authorize('update', $application);
        
        if (!$application->is_closed) {
            return to_route('applications.show', $application);
        }

        $application->closed_reason = "";
        $application->is_closed = false;
        $application->save();
        
        return to_route('applications.show', $application);
    }
}
