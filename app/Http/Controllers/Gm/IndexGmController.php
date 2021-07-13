<?php


namespace App\Http\Controllers\Gm;


use App\Http\Controllers\Controller;
use App\Models\Wotlk\Gm\Ticket;
use App\Services\Soap\SoapWotlk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndexGmController extends Controller
{
    function __construct() {
        $this->middleware('auth');
        $this->middleware('IsGm');
    }

    public function index() {

        $ticket = Ticket::where('type', 0)->get();
        $tickets = Ticket::all();
        return view('gm.index', ['ticket' => $ticket, 'tickets' => $tickets]);
    }

    public function ticket() {
        $ticket = Ticket::all();
        return view('gm.ticket', ['ticket' => $ticket]);
    }

    public function edit(Ticket $ticket) {
        $ticket->increment('viewed');
        return view('gm.ticket_edit', ['ticket' => $ticket]);
    }

    public function store(Request $request, Ticket $ticket) {

        $validator = Validator::make($request->all(), [
            'answer' => 'required|string|min:2'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $soap = new SoapWotlk();

        $soap->cmd('.ticket complete ' . $ticket->id . ' ' . $request->get('answer'));
        $soap->cmd('.ticket assign ' . $ticket->id . ' ' . auth()->user()->characters->where('realmId', 2)->first()->name);


        return redirect()->route('gm.ticket');
    }

    public function closed(Ticket $ticket) {
        $soap = new SoapWotlk();
        $soap->cmd('.ticket close ' . $ticket->id);
        return redirect()->route('gm.ticket');
    }
}
