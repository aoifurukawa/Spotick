<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $post;

    private $content;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Post $post, Content $content)
    {
        $this->middleware('auth');
        $this->post = $post;
        $this->content = $content;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort');

        if ($sort == 3) {
            // イベント日付順（昇順）
            $all_posts = $this->post->orderBy('date', 'asc')->get();
        } elseif ($sort == 2) {
            $all_posts = $this->post->withCount('like')->orderBy('like_count', 'desc')->get();
        } elseif ($sort == 1) {
            $all_posts = $this->post->latest()->get();
        } else {
            $all_posts = $this->post->latest()->get();
        }

        $all_content = $this->content->oldest()->get();

        return view('sponsor/home')->with('all_posts', $all_posts)
            ->with('all_content', $all_content);

    }
}
