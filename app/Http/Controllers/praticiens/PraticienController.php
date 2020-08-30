<?php

namespace App\Http\Controllers\Praticiens;

use App\Http\Controllers\Controller;
use App\Repositories\BaseRepository;
use App\Repositories\PraticienRepository;

class PraticienController extends Controller
{
    protected $praticien;
    protected $baseRepository;

    public function __construct(PraticienRepository $praticien, BaseRepository $baseRepository)
    {
        $this->praticien = $praticien;
        $this->baseRepository = $baseRepository;
    }

    public function home()
    {
        $praticiens = $this->praticien->getOthersPraticiens();
        return view('praticien.home', compact('praticiens'));
    }
}
