<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    /**
     * Méthode d'inscription d'un utilisateur.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lastName' => 'required|string|max:255',
            'firstName' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'phone' => 'required|string|min:8|max:17',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = User::create([
            'lastName' => $request->input('lastName'),
            'firstName' => $request->input('firstName'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(['message' => 'Inscription réussie', 'token' => $token], 201);
    }

    /**
     * Méthode de connexion de l'utilisateur.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Identifiants invalides'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Impossible de créer un jeton'], 500);
        }

        return response()->json(['message' => 'Connexion réussie', 'token' => $token], 200);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Méthode de déconnexion de l'utilisateur.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Déconnexion réussie']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        $newToken = JWTAuth::refresh();

        // Créez une nouvelle réponse JSON sans l'en-tête Set-Cookie
        $response = new \Illuminate\Http\JsonResponse([
            'access_token' => $newToken,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);

        // Supprimez l'en-tête Set-Cookie de la réponse
        $response->headers->remove('Set-Cookie');

        return $response;
    }

}
