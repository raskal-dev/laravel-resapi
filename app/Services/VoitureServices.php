<?php

namespace App\Services;

use App\Http\Controllers\BaseController;
use App\Models\Voitures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoitureServices extends BaseController
{
    public function index()
    {
        return $this->sendResponse([Voitures::all()], "Liste des voitures ");
    }

    public function createVoiture(Request $request)
    {
        Voitures::create([
            "matricule" => $request->matricule,
            "marque" => $request->marque,
            "categorie" => $request->categorie,
            "prix" => $request->prix,
            "isvendu" => false,
            "user_id" => Auth::user()->id,
        ]);

        return $this->sendResponse([], "opertion successfully");
    }

}
