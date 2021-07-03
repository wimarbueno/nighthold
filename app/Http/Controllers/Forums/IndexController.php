<?php

namespace App\Http\Controllers\Forums;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\Thread;
use Genert\BBCode\BBCode;

class IndexController extends Controller
{
    public function index() {
        return view('forum.index', [
            'thread' => Channel::where('parent_id', 0)->with('forums')->orderBy('sort')->get()
        ]);
    }

    public function show($slug) {
        if (auth()->check()) {
            auth()->user()->read($slug);
        }
        $threads = Channel::where('parent_id', 0)->with('forums')->orderBy('sort')->get();
        $category = Channel::where('id', $slug)->whereNotNull('parent_id')->firstOrFail();
        $categories = Channel::where('id', $slug)->with('forums')->orderBy('sort')->get();
        $sidebar = Channel::where('id', $slug)->orderBy('parent_id', 'DESC')->with(['childrenCategories'])->get();
        $topics = Thread::whereChannelId($category->id)->whereNull('parent_id')->orderBy('sticky', 'DESC')->orderBy('created_at', 'DESC')->with(['user' => function($query) {
            $query->select('id', 'name');
        }])->paginate(30);
        return view('forum.show', compact('category', 'topics', 'threads', 'categories', 'sidebar'));
    }

    public function store()
    {
        request()->validate([
            'subject' => 'required',
            'messages' => 'required'
        ]);
        $bbCode = new BBCode();

        $bbCode->addParser(
            'custom-link',
            '/\[link=(.*?)\](.*?)\[\/link\]/s',
            '<a href="$1">$2</a>',
            '$1'
        );

        $url = preg_replace("#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#iS", "<strong><a href='$0' target='_blank'>$0</a></strong>", request('detail'));
        
        $texts = $bbCode->convertToHtml($url, BBCode::CASE_SENSITIVE);

        $text = $this->getInLines($texts);

        $thread = Thread::create([
            'user_id' => auth()->id(),
            'channel_id' => request('channel_id'),
            'title' => request('subject'),
            'body' => $text
        ]);

        if (request()->wantsJson()) {
            return response($thread, 201);
        }

        return redirect($thread->path())
            ->with('flash', 'Your thread has been published!');
    }


    protected function getInLines($source){
        $order   = array("\r\n", "\n", "\r");
        $replace = '<br />';
        return str_replace($order, $replace, $source);
    }

    protected function setInLine($source) {
        if(isset($_SERVER['SHELL'])) return preg_replace('/\<br(\s*)?\/?\>/i', PHP_EOL, $source);
        return nl2br($source);
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

    public function patch_notes() {
        return view('forum.patch_notes');
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
