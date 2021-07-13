<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Thread;
use App\Models\ThreadVote;
use App\Models\User;
use App\Services\Logs\Log;
use Genert\BBCode\BBCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class JsonController extends Controller
{
    public function notificationsList()
    {
        return response()->json([
            "totalNotifications" => 1,
            "notifications" => [
                [
                    "id" => 1894440545,
                    "title" => "Добро пожаловать",
                    "content" => "Форум на стадии разработки",
                    'httpLink' => [
                        'content' => 'Предложения',
                        'link' => 'https://nighthold.pro/ru-ru/forums/168',
                    ],
                    "img" => [
                        "mediaId" => 20817995,
                        "url" => "https://nighthold.pro/v3/assets/img_1.png"
                    ]
                ]
            ],
            "notificationsCount" => 1
        ]);
    }

    public function notifications()
    {
        return response()->json([
            "totalNotifications" => 1,
            "notifications" => [
                [
                    "id" => 1894440545,
                    "title" => "Добро пожаловать",
                    "content" => "Форум на стадии разработки",
                    'httpLink' => [
                        'content' => 'Предложения',
                        'link' => 'https://nighthold.pro/ru-ru/forums/168',
                    ],
                    "img" => [
                        "mediaId" => 20817995,
                        "url" => "https://nighthold.pro/v3/assets/img_1.png"
                    ]
                ]
            ],
            "notificationsCount" => 1
    ]);
    }

    public function update()
    {
        return [];
    }

    public function block(Request $request, $id) {
        $user = User::find($id);

        $user->bans()->create([
            'expired_at' => '+' . $request->query('type') . ' day',
            'comment'=> $request->query('reason')
        ]);

        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole('Заблокированные');

        Log::WriteLog(__('account.account_12_1', ['name' => $user->name]));
    }

    public function report() {
        return Report::create([
            'topic_id' => request('thread'),
            'type' => request('type'),
            'reason' => request('reason'),
            'user_add' => Auth::user()->id
        ]);
    }

    public function sticky($id) {
        Thread::where('id', $id)->update(['sticky' => '1']);
    }

    public function unsticky($id) {
        Thread::where('id', $id)->update(['sticky' => '0']);
    }

    public function closed($id) {
        Thread::where('id', $id)->update(['locked' => '1']);
    }

    public function unclosed($id)
    {
        Thread::where('id', $id)->update(['locked' => '0']);
    }

    public function vote($id) {
        if (ThreadVote::where('threads_id', $id)->where('user_id', Auth::user()->id)->where('type', 'up')->first()){
            $up = Thread::where('id', $id)->first();
            return response()->json([
                'toggleRankMode' => $up->up + $up->down,
                'vote' => $up->down - $up->up
            ]);
        }
        Thread::where('id', $id)->increment('up', 1);
        ThreadVote::create([
            'threads_id' => $id,
            'user_id' => Auth::user()->id,
            'type' => 'up'
        ]);
        $up = Thread::where('id', $id)->first();
        return response()->json([
            'toggleRankMode' => $up->up + $up->down,
            'vote' => $up->down - $up->up
        ]);
    }

    public function down($id) {
        if (ThreadVote::where('threads_id', $id)->where('user_id', Auth::user()->id)->where('type', 'down')->first()){
            $vote = Thread::whereId($id)->select('up', 'down')->first();
            return response()->json([
                'toggleRankMode' => $vote->down + $vote->up,
                'vote' => $vote->down - $vote->up
            ]);
        }
        Thread::where('id', $id)->increment('down', 1);
        ThreadVote::create([
            'threads_id' => $id,
            'user_id' => Auth::user()->id,
            'type' => 'down'
        ]);
        $down = Thread::where('id', $id)->first();
        return response()->json([
            'toggleRankMode' => $down->down + $down->up - 2,
        ]);
    }

    public function edit(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'detail' => 'required|string|min:10'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        Thread::where('id', $id)->update(['body' => $request->get('detail')]);
        return redirect($request->get('return'));
    }

    protected function getInLines($source){
        $order   = array("\r\n", "\n", "\r");
        $replace = '<br />';
        return str_replace($order, $replace, $source);
    }

    protected function setInLines($source){
        $tempCONTENT = str_ireplace(array("\r\n","/\r","\n/",'/\r','\n/'),'<br />', $source);
        return str_ireplace(array('<br /><br />'),'<br />', $tempCONTENT);
    }


    public function frag($id) {
        $thread = Thread::where('id', $id)->firstOrFail();
        $redactor = view('forum.edit.form', ['thread' => $thread->id, 'detail' => $thread->body, 'id' => $id])->render();
        return response()->json(['success' => true, 'content' => $redactor, 'id' => $id]);
    }

    public function delete($topic)
    {
        $data = Thread::where('id', $topic)->first();
        if ($data->parent_id === null) {
            $data->delete();
        } else {
            Thread::where('id', $topic)->delete();
        }

        if (request()->wantsJson()) {
            return redirect()->route('forum.show', $data->channel_id);
        }
        return redirect()->route('forum.show', $data->channel_id);
    }

}
