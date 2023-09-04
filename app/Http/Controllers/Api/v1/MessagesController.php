<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessagesController extends Controller
{
    // Envoyer un nouveau message
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sender_id' => 'required|integer',
            'recipient_id' => 'required|integer',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation échouée', 'errors' => $validator->errors()], 400);
        }

        $message = Message::create([
            'sender_id' => $request->input('sender_id'),
            'recipient_id' => $request->input('recipient_id'),
            'content' => $request->input('content'),
        ]);

        return response()->json($message, 201);
    }

    // Récupérer les messages entre deux utilisateurs
    public function getMessagesBetweenUsers($senderId, $recipientId)
    {
        $messages = Message::where(function ($query) use ($senderId, $recipientId) {
            $query->where('sender_id', $senderId)->where('recipient_id', $recipientId);
        })->orWhere(function ($query) use ($senderId, $recipientId) {
            $query->where('sender_id', $recipientId)->where('recipient_id', $senderId);
        })->get();

        return response()->json($messages);
    }

    // Supprimer un message
    public function destroy($id)
    {
        $message = Message::find($id);

        if (!$message) {
            return response()->json(['message' => 'Message non trouvé'], 404);
        }

        $message->delete();

        return response()->json(['message' => 'Message supprimé']);
    }
}
