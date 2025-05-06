<?php

namespace App\Http\Controllers;

use App\Models\RTG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupervisorController extends Controller
{
    public function index()
    {
        $rtgs = RTG::orderBy('position')->get();
        return view('supervisor.dashboard', compact('rtgs'));
    }

    public function assignLocation(Request $request, RTG $rtg)
    {
        $request->validate([
            'location' => 'required|string',
            'availability_status' => 'required|string'
        ]);

        $rtg->update($request->all());
        
        // Record daily rotation history
        app(RTGController::class)->recordRotationHistory();

        return response()->json(['message' => 'Location assigned successfully']);
    }
}
