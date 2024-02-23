<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KonvenCessieSebelum;

class Data extends Controller
{
    public function index(Request $request)
    {
        // Retrieve paginated templates with optional search and status query
        $search = $request->input('search');

        // Query templates and apply search filter if provided
        $konven_cessie_sebelums = KonvenCessieSebelum::when($search, function ($query) use ($search) {
            $query->where('nomorsurat', 'like', '%' . $search . '%')
                ->orWhere('namadebitur', 'like', '%' . $search . '%');
        })->paginate(5);

        return view('content.dashboard.dashboards-data', compact('konven_cessie_sebelums', 'search'));
    }
}
