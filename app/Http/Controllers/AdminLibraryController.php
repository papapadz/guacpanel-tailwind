<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLibraryController extends Controller
{
    public function breeds(Request $request)
    {
        return inertia('Admin/DCF/Settings', [
            'breeds' => Audit::query()
                ->with('user')
                ->latest()
                ->paginate($request->input('per_page', 10))
        ]);
    }
}
