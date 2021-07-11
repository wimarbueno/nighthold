<?php


namespace App\Http\Controllers\Gm;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexGmController extends Controller
{
    public function index() {
        return view('gm.index');
    }

    public function ticket() {
        $ticket = DB::connection('WotlkChatacters')->table('gm_ticket')->orderBy('createTime')->get();
        return view('gm.ticket', ['ticket' => $ticket]);
    }
}
