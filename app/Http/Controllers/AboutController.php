<?php

namespace App\Http\Controllers;

use App\Models\PageContent;
use Illuminate\Support\Facades\App;

class AboutController extends Controller
{
    public function index()
    {
        $content = PageContent::contentFor('about', App::getLocale());

        return view('pages.about', compact('content'));
    }
}
