<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Payback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaybackController extends Controller
{
    // Créer un nouveau remboursement
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'trans_id' => 'required|integer',
            'reason' => 'required|string',
            'state' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation échouée', 'errors' => $validator->errors()], 400);
        }

        $payback = Payback::create([
            'trans_id' => $request->input('trans_id'),
            'reason' => $request->input('reason'),
            'state' => $request->input('state'),
        ]);

        return response()->json($payback, 201);
    }

    // Récupérer les remboursements liés à une transaction
    public function getPaybacksForTransaction($transId)
    {
        $paybacks = Payback::where('trans_id', $transId)->get();

        return response()->json($paybacks);
    }

    // Mettre à jour l'état d'un remboursement
    public function update(Request $request, $id)
    {
        $payback = Payback::find($id);

        if (!$payback) {
            return response()->json(['message' => 'Remboursement non trouvé'], 404);
        }

        $validator = Validator::make($request->all(), [
            'state' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation échouée', 'errors' => $validator->errors()], 400);
        }

        $payback->update([
            'state' => $request->input('state'),
        ]);

        return response()->json($payback);
    }
}
