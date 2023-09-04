<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShippingAddressController extends Controller
{
    // Créer une nouvelle adresse de livraison
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'trans_id' => 'required|integer',
            'address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
            'state' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation échouée', 'errors' => $validator->errors()], 400);
        }

        $shippingAddress = ShippingAddress::create([
            'trans_id' => $request->input('trans_id'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'postal_code' => $request->input('postal_code'),
            'country' => $request->input('country'),
            'state' => $request->input('state'),
        ]);

        return response()->json($shippingAddress, 201);
    }

    // Récupérer les adresses de livraison liées à une transaction
    public function getShippingAddressesForTransaction($transId)
    {
        $shippingAddresses = ShippingAddress::where('trans_id', $transId)->get();

        return response()->json($shippingAddresses);
    }

    // Mettre à jour une adresse de livraison
    public function update(Request $request, $id)
    {
        $shippingAddress = ShippingAddress::find($id);

        if (!$shippingAddress) {
            return response()->json(['message' => 'Adresse de livraison non trouvée'], 404);
        }

        $validator = Validator::make($request->all(), [
            'address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'country' => 'required|string',
            'state' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation échouée', 'errors' => $validator->errors()], 400);
        }

        $shippingAddress->update([
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'postal_code' => $request->input('postal_code'),
            'country' => $request->input('country'),
            'state' => $request->input('state'),
        ]);

        return response()->json($shippingAddress);
    }
}
