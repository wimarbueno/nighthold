<?php


namespace App\Http\Controllers\Gm;


use App\Http\Controllers\Controller;
use App\Models\Wotlk\Gm\Ticket;
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

        Validator::extend('strip_min', function ($attribute, $value, $parameters, $validator) {

            $validator->addReplacer('strip_min', function($message, $attribute, $rule, $parameters){
                return str_replace([':min'], $parameters, $message);
            });

            return strlen(
                    strip_tags(
                        preg_replace(
                            '/\s+/',
                            '',
                            str_replace('&nbsp;',"", $value)
                        )
                    )
                ) >= $parameters[0];
        });

        $validator = Validator::make($request->all(), [
            'answer' => 'required|string|min:2|strip_min:2'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $ticket->where('id', $ticket->id)->update([
            'comment' => $request->get('answer')
        ]);

        $ticket->increment('viewed');

        return redirect()->route('gm.ticket')->with('success', 'Успешно');
    }
}
