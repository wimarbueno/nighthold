<?php

namespace App\Http\Controllers\Forums;

use App\Http\Controllers\Controller;
use App\Models\Reply;
use App\Models\Thread;
use Genert\BBCode\BBCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }


    public function index($channelId, Thread $thread)
    {
        return $thread->replies()->paginate(20);
    }

    public function report() {
        return Report::create([
            'topic_id' => request('thread'),
            'type' => request('type'),
            'reason' => request('reason'),
            'user_add' => \Auth::user()->id
        ]);
    }

    public function store(Request $request, Thread $thread)
    {

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
            'detail' => 'required|string|min:10|strip_min:10'
        ]);

        if ($validator->fails()) {
            return redirect($thread->path())->withErrors($validator);
        }

        $thread->addReply([
            'parent_id' => $thread->id,
            'body' => $request->get('detail'),
            'user_id' => auth()->id(),
            'channel_id' => $thread->channel_id
        ])->load('creator');

        $thread->increment('replies_count');

        return back();
    }

    protected function getInLines($source){
        $order   = array("\r\n", "\n", "\r");
        $replace = '<br />';
        return str_replace($order, $replace, $source);
    }

    public function update(Reply $reply)
    {
        $this->authorize('update', $reply);

        $reply->update(request()->validate(['body' => 'required|spamfree']));
    }

    public function destroy(Reply $reply)
    {
        $this->authorize('update', $reply);

        $reply->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Reply deleted']);
        }

        return back();
    }
}
