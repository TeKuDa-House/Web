<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdsController extends Controller
{
    // Créer une nouvelle annonce
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'unit_price' => 'required|numeric',
            'quantity' => 'required|integer',
            'condition' => 'required|string',
            'state' => 'required|string',
            'images_url' => 'nullable|array',
            'user_id' => 'required|integer',
            'cat_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation échouée', 'errors' => $validator->errors()], 400);
        }

        $ad = Ad::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'unit_price' => $request->input('unit_price'),
            'quantity' => $request->input('quantity'),
            'condition' => $request->input('condition'),
            'state' => $request->input('state'),
            'images_url' => $request->input('images_url', []),
            'user_id' => $request->input('user_id'),
            'cat_id' => $request->input('cat_id'),
        ]);

        return response()->json($ad, 201);
    }

    // Récupérer toutes les annonces
    public function index()
    {
        $ads = Ad::all();

        return response()->json($ads);
    }

    // Afficher une annonce spécifique
    public function show($id)
    {
        $ad = Ad::find($id);

        if (!$ad) {
            return response()->json(['message' => 'Annonce non trouvée'], 404);
        }

        return response()->json($ad);
    }

    // Mettre à jour une annonce
    public function update(Request $request, $id)
    {
        $ad = Ad::find($id);

        if (!$ad) {
            return response()->json(['message' => 'Annonce non trouvée'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'unit_price' => 'required|numeric',
            'quantity' => 'required|integer',
            'condition' => 'required|string',
            'state' => 'required|string',
            'images_url' => 'nullable|array',
            'user_id' => 'required|integer',
            'cat_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation échouée', 'errors' => $validator->errors()], 400);
        }

        $ad->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'unit_price' => $request->input('unit_price'),
            'quantity' => $request->input('quantity'),
            'condition' => $request->input('condition'),
            'state' => $request->input('state'),
            'images_url' => $request->input('images_url', []),
            'user_id' => $request->input('user_id'),
            'cat_id' => $request->input('cat_id'),
        ]);

        return response()->json($ad);
    }

    // Supprimer une annonce
    public function destroy($id)
    {
        $ad = Ad::find($id);

        if (!$ad) {
            return response()->json(['message' => 'Annonce non trouvée'], 404);
        }

        $ad->delete();

        return response()->json(['message' => 'Annonce supprimée']);
    }
}
