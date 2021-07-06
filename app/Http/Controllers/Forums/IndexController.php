<?php

namespace App\Http\Controllers\Forums;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\Thread;
use Genert\BBCode\BBCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function index() {
        return view('forum.index', [
            'thread' => Channel::where('parent_id', 0)->with('forums')->with('threads')->orderBy('sort')->get()
        ]);
    }

    public function show($slug) {
        if (auth()->check()) {
            auth()->user()->read($slug);
        }
        $threads = Channel::where('parent_id', 0)->with('forums')->orderBy('sort')->get();
        $category = Channel::where('id', $slug)->whereNotNull('parent_id')->firstOrFail();
        $categories = Channel::where('id', $slug)->with('forums')->with('threads')->orderBy('sort')->get();
        $sidebar = Channel::where('id', $slug)->orderBy('parent_id', 'DESC')->with(['childrenCategories'])->get();
        $topics = Thread::whereChannelId($category->id)->whereNull('parent_id')->orderBy('sticky', 'DESC')->orderBy('created_at', 'DESC')->with(['user' => function($query) {
            $query->select('id', 'name');
        }])->paginate(30);
        return view('forum.show', compact('category', 'topics', 'threads', 'categories', 'sidebar'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|string|min:5',
            'messages' => 'required|string|min:10'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $thread = Thread::create([
            'user_id' => auth()->id(),
            'channel_id' => $request->get('channel_id'),
            'title' => $request->get('subject'),
            'body' => $request->get('messages')
        ]);

        if (request()->wantsJson()) {
            return response($thread, 201);
        }

        return redirect($thread->path())->with('flash', 'Your thread has been published!');
    }

    public function topic($slug)
    {
        $thread = Thread::where('id', $slug)->whereNull('parent_id')->firstOrFail();
        if (auth()->check()) {
            auth()->user()->read($slug);
        }
        $topics = Thread::whereParentId($thread->id)->paginate(10);
        $sidebar = Channel::where('id', $thread->channel_id)->with('childrenCategories')->orderBy('parent_id', 'desc')->get();
        return view('forum.topic', compact('thread', 'topics', 'sidebar'));
    }

    public function new() {
        $topics = Thread::whereNull('parent_id')->orderBy('created_at', 'DESC')->with(['user' => function($query) {
            $query->select('id', 'name');
        }])->paginate(10);
        return view('forum.new', compact( 'topics'));
    }

    public function latest() {
        $topics = Thread::whereNotNull('parent_id')->orderBy('created_at', 'DESC')->with(['user' => function($query) {
            $query->select('id', 'name');
        }])->paginate(10);
        return view('forum.latest', compact( 'topics'));
    }

}
