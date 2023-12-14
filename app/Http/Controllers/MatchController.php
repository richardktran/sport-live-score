<?php

namespace App\Http\Controllers;

use App\Models\FootballMatch;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function getMatchDetails(Request $request, FootballMatch $match)
    {
        return view('match', compact('match'));
    }
}
