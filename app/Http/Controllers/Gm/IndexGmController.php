<?php


namespace App\Http\Controllers\Gm;


use App\Http\Controllers\Controller;
use App\Models\Wotlk\Gm\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class IndexGmController extends Controller
{
    public function index() {
        $ticket = Ticket::where('type', 0)->orderBy('createTime')->get();
        $tickets = Ticket::orderBy('createTime')->get();
        return view('gm.index', ['ticket' => $ticket, 'tickets' => $tickets]);
    }

    public function ticket() {
        $ticket = Ticket::orderBy('createTime')->get();
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
            'type' => $request->get('status'),
            'comment' => $request->get('answer'),
            'assignedTo' => $request->get('characters'),
            'escalated' => 1,
            'lastModifiedTime' => Carbon::parse(Carbon::now())->timestamp
        ]);

        $ticket->increment('viewed');

        return redirect()->route('gm.ticket')->with('success', 'Успешно');
    }
}
