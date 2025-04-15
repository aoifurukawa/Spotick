<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    private $post;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->middleware('auth');
        $this->post = $post;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_posts = $this->post->latest()->get();

        return view('sponsor/home')->with('all_posts', $all_posts);
    }
}
