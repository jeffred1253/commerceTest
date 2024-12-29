<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\UltimateException;
use App\Http\Requests\StoreUserRequest;

class AuthController extends Controller
{
    // Création d'un compte client ou vendeur
    public function storeUser(StoreUserRequest $request)
    {
        try {
            if ($request->password != $request->password_confirmation) {
                throw new UltimateException("Mot de passe différent du mot de passe de confirmation !", 400);
            }
            $user = User::create($request->only(['name', 'email', 'password', 'isVendor']));

            // Connexion
            Auth::attempt(request(['email', 'password']));

            $id = $user->id;
            if ($user->isVendor == 1) {
                return redirect()->route('registerAccountIDForm', $id);
            }
            return redirect()->route('newCommande');
                
        }  catch (UltimateException $error) {
            throw new UltimateException($error->getMessage(),$error->getCode());
        } catch (Exception $error) {
            throw new Exception('Une erreur est survenue !', 400);
        }
    }

    // Indication de l'ID kkiapay
    public function registerAccountID(Request $request) {
        $user = User::find($request->user_id);
        $user->kkiaPay_ID = $request->kkiapay_ID;
        $user->save();
        return redirect()->route('produit.index');
    }

    // Méthode d'authentification
    public function connexion(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);
            
            $credentials = request(['email', 'password']);
            
            if (!Auth::attempt($credentials)) {
                throw new UltimateException("Email ou mot de passe incorrect", 400);
            }
            
            $user = Auth::user();
            if ($user->isVendor == 1) {
                return redirect()->route('produit.index');
            } else {
                return redirect()->route('newCommande');
            }
            
        } catch (UltimateException $error) {
            Log::error($error->getMessage());
            throw new UltimateException($error->getMessage(),$error->getCode());
        }
    } 
    
}
