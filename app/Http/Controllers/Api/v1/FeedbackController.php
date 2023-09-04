<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    // Créer un nouveau feedback
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'ad_id' => 'required|integer',
            'appreciation' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation échouée', 'errors' => $validator->errors()], 400);
        }

        $feedback = Feedback::create([
            'user_id' => $request->input('user_id'),
            'ad_id' => $request->input('ad_id'),
            'appreciation' => $request->input('appreciation'),
        ]);

        return response()->json($feedback, 201);
    }

    // Récupérer les feedbacks pour une annonce spécifique
    public function show($userId)
    {
        $feedbacks = User::where('user_id', $userId)->get();

        return response()->json($feedbacks);
    }

    // Récupérer les feedbacks pour une annonce spécifique
    public function getFeedbacksForAd($adId)
    {
        $feedbacks = Feedback::where('ad_id', $adId)->get();

        return response()->json($feedbacks);
    }

    // Supprimer un feedback
    public function destroy($id)
    {
        $feedback = Feedback::find($id);

        if (!$feedback) {
            return response()->json(['message' => 'Feedback non trouvé'], 404);
        }

        $feedback->delete();

        return response()->json(['message' => 'Feedback supprimé']);
    }
}
