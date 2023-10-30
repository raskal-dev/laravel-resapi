<?php

namespace App\Http\Controllers;

use App\Services\VoitureServices;
use Illuminate\Http\Request;

class VoituresController extends BaseController
{


    public function __construct(
        private readonly VoitureServices $voitureServices;
    )
    {
    }

    public function listVoiture()
    {
        return $this->voitureServices->index();
    }
}
