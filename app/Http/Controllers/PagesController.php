<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;

class PagesController extends Controller
{
    public function view($id, $slug ) {
        return view('pages.view', ['page' => Page::where('id', $id)->where('slug', $slug)->firstOrFail()]);
    }
}
