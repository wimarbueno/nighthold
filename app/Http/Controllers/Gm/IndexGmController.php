<?php


namespace App\Http\Controllers\Gm;


use App\Http\Controllers\Controller;
use App\Models\Wotlk\Gm\Ticket;
use Illuminate\Support\Facades\DB;

class IndexGmController extends Controller
{
    public function index() {
        $ticket = Ticket::where('type', 0)->orderBy('createTime')->get();
        return view('gm.index', ['ticket' => $ticket]);
    }

    public function ticket() {
        $ticket = Ticket::orderBy('createTime')->get();
        return view('gm.ticket', ['ticket' => $ticket]);
    }

    public function edit(Ticket $ticket) {
        return view('gm.ticket_edit', ['ticket' => $ticket]);
    }
}
