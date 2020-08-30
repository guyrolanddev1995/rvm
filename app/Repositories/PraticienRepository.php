<?php
namespace App\Repositories;

use App\Praticien;
use Illuminate\Support\Facades\Auth;

class PraticienRepository
{
    public function getOthersPraticiens()
    {
        return Praticien::where('id', '<>', Auth::id())
                        ->inRandomOrder()
                        ->limit(5)
                        ->get();
    }

    public function getFriends()
    {
        return Praticien::where('id', '<>', Auth::id())
                        ->orderBy('praticien_nom', 'asc')
                        ->get();
    }
}