<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function show(Request $request, Application $application)
    {
        $this->authorize('delete', $application);

        return view('applications.delete', [
            'application' => $application,
        ]);
    }
}
