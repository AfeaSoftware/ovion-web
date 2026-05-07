<?php

namespace App\Http\Controllers;

use Afea\Cms\Blog\Models\BlogPost;
use Afea\Cms\Hero\Models\Hero;
use App\Models\PageContent;
use Illuminate\Support\Facades\App;

class HomePageController extends Controller
{
    public function index()
    {
        $heroes = Hero::active()->ordered()->get();

        $latestPosts = BlogPost::published()
            ->with(['category', 'media'])
            ->latest('published_at')
            ->limit(3)
            ->get();

        $content = PageContent::contentFor('home', App::getLocale());

        return view('pages.home', compact('heroes', 'latestPosts', 'content'));
    }
}
