<?php

namespace App\Http\Middleware\Api\v1;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckJWT
{
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            // Le jeton JWT est valide et l'utilisateur est authentifié
            return $next($request);
        } catch (TokenExpiredException $e) {
            try {
                // Tentez de rafraîchir le jeton JWT
                $newToken = JWTAuth::refresh();
                $response = $next($request);
                // Vérifiez si l'en-tête "Authorization" existe déjà dans la réponse
                if (!$response->headers->has('Authorization')) {
                    // Ajoutez le nouveau jeton JWT dans l'en-tête de réponse "Authorization"
                    $response->header('Authorization', 'Bearer ' . $newToken);
                }
                return $response;
            } catch (TokenInvalidException $e) {
                // Si le jeton est invalide (non rafraîchissable), renvoyez une réponse d'erreur
                return response()->json(['error' => 'Token invalid'], 401);
            } catch (Exception $e) {
                // Si le rafraîchissement du jeton échoue pour une autre raison, renvoyez une réponse d'erreur
                return response()->json(['error' => 'Token refresh failed'], 401);
            }
        } catch (TokenInvalidException $e) {
            // Le jeton JWT est invalide (non expiré)
            return response()->json(['error' => 'Token invalid'], 401);
        } catch (Exception $e) {
            // Pour toutes les autres exceptions, renvoyez un message d'erreur générique
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }
}
