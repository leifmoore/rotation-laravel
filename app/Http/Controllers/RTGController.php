<?php

namespace App\Http\Controllers;

use App\Models\RTG;
use App\Models\DailyRotationHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RTGController extends Controller
{
    public function index()
    {
        $rtgs = RTG::orderBy('position')->get();
        return view('rtgs.index', compact('rtgs'));
    }

    public function updateStatus(Request $request, RTG $rtg)
    {
        $request->validate([
            'status' => 'required|array',
            'location' => 'nullable|string',
            'availability_status' => 'nullable|string'
        ]);

        $rtg->update($request->all());
        
        // Record daily rotation history
        $this->recordRotationHistory();

        return response()->json(['message' => 'RTG status updated successfully']);
    }

    public function updatePosition(Request $request)
    {
        $request->validate([
            'rtgs' => 'required|array'
        ]);

        foreach ($request->rtgs as $index => $rtgId) {
            RTG::where('id', $rtgId)->update(['position' => $index]);
        }

        // Record daily rotation history
        $this->recordRotationHistory();

        return response()->json(['message' => 'RTG positions updated successfully']);
    }

    private function recordRotationHistory()
    {
        $dailyHistory = DailyRotationHistory::firstOrNew([
            'date' => now()->format('Y-m-d')
        ]);

        $dailyHistory->rotation_data = RTG::orderBy('position')->get()->map(function ($rtg) {
            return [
                'id' => $rtg->id,
                'name_code' => $rtg->name_code,
                'status' => $rtg->status,
                'location' => $rtg->location,
                'availability_status' => $rtg->availability_status
            ];
        })->toArray();

        $dailyHistory->save();
    }
}
