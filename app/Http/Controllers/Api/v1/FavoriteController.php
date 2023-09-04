<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FavoriteController extends Controller
{
    // Ajouter une annonce aux favoris
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'ad_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation échouée', 'errors' => $validator->errors()], 400);
        }

        $favorite = Favorite::create([
            'user_id' => $request->input('user_id'),
            'ad_id' => $request->input('ad_id'),
        ]);

        return response()->json($favorite, 201);
    }

    // Récupérer les favoris d'un utilisateur
    public function show($userId)
    {
        $favorites = Favorite::where('user_id', $userId)->get();

        return response()->json($favorites);
    }

    // Supprimer une annonce des favoris
    public function destroy($id)
    {
        $favorite = Favorite::find($id);

        if (!$favorite) {
            return response()->json(['message' => 'Favori non trouvé'], 404);
        }

        $favorite->delete();

        return response()->json(['message' => 'Favori supprimé']);
    }
}
