<?php

namespace App\Http\Controllers;

use App\Models\Raid;

class RaidController extends Controller
{
    public function index($server, $characters, $key, $ids) {
        return view('game.raid.details', ['data' => Raid::where('ids', urldecode($ids))->first()]);
    }
}
