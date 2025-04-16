<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function store(Request $request, $id)
    {
        $request->validate([

            'title' => 'required|string|max:255',
            'content' => 'required|integer', // 文章なら text に直したほうがいいかも
            'description' => 'required|string',
            'date' => 'required|date',
            'price' => 'required|integer|min:0',
            'number_of_tickets' => 'required|integer|min:1',
            'venue' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'picture_1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // ファイルアップロードなら別の対応が必要
            'picture_2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'picture_3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sponsor_name' => 'required|string|max:255',
            'background_color' => 'required|string',
            'mail_address' => 'required|email',
            'insta_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'x_url' => 'nullable|url',
        ]);

        $this->post->user_id = $id;
        $this->post->title = $request->title;
        $this->post->content = $request->content;
        $this->post->description = $request->description;
        $this->post->date = $request->date;
        $this->post->price = $request->price;
        $this->post->number_of_tickets = $request->number_of_tickets;
        $this->post->venue = $request->venue;
        $this->post->address = $request->address;

        if ($request->hasFile('picture_1')) {
            $file = $request->file('picture_1');
            $this->post->picture_1 = 'data:image/'.$file->extension().';base64,'.base64_encode(file_get_contents($file));
        }

        if ($request->hasFile('picture_2')) {
            $file = $request->file('picture_2');
            $this->post->picture_2 = 'data:image/'.$file->extension().';base64,'.base64_encode(file_get_contents($file));
        }

        if ($request->hasFile('picture_3')) {
            $file = $request->file('picture_3');
            $this->post->picture_3 = 'data:image/'.$file->extension().';base64,'.base64_encode(file_get_contents($file));
        }

        $this->post->sponsor_name = $request->sponsor_name;
        $this->post->background_color = $request->background_color;
        $this->post->mail_address = $request->mail_address;
        $this->post->insta_url = $request->insta_url;
        $this->post->facebook_url = $request->facebook_url;
        $this->post->x_url = $request->x_url;

        $this->post->save();

        return redirect()->route('home');

    }

    public function show($id)
    {
        $post_detail = $this->post->findOrFail($id);

        return view('sponsor.event-page')->with('post_detail', $post_detail);
    }
}
