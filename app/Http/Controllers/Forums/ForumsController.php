<?php

namespace App\Http\Controllers\Forums;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ForumsController extends Controller
{

    public function profile(Request $request) {
        if ($request->get('_xfResponseType') === "json") {
            return response()->json([
            "status" => "ok",
            "html" => [
               "content" => self::userProfile()
            ],
            "visitor" => [
                        "conversations_unread" => "0",
                "alerts_unviewed" => "0",
                "total_unread" => "0"
            ]
        ]);
        } else {
            return view('forum.user.profile');
        }
   }

   private function userProfile() {
        return view('forum.user.profiles')->render();
   }

    public function create(Request $request, $category) {
        if ($request->get('_xfResponseType') === "json") {
            return response()->json([
                "status" => "ok",
                "html" => [
                    "content" => self::createTheme(),
                    "title" => "Создать тему в..."
                ],
                "visitor" => [
                    "conversations_unread" => "0",
                    "alerts_unviewed" => "0",
                    "total_unread" => "0"
                ]
            ]);
        } else {
            $sidebar = Channel::where('id', $category)->orderBy('parent_id', 'DESC')->with(['childrenCategories'])->get();
            return view('forum.create.createTheme', ['category' => $category, 'sidebar' => $sidebar]);
        }
    }

    private static function createTheme(): string
    {
        $category = Channel::where('parent_id', 0)->with('forums')->with('threads')->orderBy('sort')->get();
        return view('forum.create.create', ['thread' => $category])->render();
    }

    public function store(Request $request, $category) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:5',
            'message_html' => 'required|string|min:10'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "error",
                "errors" => [
                    "title" => "Пожалуйста, введите корректный заголовок."
                ],
                "errorHtml" => [
                    "content" => self::createThemeError($validator),
                    "title" => "Упс! Мы столкнулись с некоторыми проблемами."
                ],
                "visitor" => [
                    "conversations_unread" => "0",
                    "alerts_unviewed" => "0",
                    "total_unread" => "0"
                ]
            ]);
        }

        $thread = Thread::create([
            'user_id' => auth()->id(),
            'channel_id' => $category,
            'title' => $request->get('title'),
            'body' => $request->get('message_html')
        ]);

        ///return redirect($thread->path())->with('flash', 'Your thread has been published!');
        return route('topic.show', [$thread->id]);
    }

    private static function createThemeError($validator): string
    {
        return view('forum.create.createThemeError')->withErrors($validator)->render();
    }

    public function draft(Request $request, $category) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:5',
            'message_html' => 'required|string|min:10'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "error",
                "errors" => [
                    "title" => "Пожалуйста, введите корректный заголовок."
                ],
                "errorHtml" => [
                    "content" => self::createThemeError($validator),
                    "title" => "Упс! Мы столкнулись с некоторыми проблемами."
                ],
                "visitor" => [
                    "conversations_unread" => "0",
                    "alerts_unviewed" => "0",
                    "total_unread" => "0"
                ]
            ]);
        }

        $thread = Thread::create([
            'user_id' => auth()->id(),
            'channel_id' => $category,
            'title' => $request->get('title'),
            'body' => $request->get('message_html')
        ]);

        return redirect($thread->path())->with('flash', 'Your thread has been published!');
    }
}
