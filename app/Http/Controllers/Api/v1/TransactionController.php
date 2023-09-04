<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    // Créer une nouvelle transaction
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ad_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'amount' => 'required|numeric',
            'state' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation échouée', 'errors' => $validator->errors()], 400);
        }

        $transaction = Transaction::create([
            'ad_id' => $request->input('ad_id'),
            'customer_id' => $request->input('customer_id'),
            'amount' => $request->input('amount'),
            'state' => $request->input('state'),
        ]);

        return response()->json($transaction, 201);
    }

    // Récupérer les transactions liées à un utilisateur
    public function getTransactionsForUser($userId)
    {
        $transactions = Transaction::where('customer_id', $userId)->get();

        return response()->json($transactions);
    }

    // Mettre à jour l'état d'une transaction
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction non trouvée'], 404);
        }

        $validator = Validator::make($request->all(), [
            'state' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation échouée', 'errors' => $validator->errors()], 400);
        }

        $transaction->update([
            'state' => $request->input('state'),
        ]);

        return response()->json($transaction);
    }
}
