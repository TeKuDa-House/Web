<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SellerController extends Controller
{
    // Créer un nouveau vendeur
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'seller_id' => 'required|integer',
            'address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation échouée', 'errors' => $validator->errors()], 400);
        }

        $seller = Seller::create([
            'seller_id' => $request->input('seller_id'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'postal_code' => $request->input('postal_code'),
            'country' => $request->input('country'),
        ]);

        return response()->json($seller, 201);
    }

    // Récupérer les informations sur un vendeur
    public function show($id)
    {
        $seller = Seller::find($id);

        if (!$seller) {
            return response()->json(['message' => 'Vendeur non trouvé'], 404);
        }

        return response()->json($seller);
    }

    // Mettre à jour les informations d'un vendeur
    public function update(Request $request, $id)
    {
        $seller = Seller::find($id);

        if (!$seller) {
            return response()->json(['message' => 'Vendeur non trouvé'], 404);
        }

        $validator = Validator::make($request->all(), [
            'address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation échouée', 'errors' => $validator->errors()], 400);
        }

        $seller->update([
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'postal_code' => $request->input('postal_code'),
            'country' => $request->input('country'),
        ]);

        return response()->json($seller);
    }
}
