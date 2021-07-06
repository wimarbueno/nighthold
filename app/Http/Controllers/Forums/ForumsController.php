<?php


namespace App\Http\Controllers\Forums;


use App\Http\Controllers\Controller;
use App\Models\Thread;
use Illuminate\Http\Request;

class ForumsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
        ]);

        $imageName = time().'.'.$request->file->extension();

        $path = 'public/forum/user-' . auth()->user()->id . '/';

        $request->file('file')->storeAs($path, $imageName);

        $pathRerurn = 'forum/user-' . auth()->user()->id . '/';

        return response()->json([ "location" => asset('storage/'.$pathRerurn . $imageName) ]);
    }

    public function edit($id) {
        $data = Thread::where('id', $id)->firstOrFail();
        return view('forum.edit.form', ['data' => $data, 'guid' => $id]);
    }

}
