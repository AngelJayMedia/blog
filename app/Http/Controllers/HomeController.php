<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;

class HomeController extends Controller
{
    public function index()
    {
        $today = new \DateTime();

        return view('home.index', [
            'posts'  => Post::where('featured', true)
                ->whereNotNull('published_at')
                ->where('published_at', '<=', $today)
                ->latest()
                ->take(3)
                ->get(),
        ]);
    }
}
