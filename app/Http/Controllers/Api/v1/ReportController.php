<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    // Créer un nouveau signalement
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'ad_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation échouée', 'errors' => $validator->errors()], 400);
        }

        $report = Report::create([
            'user_id' => $request->input('user_id'),
            'ad_id' => $request->input('ad_id'),
        ]);

        return response()->json($report, 201);
    }

    // Récupérer les signalements pour une annonce spécifique
    public function getReportsForAd($adId)
    {
        $reports = Report::where('ad_id', $adId)->get();

        return response()->json($reports);
    }

    // Supprimer un signalement
    public function destroy($id)
    {
        $report = Report::find($id);

        if (!$report) {
            return response()->json(['message' => 'Signalement non trouvé'], 404);
        }

        $report->delete();

        return response()->json(['message' => 'Signalement supprimé']);
    }
}
